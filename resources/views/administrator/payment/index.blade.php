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
                    <h3 class="mb-0">Payment</h3>
                    <a href="{{ route('administrator.payment.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
                </div>

                <div class="card-body">
                    <form action="{{ route('administrator.payment.index') }}" method="GET" class="mb-1">
                        <div class="d-flex justify-content-between">
                            <div class="input-group" style="max-width: 300px;">
                                <select class="form-control" name="program_name">
                                    <option value="">Pilih Payment</option>
                                    @foreach ($program_names as $program_name)
                                        <option value="{{ $program_name->program_name }}"
                                            {{ request('program_name') == $program_name->program_name ? 'selected' : '' }}>
                                            {{ $program_name->program_name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-primary" type="submit">Filter</button>
                                </div>
                            </div>
                            <div class="input-group" style="max-width: 300px;">
                                <input type="text" class="form-control" placeholder="Cari..." name="search"
                                    value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-primary" type="submit">Cari</button>
                                </div>
                            </div>
                        </div>
                        @if (request('search') || request('program_name'))
                            <div class="mt-2 d-flex justify-content-center">
                                <a href="{{ route('administrator.payment.index') }}"
                                    class="btn btn-primary text-white shadow">Seluruh Data</a>
                            </div>
                        @endif
                    </form>

                    <div class="table-responsive py-4">
                        <table class="table table-bordered" id="datatable-basic">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">ID Invoice</th>
                                    <th class="text-center">Nama Payment</th>
                                    <th class="text-center">Tanggal dan Waktu</th>
                                    <th class="text-center">Username</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Gambar</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-center">Metode Pembayaran</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payments as $index => $payment)
                                    <tr>
                                        <td>{{ $loop->iteration + $payments->firstItem() - 1 }}</td>
                                        <td>{{ $payment->id_invoice }}</td>
                                        <td>{{ $payment->program_name }}</td>
                                        <td>{{ $payment->payment_datetime }}</td>
                                        <td>{{ $payment->username }}</td>
                                        <td>{{ $payment->contact }}</td>
                                        <td><img src="{{ asset('bukti_payment/' . $payment->gambar) }}" alt="image"
                                                class="img-fluid"></td>
                                        <td>{{ $payment->total }}</td>
                                        <td>{{ $payment->payment_method }}</td>
                                        <td
                                            class="@php
if ($payment->status === 'pending') {
        echo 'text-warning';
    } elseif ($payment->status === 'completed') {
        echo 'text-success';
    } elseif ($payment->status === 'canceled') {
        echo 'text-danger';
    } @endphp">
                                            {{ $payment->status }}
                                        </td>

                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <!-- Tombol Complete -->
                                                <form action="{{ route('payment.complete', $payment->id) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    <button type="submit"
                                                        class="btn btn-success btn-sm d-inline-flex align-items-center justify-content-center me-2"
                                                        style="width: 32px; height: 32px;">
                                                        <i class="fa fa-check"></i>
                                                    </button>
                                                </form>

                                                <!-- Tombol Cancel -->
                                                <form action="{{ route('administrator.payment.cancel', $payment->id) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('POST')
                                                    <button type="submit"
                                                        class="btn btn-danger btn-sm d-inline-flex align-items-center justify-content-center"
                                                        style="width: 32px; height: 32px;">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <br>
                        {{ $payments->links('vendor.pagination.bootstrap-4') }}
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
                let startingIndex = {{ $payments->firstItem() - 1 }};
                $('table tbody tr').each(function(index) {
                    $(this).find('td:first-child').text(startingIndex + index + 1);
                });
            }

        });
    </script>
@endsection
