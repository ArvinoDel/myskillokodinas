@extends('administrator.dashboard')

@section('content')

<div class="card">
    <!-- Card header -->
    <div class="card-header d-flex justify-content-between align-items-center">
        <h2 class="mb-0">Album Berita Foto</h2>
        <a href="{{ route('administrator.album.create')}}" class="btn btn-primary btn-sm">Tambah Data</a>
    </div>
    <div class="card-body">
        <form action="{{ route('administrator.album.index') }}" method="GET" class="mb-1">
            <div class="d-flex justify-content-between">
                <div class="input-group" style="max-width: 300px;">
                    <select class="form-control" name="hari">
                        <option value="">Pilih Album</option>
                        @foreach ($harian as $hari)
                            <option value="{{ $hari->hari }}" {{ request('hari') == $hari->hari ? 'selected' : '' }}>
                                {{ $hari->hari }}
                            </option>
                        @endforeach
                    </select>
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="submit">Filter</button>
                    </div>
                </div>
                <div class="input-group" style="max-width: 300px;">
                    <input type="text" class="form-control" placeholder="Cari Albums..." name="search" value="{{ request('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="submit">Cari</button>
                    </div>
                </div>
            </div>
            @if(request('search') || request('aktif'))
            <div class="mt-2 d-flex justify-content-center">
                <a href="{{ route('administrator.album.index') }}" class="btn btn-primary text-white shadow">Seluruh Data</a>
            </div>
            @endif
        </form>

        <div class="table-responsive py-4">
            <table class="table table-bordered" id="datatable-basic">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Cover</th>
                        <th>Judul Berita Foto</th>
                        <th>Url</th>
                        <th>Aktif</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $albums as $index => $album )
                    <tr>
                        <td>{{ $loop->iteration + $albums->firstItem() - 1 }}</td>
                        <td>
                        <?php
                            if ($album->gbr_album != NULL) {
                                $gbr_album = $album->gbr_album;
                            }
                            ?>
                            <img style='width: 75px; height:75px' src="{{ url('img_album/'.$album->gbr_album )}}">
                        </td>
                        <td>{{ $album->jdl_album }}</td>
                        <td><a href="{{ url('album/detail/' . $album->album_seo) }}">album/detail/{{ $album->album_seo }}</a></td>
                        <td>{{ $album->aktif }}</td>
                        <td>
                            <a href="{{ route('administrator.album.edit', $album->id_album) }}" class="btn btn-success btn-sm d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                                <i class="fa fa-edit"></i>
                            </a>
                            <button data-url="{{ route('administrator.album.destroy', $album->id_album) }}"
                                type="button" class="btn-delete btn btn-danger btn-sm d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            {{ $albums->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('click', '.btn-delete', function(e) {
            e.preventDefault(); // Mencegah aksi default

            let btn = $(this);
            let url = btn.data('url'); // Ambil URL dari data-url

            Swal.fire({
                icon: 'warning',
                text: 'Data yang sudah dihapus tidak dapat dikembalikan!',
                title: 'Apakah Anda yakin ingin menghapus data ini?',
                showCancelButton: true,
                confirmButtonColor: '#D33',
                confirmButtonText: 'Yakin hapus?',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Tampilkan pesan "Deleting..." sebelum permintaan AJAX
                    Swal.fire({
                        title: 'Deleting...',
                        text: 'Sedang menghapus data...',
                        icon: 'info',
                        allowOutsideClick: false,
                        showConfirmButton: false,
                        onOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    // Mengirim permintaan AJAX DELETE
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}' // Sertakan CSRF token
                        },
                        success: function(response) {
                            Swal.fire({
                                title: "Deleted!",
                                text: "Data Anda telah dihapus.",
                                icon: "success"
                            }).then(() => {
                                // Hapus baris tabel
                                btn.closest('tr').fadeOut(500, function() {
                                    $(this).remove();

                                    // Perbarui nomor urut setelah elemen dihapus
                                    updateRowNumbers();
                                });
                            });
                        },
                        error: function(xhr) {
                            Swal.fire({
                                title: "Error!",
                                text: "Terjadi kesalahan saat menghapus data.",
                                icon: "error"
                            });
                        }
                    });
                }
            });
        });

        // Fungsi untuk memperbarui nomor urut
        function updateRowNumbers() {
            let startingIndex = {{ $albums->firstItem() - 1 }};
            $('table tbody tr').each(function(index) {
                $(this).find('td:first-child').text(startingIndex + index + 1);
            });
        }
    });
</script>
@endsection
