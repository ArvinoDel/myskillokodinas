@extends('administrator.layout')

@section('content')

<div class="row">
    <div class="col">
        <div class="card shadow">
            <div class="card-header">
                <h3 class="mb-0">Edit Video</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('administrator.video.update', $videos->id_video) }}" method="POST" enctype="multipart/form-data" class="form-ajax">
                    @csrf
                    @method('PUT')
                    <table class="table" style="border: none; border-collapse: collapse;">
                        <tbody>
                            <tr>
                                <th style="padding: 5px;">Judul Video</th>
                                <td style="padding: 5px;">
                                    <input type="text" class="form-control" id="jdl_video" name="jdl_video" value="{{ old('jdl_video', $videos->jdl_video) }}" placeholder="Masukkan judul video" required>
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px;">Playlist</th>
                                <td style="padding: 5px;">
                                    <select class="form-control" id="id_playlist" name="id_playlist" required>
                                        <option value="">-- Pilih Playlist --
                                        @foreach($playlistvideos as $playvid)
                                        <option value="{{ $playvid->id_playlist }}" {{ $videos->id_playlist == $playvid->id_playlist ? 'selected' : '' }}>
                                            {{ $playvid->jdl_playlist }}
                                        </option>
                                        @endforeach
                                        </option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px;">Keterangan</th>
                                <td style="padding: 5px;">
                                    <textarea class="form-control" id="keterangan" name="keterangan" rows="5" placeholder="Masukkan isi berita" required>{{ old('keterangan', $videos->keterangan) }}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px;">Gambar</th>
                                <td style="padding: 5px;">
                                    <div class="d-flex align-items-center">
                                        <img id="preview" src="{{ url('foto_video/'.$videos->gbr_video) }}" alt="Preview" style="max-width: 100px; margin-top: 5px;" class="mr-3">
                                        <div class="flex-grow-1">
                                            <input type="file" class="form-control" onchange="previewImage(event)" name="gbr_video" id="gbr_video">
                                            <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</small>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px;">Video</th>
                                <td style="padding: 5px;">
                                    <div class="d-flex align-items-center">
                                        <video id="video-preview" controls style="max-width: 200px; margin-top: 5px;" class="mr-3">
                                            <source src="{{ url('video_files/'.$videos->video) }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                        <div class="flex-grow-1">
                                            <input type="file" class="form-control" onchange="previewVideo(event)" id="video" name="video" accept="video/*">
                                            <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah video.</small>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px;">Video Youtube</th>
                                <td style="padding: 5px;">
                                    <input type="text" class="form-control" id="youtube" name="youtube" value="{{ old('youtube', $videos->youtube) }}" placeholder="Contoh link: http://www.youtube.com/embed/xbuEmoRWQHU">
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px;">Tag</th>
                                <td style="padding: 5px; border: 1px solid #ddd;">
                                    <div style="max-height: 200px; overflow-y: auto;">
                                        @foreach($tagvids as $tagvid)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="{{ $tagvid->tag_seo }}" id="tagvid{{ $tagvid->id_tag }}" name="tagvid[]" {{ in_array($tagvid->tag_seo, explode(',', $videos->tagvid)) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="tagvid{{ $tagvid->id_tag }}">
                                                    {{ $tagvid->nama_tag }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mt-4 d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Perbarui</button>
                        <a href="{{ route('administrator.video.index') }}" class="btn btn-danger">Batal</a>
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
