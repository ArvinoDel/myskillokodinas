@extends('administrator.layout')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Tambah Album Berita Foto</h2>
        </div>
        <div class="container-fluid">
            <form action="{{ route('administrator.album.store') }}" method="POST" enctype="multipart/form-data" class="form-ajax">
                @csrf
                <table class="table" id="datatable-buttons" style="border: none; border-collapse: collapse;">
                    <tbody>
                        <tr>
                            <th style="padding: 5px;">Judul Album</th>
                            <td style="padding: 5px;">
                                <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan Judul Album">
                            </td>
                        </tr>
                        <tr>
                            <th style="padding: 5px;">Keterangan</th>
                            <td style="padding: 5px;">
                                <textarea class="form-control" id="keterangan" name="keterangan" rows="5" placeholder="Masukkan Keterangan"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th style="padding: 5px;">Cover</th>
                            <td style="padding: 5px;">
                                <input type="file" class="form-control" id="gbr_album" name="gbr_album">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="mt-4 mb-4 d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('administrator.album.index') }}" class="btn btn-danger">Batal</a>
                </div>
            </form>
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
