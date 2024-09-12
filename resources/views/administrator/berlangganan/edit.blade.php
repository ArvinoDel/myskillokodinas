@extends('administrator.layout')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card card-shadow">
                <div class="card-header">
                    <h3 class="mb-0">Edit Berlangganan</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('administrator.berlangganan.update', $berlangganan->id_berlangganan) }}"
                        method="POST" enctype="multipart/form-data" class="form-ajax">
                        @csrf
                        @method('PUT')
                        <table class="table" id="datatable-buttons" style="border: none; border-collapse: collapse;">
                            <tbody>
                                <tr>
                                    <th style="padding: 5px;">Masa Berlangganan</th>
                                    <td style="padding: 5px;">
                                        <input type="text" class="form-control" id="masa_berlangganan"
                                            name="masa_berlangganan" placeholder="Masukkan Masa Berlangganan"
                                            value="{{ $berlangganan->masa_berlangganan }}" required>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="padding: 5px;">Harga Berlangganan</th>
                                    <td style="padding: 5px;">
                                        <input type="text" class="form-control" name="harga_berlangganan"
                                            placeholder="Masukkan Harga Berlangganan"
                                            value="{{ $berlangganan->harga_berlangganan }}" required>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="padding: 5px;">Harga Diskon</th>
                                    <td style="padding: 5px;">
                                        <input type="text" class="form-control" name="harga_diskon"
                                            placeholder="Masukkan Harga Diskon" value="{{ $berlangganan->harga_diskon }}">
                                    </td>
                                </tr>
                                <tr>
                                    <th style="padding: 5px;">Is Active</th>
                                    <td style="padding: 5px;">
                                        <div>
                                            <label>
                                                <input type="radio" name="is_active" value="1" required
                                                    {{ $berlangganan->is_active ? 'checked' : '' }}> Yes
                                            </label>
                                            <label>
                                                <input type="radio" name="is_active" value="0" required
                                                    {{ !$berlangganan->is_active ? 'checked' : '' }}> No
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="padding: 5px;">Is Populer</th>
                                    <td style="padding: 5px;">
                                        <div>
                                            <label>
                                                <input type="radio" name="is_populer" value="1" required
                                                    {{ $berlangganan->is_populer ? 'checked' : '' }}> Yes
                                            </label>
                                            <label>
                                                <input type="radio" name="is_populer" value="0" required
                                                    {{ !$berlangganan->is_populer ? 'checked' : '' }}> No
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="padding: 5px;">Benefits</th>
                                    <td style="padding: 5px;">
                                        <div class="form-group">
                                            <label for="id_benefits">Benefits</label>
                                            <div class="form-check">
                                                @foreach ($benefits as $benefit)
                                                    <input class="form-check-input" type="checkbox" name="id_benefits[]"
                                                        value="{{ $benefit->id_benefit }}"
                                                        id="benefit_{{ $benefit->id_benefit }}"
                                                        {{ in_array($benefit->id_benefit, $berlangganan->id_benefits) ? 'checked' : '' }}>
                                                    <label class="form-check-label"
                                                        for="benefit_{{ $benefit->id_benefit }}">
                                                        {{ $benefit->nama_benefit }}
                                                    </label> <br>
                                                @endforeach

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="mt-4 d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('administrator.berlangganan.index') }}" class="btn btn-danger">Batal</a>
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
                            text: "Data Anda telah dihapus.",
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
