@extends('administrator.layout')

@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="mb-0">Identitas Website</h3>
  </div>
  <form action="{{ route('administrator.identitaswebsite.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="table-responsive py-2">
      <table class="table table-bordered table-sm" id="datatable-buttons">
        <tbody>
          <tr>
            <th style="width: 100px;">Nama Website</th>
            <td style="padding-left: 8px;"><input type="text" class="form-control form-control-sm" name="nama_website" value="{{ $identitaswebsite->nama_website }}"></td>
          </tr>
          <tr>
            <th>Email</th>
            <td style="padding-left: 8px;"><input type="email" class="form-control form-control-sm" name="email" value="{{ $identitaswebsite->email }}"></td>
          </tr>
          <tr>
            <th>Domain</th>
            <td style="padding-left: 8px;"><input type="url" class="form-control form-control-sm" name="domain" value="{{ $identitaswebsite->url }}"></td>
          </tr>
          <tr>
            <th>Sosial Media</th>
            <td style="padding-left: 8px;"><input type="url" class="form-control form-control-sm" name="sosial_media" value="{{ $identitaswebsite->facebook }}"></td>
          </tr>
          <tr>
            <th>No Rekening</th>
            <td style="padding-left: 8px;"><input type="text" class="form-control form-control-sm" name="rekening" value="{{ $identitaswebsite->rekening }}"></td>
          </tr>
          <tr>
            <th>No Telpon</th>
            <td style="padding-left: 8px;"><input type="tel" class="form-control form-control-sm" name="no_telp" value="{{ $identitaswebsite->no_telp }}"></td>
          </tr>
          <tr>
            <th>Meta Deskripsi</th>
            <td style="padding-left: 8px;"><input type="text" class="form-control form-control-sm" name="meta_deskripsi" value="{{ $identitaswebsite->meta_deskripsi }}"></td>
          </tr>
          <tr>
            <th>Meta Keyword</th>
            <td style="padding-left: 8px;"><input type="text" class="form-control form-control-sm" name="meta_keyword" value="{{ $identitaswebsite->meta_keyword }}"></td>
          </tr>
          <tr>
            <th>Google Maps</th>
            <td style="padding-left: 8px;"><textarea class="form-control form-control-sm" name="maps" rows="3">{{ $identitaswebsite->maps }}</textarea></td>
          </tr>
          <tr>
            <th>Favicon</th>
            <td style="padding-left: 8px;">
              <input type='file' class='form-control form-control-md' name='favicon'>
              <hr style='margin:5px'>
              Favicon Aktif Saat ini :
                <img style='width:32px; height:32px' src="{{ url('foto_identitas/'.$identitaswebsite->favicon) }}">
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class='card-footer d-flex justify-content-between'>
      <button type='submit' name='submit' class='btn btn-info'>Update</button>
    </div>
  </form>
</div>
@endsection
