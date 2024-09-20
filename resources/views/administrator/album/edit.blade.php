@extends('administrator.layout')

@section('content')
<style>
    .table td {
        word-wrap: break-word;
        white-space: normal;
    }
</style>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Edit Album Berita Foto</h2>
        </div>
        <form action="{{ route('administrator.album.update', $album->id_album) }}" method="POST" enctype="multipart/form-data" class="form-ajax">
            @csrf
            @method('PUT')
            <table class="table" id="datatable-buttons" style="border: none; border-collapse: collapse;">
                <tbody>
                    <tr>
                        <th style="padding: 5px;">Judul Album</th>
                        <td style="padding: 5px;">
                            <input type="text" class="form-control" id="judul" name="judul" value="{{ $album->jdl_album }}" placeholder="Masukkan Judul Album">
                        </td>
                    </tr>
                    <tr>
                        <th style="padding: 5px;">Keterangan</th>
                        <td style="padding: 5px;">
                            <textarea class="form-control" id="keterangan" name="keterangan" rows="5" placeholder="Masukkan Keterangan">{{ $album->keterangan }}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <th style="padding: 5px;">Cover</th>
                        <td style="padding: 5px;">
                            <div class="d-flex align-items-center">
                                <img id="preview" src="{{ url('img_album/'.$album->gbr_album) }}" alt="Preview" style="max-width: 100px; margin-top: 5px;" class="mr-3">
                                <div class="flex-grow-1">
                                    <input type="file" class="form-control" onchange="previewImage(event)" name="gbr_album" id="gbr_album">
                                    <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</small>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th style="padding: 5px;">Status</th>
                        <td style="padding: 5px;">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="aktif" value="Y" {{ $album->aktif == 'Y' ? 'checked' : '' }}>
                                <label class="form-check-label" for="aktif">Aktif</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="tidak_aktif" value="N" {{ $album->aktif == 'N' ? 'checked' : '' }}>
                                <label class="form-check-label" for="tidak_aktif">Tidak Aktif</label>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="mt-4 d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Perbarui</button>
                <a href="{{ route('administrator.album.index') }}" class="btn btn-danger">Batal</a>
            </div>
        </form>
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
            let btn =$(this);
            Swal.fire({
               icon:'warning',
               text:'Data yang sudah di hapus tidak dapat dikembalikan!',
               title:'Apakah Anda yakin ingin menghapus data ini?',
               showCancelButton: true,
               confirmButtonColor:'#D33',
               confirmButtonText:'Yakin hapus?',
               cancelButtonText:'Batal'
            }).then((result)=>{
                if (result.isConfirmed){
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
                                }).then((result)=>{
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
