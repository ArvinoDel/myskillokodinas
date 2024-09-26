@extends('pengajar.layout')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card card-shadow">
                <div class="card-header">
                    <h3 class="mb-0">Edit Isi Materi</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('pengajar.isimateri.update', $isi_materis->id_isi_materi) }}" method="POST" enctype="multipart/form-data"
                        class="form-ajax">
                        @csrf
                        @method('PUT')
                        <table class="table" id="datatable-buttons" style="border: none; border-collapse: collapse;">
                            <tbody>
                                <tr>
                                    <th style="padding: 5px;">URL</th>
                                    <td style="padding: 5px;">
                                        <input type="text" class="form-control" id="url" name="url"
                                            placeholder="Masukkan URL Materi" value="{{ $isi_materis->url }}">
                                    </td>
                                </tr>
                                <tr>
                                    <th style="padding: 5px;">Judul File</th>
                                    <td style="padding: 5px;">
                                        <input type="text" class="form-control" id="judul_file" name="judul_file"
                                            placeholder="Masukkan Judul File" required value="{{ $isi_materis->judul_file }}">
                                    </td>
                                </tr>
                                <tr>
                                    <th style="padding: 5px;">File</th>
                                    <td style="padding: 5px;">
                                        <input type="file" class="form-control" id="file" name="file">
                                        @if($isi_materis->file)
                                            <p>File Saat Ini: <a href="{{ asset('storage/' . $isi_materis->file) }}" target="_blank">{{ $isi_materis->file }}</a></p>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th style="padding: 5px;">Materi</th>
                                    <td style="padding: 5px;">
                                        <select class="form-control" name="id_materi" required>
                                            <option value="">-- Pilih Materi --</option>
                                            @foreach ($materis as $materi)
                                                <option value="{{ $materi->id_materi }}" {{ $isi_materis->id_materi == $materi->id_materi ? 'selected' : '' }}>
                                                    {{ $materi->nama_materi }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="mt-4 d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('pengajar.isimateri.index') }}" class="btn btn-danger">Batal</a>
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
