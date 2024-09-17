@extends('administrator.layout')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card card-shadow">
                <div class="card-header">
                    <h3 class="mb-0">Edit Bootcamp</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('administrator.bootcamps.update', $bootcamps->id_bootcamp) }}"
                        method="POST" enctype="multipart/form-data" class="form-ajax">
                        @csrf
                        @method('PUT')
                        <table class="table" id="datatable-buttons" style="border: none; border-collapse: collapse;">
                            <tbody>
                                <tr>
                                    <th style="padding: 5px;">Judul Bootcamp</th>
                                    <td style="padding: 5px;">
                                        <input type="text" class="form-control" id="judul_bootcamp"
                                            name="judul_bootcamp" placeholder="Masukkan Masa Berlangganan"
                                            value="{{ $bootcamps->judul_bootcamp }}" required>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="padding: 5px;">Thumbnail saat ini:</th>
                                    <td style="padding: 5px;">
                                        <div class="d-flex align-items-center">
                                            <img id="preview" src="{{ url('thumbnail_bootcamp/'.$bootcamps->thumbnail) }}" alt="Preview" style="max-width: 100px; margin-top: 5px;" class="mr-3">
                                            <div class="flex-grow-1">
                                                <input type="file" class="form-control" onchange="previewImage(event)" name="thumbnail" id="thumbnail">
                                                <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</small>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="padding: 5px;">Tgl s/d Selesai</th>
                                    <td style="padding: 5px;">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" id="tanggal_mulai" name="tanggal_mulai" value="{{ $bootcamps->tanggal_mulai }}">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" id="tanggal_selesai" name="tanggal_selesai" value="{{ $bootcamps->tanggal_selesai }}">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="padding: 5px;">Harga</th>
                                    <td style="padding: 5px;">
                                        <input type="text" class="form-control" name="harga"
                                            placeholder="Masukkan Harga Bootcamp"
                                            value="{{ $bootcamps->harga }}" required>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="padding: 5px;">Harga Diskon</th>
                                    <td style="padding: 5px;">
                                        <input type="text" class="form-control" name="harga_diskon"
                                            placeholder="Masukkan Harga Diskon" value="{{ $bootcamps->harga_diskon }}">
                                    </td>
                                </tr>
                                <tr>
                                    <th style="padding: 5px;">Sesi</th>
                                    <td style="padding: 5px;">
                                        <input type="text" class="form-control" id="sesi"
                                            name="sesi" placeholder="Masukkan Sesi" value="{{ $bootcamps->sesi }}" required>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="padding: 5px;">Deskripsi</th>
                                    <td style="padding: 5px;">
                                        <textarea class="form-control" name="deskripsi" required>{{ $bootcamps->deskripsi }}</textarea>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="mt-4 d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('administrator.bootcamps.index') }}" class="btn btn-danger">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            flatpickr("#tanggal_mulai", {
                dateFormat: "Y-m-d",
                locale: {
                    firstDayOfWeek: 1
                }
            });
        
            flatpickr("#tanggal_selesai", {
                dateFormat: "Y-m-d",
                locale: {
                    firstDayOfWeek: 1
                }
            });
        
            document.querySelector('form').addEventListener('submit', function(e) {
                var jamInput = document.getElementById('jam').value;
                var jamPattern = /^([01]\d|2[0-3]):([0-5]\d) - ([01]\d|2[0-3]):([0-5]\d) WIB$/;
                if (!jamPattern.test(jamInput)) {
                    e.preventDefault();
                    alert('Format jam tidak valid. Harus dalam format HH:MM - HH:MM WIB');
                }
            });
        });
        </script>


    <script>
        function previewImage(event) {
            var preview = document.getElementById('preview');
            var file = event.target.files[0];
            var reader = new FileReader();

            reader.onload = function(){
                preview.src = reader.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>

@endsection

@section('script')
    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', '.btn-delete', function() {
                let btn = $(this);
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
                        Swal.fire({
                            title: "Deleted!",
                            text: "Data Anda telah dihapus.",
                            icon: "success"
                        });
                        document.location = btn.data('url');
                    }
                });
            });

            $('.form-ajax').each(function() {
                $(this).bind('submit', function(e) {
                    e.preventDefault();

                    let form = $(this);

                    $.ajax({
                        url: form.prop('action'),
                        data: new FormData(this),
                        cache: false,
                        async: true,
                        type: 'post',
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            console.log(data); // Ini untuk debugging
                            if (data.success === false) {
                                Swal.fire({
                                    icon: 'error',
                                    html: data.message,
                                    timer: 1500,
                                    showConfirmButton: false
                                });
                            } else {
                                Swal.fire({
                                    position: "center",
                                    icon: "success",
                                    title: data.message,
                                    showConfirmButton: false,
                                    timer: 1500
                                }).then((result) => {
                                    console.log(result);
                                    document.location = data.url;
                                });
                            }
                        }
                    });
                });
            });
        });
    </script>
@endsection
