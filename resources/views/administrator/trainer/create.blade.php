@extends('administrator.layout')

@section('content')

<div class="row">
    <div class="col">
        <div class="card card-shadow">
            <div class="card-header">
                <h3 class="mb-0">Tambah Trainer</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('administrator.trainer.store') }}" method="POST" enctype="multipart/form-data" class="form-ajax">
                    @csrf
                    <table class="table" id="datatable-buttons" style="border: none; border-collapse: collapse;">
                        <tbody>
                            <tr>
                                <th style="padding: 5px;">Foto Trainer</th>
                                <td style="padding: 5px;">
                                    <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px;">Nama Trainer</th>
                                <td style="padding: 5px;">
                                    <input type="text" class="form-control" id="nama_trainer" name="nama_trainer" placeholder="Masukkan Nama" required>
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px;">Kategori</th>
                                <td style="padding: 5px;">
                                    <select class="form-control" id="id_kategori" name="id_kategori" required>
                                        <option value="">-- Pilih Kategori --
                                        @foreach($kategoriprogram as $kat)
                                        <option value="{{ $kat->id_kategori }}">
                                            {{ $kat->nama_kategori }}
                                        </option>
                                        @endforeach
                                        </option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px; border: 1px solid #ddd;">Nama Program</th>
                                <td style="padding: 5px; border: 1px solid #ddd;">
                                    <div style="max-height: 200px; overflow-y: auto;">
                                        @foreach($programs as $program)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{ $program->id_pro }}" id="program" name="program[]">
                                            <label class="form-check-label" for="modul">
                                                {{ $program->nama_program }}
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
                        <a href="{{ route('administrator.trainer.index') }}" class="btn btn-danger">Batal</a>
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
