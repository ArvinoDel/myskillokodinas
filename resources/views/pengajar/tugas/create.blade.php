@extends('pengajar.layout')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card card-shadow">
                <div class="card-header">
                    <h3 class="mb-0">Tambah Tugas</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('pengajar.tugas.store') }}" method="POST" enctype="multipart/form-data"
                        class="form-ajax">
                        @csrf
                        <table class="table" id="datatable-buttons" style="border: none; border-collapse: collapse;">
                            <tbody>
                                <tr>
                                    <th style="padding: 5px;">URL</th>
                                    <td style="padding: 5px;">
                                        <input type="text" class="form-control" id="url" name="url"
                                            placeholder="Masukkan URL Materi" required>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="padding: 5px;">Judul Tugas</th>
                                    <td style="padding: 5px;">
                                        <input type="text" class="form-control" id="judul_tugas" name="judul_tugas"
                                            placeholder="Masukkan Judul Tugas" required>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="padding: 5px;">Deskripsi</th>
                                    <td style="padding: 5px;">
                                        <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukkan Deskripsi Tugas" required></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="padding: 5px;">File</th>
                                    <td style="padding: 5px;">
                                        <input type="file" class="form-control" id="file" name="file">
                                    </td>
                                </tr>
                                <tr>
                                    <th style="padding: 5px;">Materi</th>
                                    <td style="padding: 5px;">
                                        <select class="form-control" name="id_materi" required>
                                            @foreach ($materis as $materi)
                                            <option hidden value="{{ $materi->id_materi }}" {{ request('id_materi') == $materi->id_materi ? 'selected' : '' }}>{{ $materi->nama_materi }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="padding: 5px;">Status</th>
                                    <td style="padding: 5px;">
                                        <select class="form-control" name="status" required>
                                            <option value="1">Aktif</option>
                                            <option value="0">Tidak Aktif</option>
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="mt-4 d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('pengajar.tugas.index') }}" class="btn btn-danger">Batal</a>
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
