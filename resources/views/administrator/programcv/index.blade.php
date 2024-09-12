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
                    <h3 class="mb-0">Daftar Program CV Berlangganan</h3>
                    <a href="{{ route('administrator.programcv.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
                </div>

                <!-- Tambahkan form pencarian -->
                <div class="card-body">
                    <form action="{{ route('administrator.programcv.index') }}" method="GET" class="mb-1">
                        <div class="d-flex justify-content-between">
                            <div class="input-group" style="max-width: 300px;">
                                <select class="form-control" name="masa_berlangganan">
                                    <option value="">Pilih Berlangganan</option>
                                    @foreach ($masa_berlangganans as $masa_berlangganan)
                                        <option value="{{ $masa_berlangganan->masa_berlangganan }}"
                                            {{ request('masa_berlangganan') == $masa_berlangganan->masa_berlangganan ? 'selected' : '' }}>
                                            {{ $masa_berlangganan->masa_berlangganan }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-primary" type="submit">Filter</button>
                                </div>
                            </div>
                            <div class="input-group" style="max-width: 300px;">
                                <input type="text" class="form-control" placeholder="Cari Program CV..." name="search"
                                    value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-primary" type="submit">Cari</button>
                                </div>
                            </div>
                        </div>
                        @if (request('search') || request('masa_berlangganan'))
                            <div class="mt-2 d-flex justify-content-center">
                                <a href="{{ route('administrator.berlangganan.index') }}"
                                    class="btn btn-primary text-white shadow">Seluruh Data</a>
                            </div>
                        @endif
                    </form>

                    <div class="table-responsive py-4">
                        <table class="table table-bordered" id="datatable-basic">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Masa Berlangganan</th>
                                    <th class="text-center">Harga Berlangganan</th>
                                    <th class="text-center">Harga Diskon</th>
                                    <th class="text-center">Is Active</th>
                                    <th class="text-center">Is Populer</th>
                                    <th class="text-center">list benefits</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($programcvs as $index => $programcv)
                                    <tr>
                                        <td>{{ $loop->iteration + $programcvs->firstItem() - 1 }}</td>
                                        <td>{{ $programcv->masa_berlangganan }}</td>
                                        <td>{{ $programcv->harga_berlangganan }}</td>
                                        <td>{{ $programcv->harga_diskon }}</td>
                                        <td>{{ $programcv->is_active ? 'Yes' : 'No' }}</td>
                                        <td>{{ $programcv->is_populer ? 'Yes' : 'No' }}</td>
                                        <td>
                                            @foreach ($programcv->benefits() as $benefit)
                                                <span>{{ $benefit->nama_benefit }}</span> <br>
                                            @endforeach
                                        </td>
                                        <td>


                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('administrator.programcv.edit', $programcv->id_programcv) }}"
                                                    class="btn btn-success btn-sm d-inline-flex align-items-center justify-content-center me-2"
                                                    style="width: 32px; height: 32px;">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <button
                                                    data-url="{{ route('administrator.programcv.destroy', $programcv->id_programcv) }}"
                                                    type="button"
                                                    class="btn-delete btn btn-danger btn-sm d-inline-flex align-items-center justify-content-center"
                                                    style="width: 32px; height: 32px;">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <br>
                        {{ $programcvs->links('vendor.pagination.bootstrap-4') }}
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
                let startingIndex = {{ $programcvs->firstItem() - 1 }};
                $('table tbody tr').each(function(index) {
                    $(this).find('td:first-child').text(startingIndex + index + 1);
                });
            }

        });
    </script>
@endsection
