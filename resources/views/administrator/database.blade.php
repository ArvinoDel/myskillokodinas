@extends('administrator.layout')

@section('content')

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Backup Database</h3>
                <a href="{{ route('administrator.database.backup') }}" class="btn btn-gradient-primary">
                    <i class="fa fa-download"></i>
                    Backup
                </a>
                File Backup :
                <br>
                <ul>
                    @foreach ($files as $file)
                    <li>
                        <?php $filename = str_replace("backup/","",$file); ?>
                        {{ $filename }}
                        <a href="{{ route('administrator.database.backup.download', $filename) }}" title="Download {{ $filename }}" class="text-success">
                            <i class="fa fa-download"></i>
                        </a>
                        <a href="{{ route('administrator.database.backup.remove', $filename) }}" title="Hapus {{ $filename }}" onclick="return confirm('Yakin hapus file backup {{ $filename }}.?')" class="text-danger">
                            <i class="fa fa-trash"></i>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection
