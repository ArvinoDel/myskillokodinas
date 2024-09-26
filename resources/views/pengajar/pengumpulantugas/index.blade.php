@extends('pengajar.layout')

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
                <h3 class="mb-0">Pengumpulan Tugas</h3>
            </div>

            <!-- Tambahkan form pencarian -->
            <div class="card-body">
                <form action="{{ route('pengajar.pengumpulantugas.index') }}" method="GET" class="mb-1">
                    <div class="d-flex justify-content-between">
                        <div class="input-group" style="max-width: 300px;">
                            <select class="form-control" name="nama_lengkap">
                                @foreach ($nama_lengkaps as $user) <!-- Ubah dari judultugass ke nama_lengkaps -->
                                    <option value="{{ $user->nama_lengkap }}" {{ request('nama_lengkap') == $user->nama_lengkap ? 'selected' : '' }}>
                                        {{ $user->nama_lengkap }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" type="submit">Filter</button>
                            </div>
                        </div>
                        <div class="input-group" style="max-width: 300px;">
                            <input type="text" class="form-control" placeholder="Cari Tugas..." name="search" value="{{ request('search') }}">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" type="submit">Cari</button>
                            </div>
                        </div>
                    </div>
                    @if(request('search') || request('nama_lengkap') || request('nama_lengkap'))
                    <div class="mt-2 d-flex justify-content-center">
                        <a href="{{ route('pengajar.pengumpulantugas.index') }}" class="btn btn-primary text-white shadow">Seluruh Data</a>
                    </div>
                    @endif
                </form>

                <div class="table-responsive py-4">
                    <table class="table table-bordered" id="datatable-basic">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama Lengkap</th>
                                <th class="text-center">Judul Tugas</th>
                                <th class="text-center">File</th>
                                <th class="text-center">Nilai</th>
                                <th class="text-center">Deskripsi</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengumpulantugass as $index => $kumpultugas)
                            <tr>
                                <td>{{ $loop->iteration + $pengumpulantugass->firstItem() - 1 }}</td>
                                <td>{{ $kumpultugas->user->nama_lengkap ?? 'belum ada data' }}</td> <!-- Menampilkan nama lengkap user -->
                                <td>{{ $kumpultugas->tugas->judul_tugas ?? 'N/A' }}</td> <!-- Menampilkan judul tugas -->
                                <td>
                                    @if (strpos($kumpultugas->file, '.mp4') !== false || strpos($kumpultugas->file, '.avi') !== false || strpos($kumpultugas->file, '.mpeg') !== false)
                                        <video width="100" controls>
                                            <source src="{{ asset('files_pengumpulantugas/' . $kumpultugas->file) }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    @elseif (strpos($kumpultugas->file, '.jpg') !== false || strpos($kumpultugas->file, '.jpeg') !== false || strpos($kumpultugas->file, '.png') !== false || strpos($kumpultugas->file, '.gif') !== false)
                                        <img src="{{ asset('files_pengumpulantugas/' . $kumpultugas->file) }}" alt="Image" width="100">
                                    @elseif (strpos($kumpultugas->file, '.pdf') !== false)
                                        <a href="{{ asset('files_pengumpulantugas/' . $kumpultugas->file) }}" target="_blank">Lihat PDF</a>
                                    @else
                                        <span>Tidak ada preview</span>
                                    @endif
                                </td>
                                <td>{{ $kumpultugas->nilai ?? 'N/A' }}</td> <!-- Menampilkan nilai -->
                                <td>{{ $kumpultugas->deskripsi ?? 'N/A' }}</td> <!-- Menampilkan deskripsi -->
                                <td class="text-center">
                                    <div class="d-flex justify-content-center">
                                        <a class="btn btn-success btn-sm d-inline-flex align-items-center justify-content-center me-2" style="width: 32px; height: 32px;" href="{{ route('pengajar.pengumpulantugas.edit', $kumpultugas->id_pengumpulan) }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button data-url="{{ route('pengajar.pengumpulantugas.destroy', $kumpultugas->id_pengumpulan) }}"
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
                    {{ $pengumpulantugass->links('vendor.pagination.bootstrap-4') }}
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
            let startingIndex = {{ $pengumpulantugass->firstItem() - 1 }};
            $('table tbody tr').each(function(index) {
                $(this).find('td:first-child').text(startingIndex + index + 1);
            });
        }
    });
</script>
@endsection
