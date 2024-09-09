@extends('administrator.layout')

@section('content')
<?php
$foto = "profile.png";
if($users->foto != NULL){
    $foto = $users->foto;
}
?>

<div class="row">
    <div class="col">
        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('administrator.manajemenuser.update', $users->id) }}" method="POST" enctype="multipart/form-data" class="form-ajax">
                    @csrf
                    @method('PUT')
                    <table class="table table-bordered" id="datatable-buttons">
                        <tbody>
                            <tr>
                                <th style="padding: 5px; border: 1px solid #ddd;">Username</th>
                                <td style="padding: 5px; border: 1px solid #ddd;"><input type="text" class="form-control" id="username" name="username" value="{{ $users->username }}"></td>
                            </tr>
                            <tr>
                                <th style="padding: 5px; border: 1px solid #ddd;">Password</th>
                                <td style="padding: 5px; border: 1px solid #ddd;"><input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password baru jika ingin mengubah"></td>
                            </tr>
                            <tr>
                                <th style="padding: 5px; border: 1px solid #ddd;">Nama Lengkap</th>
                                <td style="padding: 5px; border: 1px solid #ddd;"><input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{ $users->nama_lengkap }}"></td>
                            </tr>
                            <tr>
                                <th style="padding: 5px; border: 1px solid #ddd;">Alamat Email</th>
                                <td style="padding: 5px; border: 1px solid #ddd;"><input type="email" class="form-control" id="email" name="email" value="{{ $users->email }}"></td>
                            </tr>
                            <tr>
                                <th style="padding: 5px; border: 1px solid #ddd;">No Telepon</th>
                                <td style="padding: 5px; border: 1px solid #ddd;"><input type="tel" class="form-control" id="no_telp" name="no_telp" value="{{ $users->no_telp }}"></td>
                            </tr>
                            <tr>
                                <th style="padding: 5px; border: 1px solid #ddd;">Upload Foto</th>
                                <td style="padding: 5px; border: 1px solid #ddd;">
                                    {{-- <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                                    @if($users->foto)
                                        <img src="{{ asset('storage/'.$user->foto) }}" alt="Foto Profil" style="max-width: 100px; margin-top: 10px;">
                                    @endif --}}
                                    <div class="d-flex align-items-center">
                                        <img id="preview" src="{{ url('foto_user/'.$users->foto) }}" alt="Preview" style="max-width: 100px; margin-top: 5px;" class="mr-3">
                                        <div class="flex-grow-1">
                                            <input type="file" class="form-control" onchange="previewImage(event)" name="foto" id="foto">
                                            <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah cover.</small>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px; border: 1px solid #ddd;">Level</th>
                                <td style="padding: 5px; border: 1px solid #ddd;">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="level" id="level" value="admin" required @checked($users->level == 'admin')>
                                        <label class="form-check-label" for="admin">admin</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="level" id="level" value="user" required @checked($users->level == 'user')>
                                        <label class="form-check-label" for="user">user</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="level" id="level" value="kontributor" required @checked($users->level == 'kontributor')>
                                        <label class="form-check-label" for="kontributor">kontributor</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px; border: 1px solid #ddd;">Tambah Akses</th>
                                <td style="padding: 5px; border: 1px solid #ddd;">
                                    <div style="max-height: 200px; overflow-y: auto;">
                                        {{-- @foreach($moduls as $modul)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{ $modul->id_modul }}"
                                                   id="modul_{{ $modul->id_modul }}" name="modul[]"
                                                   @if(in_array($modul->id_modul, $akses_user ?? [])) checked @endif>
                                            <label class="form-check-label" for="modul_{{ $modul->id_modul }}">
                                                {{ $modul->nama_modul }}
                                            </label>
                                        </div>
                                            @endforeach --}}
                                        @foreach($moduls as $modul)  
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{ $modul->id_modul }}"
                                                   id="modul_{{ $modul->id_modul }}" name="modul[]"
                                                   @if(in_array($modul->id_modul, $akses_user)) checked @endif>
                                            <label class="form-check-label" for="modul_{{ $modul->id_modul }}">
                                                {{ $modul->nama_modul }}
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px; border: 1px solid #ddd;">Hak Akses</th>
                                <td style="padding: 5px; border: 1px solid #ddd;">
                                    <div style="max-height: 200px; overflow-y: auto;">
                                        <div style="max-height: 200px; overflow-y: auto;">
                                            @foreach($akses as $aks)
                                                <span style='display:block'>
                                                    <a class='text-danger' href="{{ route('administrator.manajemenuser.delete_akses', ['id_umod' => $aks->id_umod, 'user_id' => $users->id]) }}">
                                                        <i class='fas fa-times'></i>
                                                    </a>
                                                    <span class='glyphicon glyphicon-remove'></span></a>{{ $aks->nama_modul }}</span>
                                                </span>
                                            @endforeach
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mt-4 d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Perbarui</button>
                        <a href="{{ route('administrator.manajemenuser.index') }}" class="btn btn-danger">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

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