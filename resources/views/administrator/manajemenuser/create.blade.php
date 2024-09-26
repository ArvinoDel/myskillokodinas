@extends('administrator.layout')

@section('content')
<div class="row">
    <div class="col">
        <div class="card card-shadow">
            <div class="card-header">
                <h3 class="mb-0">Tambah User Baru</h3>
              </div>
            <div class="card-body">
                <form action="{{ route('administrator.manajemenuser.store') }}" method="POST" enctype="multipart/form-data" class="form-ajax">
                    @csrf
                    <table class="table table-bordered" id="datatable-buttons">
                        <tbody>
                            <tr>
                                <th style="padding: 5px; border: 1px solid #ddd;">Username</th>
                                <td style="padding: 5px; border: 1px solid #ddd;"><input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username"></td>
                            </tr>
                            <tr>
                                <th style="padding: 5px; border: 1px solid #ddd;">Password</th>
                                <td style="padding: 5px; border: 1px solid #ddd;"><input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password"></td>
                            </tr>
                            <tr>
                                <th style="padding: 5px; border: 1px solid #ddd;">Nama Lengkap</th>
                                <td style="padding: 5px; border: 1px solid #ddd;"><input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan nama lengkap"></td>
                            </tr>
                            <tr>
                                <th style="padding: 5px; border: 1px solid #ddd;">Alamat Email</th>
                                <td style="padding: 5px; border: 1px solid #ddd;"><input type="email" class="form-control" id="email" name="email" placeholder="Masukkan alamat email"></td>
                            </tr>
                            <tr>
                                <th style="padding: 5px; border: 1px solid #ddd;">No Telepon</th>
                                <td style="padding: 5px; border: 1px solid #ddd;"><input type="tel" class="form-control" id="no_telp" name="no_telp" placeholder="Masukkan nomor telepon"></td>
                            </tr>
                            <tr>
                                <th style="padding: 5px; border: 1px solid #ddd;">Upload Foto</th>
                                <td style="padding: 5px; border: 1px solid #ddd;"><input type="file" class="form-control" id="foto" name="foto" accept="image/*"></td>
                            </tr>
                            <tr>
                                <th style="padding: 5px; border: 1px solid #ddd;">Level</th>
                                <td style="padding: 5px; border: 1px solid #ddd;">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="level" id="admin" value="admin" checked>
                                        <label class="form-check-label" for="administrator">admin</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="level" id="user" value="user">
                                        <label class="form-check-label" for="user_biasa">user</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="level" id="pengajar" value="pengajar">
                                        <label class="form-check-label" for="pengajar">pengajar</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px; border: 1px solid #ddd;">Akses Modul</th>
                                <td style="padding: 5px; border: 1px solid #ddd;">
                                    <div style="max-height: 200px; overflow-y: auto;">
                                        @foreach($moduls as $modul)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{ $modul->id_modul }}" id="modul" name="modul[]">
                                            <label class="form-check-label" for="modul">
                                                {{ $modul->nama_modul }}
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                </td>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mt-4 d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('administrator.manajemenuser.index') }}" class="btn btn-danger">Batal</a>
                    </div>
                </form>
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

        $(document).on('click', '.btn-delete', function() {
            let btn = $(this);
            Swal.fire({
                icon: 'warning',
                text: 'Data yang sudah di hapus tidak dapat dikembalikan!',
                title: 'Apakah Anda yakin ingin menghapus data ini?',
                showCancelButton: true,
                confirmButtonColor: '#D33',
                confirmButtonText: 'Yakin hapus?',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
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

                // Menyinkronkan data dari CKEditor ke textarea
                for (var instance in CKEDITOR.instances) {
                    CKEDITOR.instances[instance].updateElement();
                }

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
