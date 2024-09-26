@extends('pengajar.layout')

@section('content')
<div class="row">
    <div class="col">
        <div class="card shadow">
            <div class="card-header">
                <h3 class="mb-0">Edit Nilai Pengumpulan Tugas</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('pengajar.pengumpulantugas.update', $pengumpulantugass->id_pengumpulan) }}" method="POST" enctype="multipart/form-data" class="form-ajax">
                    @csrf
                    @method('PUT')
                    <table class="table" id="datatable-buttons" style="border: none; border-collapse: collapse;">
                        <tbody>
                            <!-- Nama Lengkap (Non-editable) -->
                            <tr>
                                <th style="padding: 5px;">Nama Lengkap</th>
                                <td style="padding: 5px;">
                                    <input type="text" class="form-control" value="{{ $pengumpulantugass->user->nama_lengkap }}" readonly>
                                </td>
                            </tr>
                            <!-- Judul Tugas (Non-editable) -->
                            <tr>
                                <th style="padding: 5px;">Judul Tugas</th>
                                <td style="padding: 5px;">
                                    <input type="text" class="form-control" value="{{ $pengumpulantugass->tugas->judul_tugas }}" readonly>
                                </td>
                            </tr>
                            <!-- File Tugas (Non-editable) -->
                            <tr>
                                <th style="padding: 5px;">File Tugas</th>
                                <td style="padding: 5px;">
                                    <div class="d-flex align-items-center">
                                        <img id="preview" src="{{ url('files_pengumpulantugas/'.$pengumpulantugass->file) }}" alt="Preview" style="max-width: 100px; margin-top: 5px;" class="mr-3">
                                        <div class="flex-grow-1">
                                            <input type="file" class="form-control" name="file" id="file" disabled> <!-- Input file disabled -->
                                            <small class="form-text text-muted">Anda tidak dapat mengubah file ini.</small>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <!-- Nilai (Editable) -->
                            <tr>
                                <th style="padding: 5px;">Nilai</th>
                                <td style="padding: 5px;">
                                    <input type="number" class="form-control" name="nilai" value="{{ $pengumpulantugass->nilai }}" required>
                                </td>
                            </tr>
                            <!-- Deskripsi (Editable) -->
                            <tr>
                                <th style="padding: 5px;">Deskripsi</th>
                                <td style="padding: 5px;">
                                    <textarea class="form-control" name="deskripsi" rows="4" required>{{ $pengumpulantugass->deskripsi }}</textarea>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mt-4 d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('pengajar.pengumpulantugas.index')}}" class="btn btn-danger">Batal</a>
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

    function previewVideo(event) {
        var preview = document.getElementById('video-preview');
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

                for (instance in CKEDITOR.instances) {
                    CKEDITOR.instances[instance].updateElement();
                }

                let form = $(this);
                $.ajax({
                    url: form.prop('action'),
                    data: new FormData(this),
                    cache: false,
                    async: false,
                    type: 'post',
                    contentType: false,
                    processData: false,
                    success: function(data) {
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

{{-- <script>
    CKEDITOR.replace('deskripsi');
</script> --}}
@endsection

