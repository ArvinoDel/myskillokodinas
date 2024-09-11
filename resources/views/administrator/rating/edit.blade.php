@extends('administrator.layout')

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0">Edit Rating</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('administrator.rating.update', $ratings->id_rating) }}" method="POST" class="form-ajax">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="id">User</label>
                        <select class="form-control" name="id" required>
                            <option value="">Pilih User</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ $user->id == $user->id ? 'selected' : '' }}>{{ $user->nama_lengkap }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_program">Program</label>
                        <select class="form-control" name="id_program" required>
                            <option value="">Pilih Program</option>
                            @foreach ($programs as $program)
                                <option value="{{ $program->id_program }}" {{ $program->id_program == $program->id_program ? 'selected' : '' }}>{{ $program->judul_program }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jml_rating">Jumlah Rating</label>
                        <input type="number" class="form-control" name="jml_rating" value="{{ $ratings->jml_rating }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
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