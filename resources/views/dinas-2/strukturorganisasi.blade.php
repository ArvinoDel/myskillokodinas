@extends('dinas-2.layout')

@section('content')
<br>
<br>
<br>
<div class="container mt-5 pt-5">
    <div class="row">
        <!-- Kolom Konten Utama -->
        <div class="col-lg-8">
            <div class="mb-4">
                <div class="card-body">
                    <h1 class="text-center mb-4">{{ $halamanbaru->judul }}</h1>
                    <div class="content">
                        {!! $halamanbaru->isi_halaman !!}
                    </div>
                </div>
            </div>
        </div>

        <!-- Kolom Berita Terbaru -->
        <div class="col-lg-4">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Berita Terbaru</h5>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        @foreach($beritas as $berita)
                            <li class="mb-3">
                                <h6><a class="text-dark" href="">{{ $berita->judul }}</a></h6>
                                <small class="text-muted">{{ \Carbon\Carbon::parse($berita->created_at)->format('d F Y') }}</small>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection