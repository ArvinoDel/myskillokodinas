@extends('administrator.layout')

@section('content')
<div class="row">
    <div class="col">
        <div class="card shadow">
            <div class="card-header">
                <h3 class="mb-0">Edit Materi</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('administrator.materi.update', $materis->id_materi) }}" method="POST" enctype="multipart/form-data" class="form-ajax">
                    @csrf
                    @method('PUT')
                    <table class="table" id="datatable-buttons" style="border: none; border-collapse: collapse;">
                        <tbody>
                            <tr>
                                <th style="padding: 5px;">Judul Materi</th>
                                <td style="padding: 5px;">
                                    <input type="text" class="form-control" id="judul_materi" name="judul_materi" value="{{ $materis->judul_materi }}" required>
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px;">Program</th>
                                <td style="padding: 5px;">
                                    <select class="form-control" name="id_program" required>
                                        <option value="">-- Pilih Program --</option>
                                        @foreach ($programs as $program)
                                            <option value="{{ $program->id_program }}" {{ $program->id_program == $materis->id_program ? 'selected' : '' }}>
                                                {{ $program->judul_program }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mt-4 d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Perbarui</button>
                        <a href="{{ route('administrator.materi.index')}}" class="btn btn-danger">Batal</a>
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
