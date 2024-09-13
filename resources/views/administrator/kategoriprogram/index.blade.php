@extends('administrator.layout')

@section('content')

<style>
    .table td {
        word-wrap: break-word;
        white-space: normal;
    }
</style>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Kategori Program</h3>
                <a href="{{ route('administrator.kategoriprogram.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
            </div>

            <!-- Tambahkan form pencarian -->
            <div class="card-body">
                <form action="{{ route('administrator.kategoriprogram.index') }}" method="GET" class="mb-1">
                    <div class="d-flex justify-content-between">
                        <div class="input-group" style="max-width: 300px;">
                            <select class="form-control" name="judul">
                                <option value="">Pilih Kategori</option>
                                @foreach ($nama_kategoris as $nama_kategori)
                                    <option value="{{ $nama_kategori->nama_kategori }}" {{ request('nama_kategori') == $nama_kategori->nama_kategori ? 'selected' : '' }}>
                                        {{ $nama_kategori->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" type="submit">Filter</button>
                            </div>
                        </div>
                        <div class="input-group" style="max-width: 300px;">
                            <input type="text" class="form-control" placeholder="Cari Kategori..." name="search" value="{{ request('kategoriprogram') }}">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" type="submit">Cari</button>
                            </div>
                        </div>
                    </div>
                    @if(request('search') || request('nama_kategori'))
                    <div class="mt-2 d-flex justify-content-center">
                        <a href="{{ route('administrator.kategoriprogram.index') }}" class="btn btn-primary text-white shadow">Seluruh Data</a>
                    </div>
                    @endif
                </form>

                <div class="table-responsive py-4">
                    <table class="table table-bordered" id="datatable-basic">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama Kategori</th>
                                <th class="text-center">Gambar</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kategoriprograms as $index => $katprogram)
                            <tr>
                                <td>{{ $loop->iteration + $kategoriprograms->firstItem() - 1 }}</td>
                                <td>{{ $katprogram->nama_kategori }}</td>
                                <td><img src="{{ asset('kategori_program/' . $katprogram->gambar) }}" alt="Gambar Kategori" class="img-fluid" style="max-width: 100px; max-height: 100px;"></td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('administrator.kategoriprogram.edit', $katprogram->id_kategori_program) }}" class="btn btn-success btn-sm d-inline-flex align-items-center justify-content-center me-2" style="width: 32px; height: 32px;">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button data-url="{{ route('administrator.kategoriprogram.destroy', $katprogram->id_kategori_program) }}"
                                            type="button" class="btn-delete btn btn-danger btn-sm d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                    {{ $kategoriprograms->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>
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
            let startingIndex = {{ $kategoriprograms->firstItem() - 1 }};
            $('table tbody tr').each(function(index) {
                $(this).find('td:first-child').text(startingIndex + index + 1);
            });
        }
    });
</script>
@endsection
