@extends('administrator.layout')

@section('content')

<div class="row">
    <div class="col">
        <div class="card card-shadow">
            <div class="card-header">
                <h3 class="mb-0">Edit Metode</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('administrator.metode.update', $metode->id_metode) }}" method="POST" enctype="multipart/form-data" class="form-ajax">
                    @csrf
                    @method('PUT')
                    <table class="table" id="datatable-buttons" style="border: none; border-collapse: collapse;">
                        <tbody>
                            <tr>
                                <th style="padding: 5px;">Nama Pembayaran</th>
                                <td style="padding: 5px;">
                                    <input type="text" class="form-control" id="nama_pembayaran" name="nama_pembayaran" value="{{ $metode->nama_pembayaran }}" required>
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px;">Gambar</th>
                                <td style="padding: 5px;">
                                    <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
                                    <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</small>
                                    <img src="{{ asset('foto_metode/' . $metode->gambar) }}" alt="Gambar Sebelumnya" class="img-fluid mt-2">
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px;">Pembayaran</th>
                                <td style="padding: 5px;">
                                    <input type="file" class="form-control" id="pembayaran" name="pembayaran" accept="image/*">
                                    <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah pembayaran.</small>
                                    <img src="{{ asset('foto_metode/' . $metode->pembayaran) }}" alt="Pembayaran Sebelumnya" class="img-fluid mt-2">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mt-4 d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        <a href="{{ route('administrator.metode.index') }}" class="btn btn-danger">Batal</a>
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
@endsection

