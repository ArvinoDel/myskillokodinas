@extends('dinas-2.layout')

@section('title', $menu->nama_menu)

@section('content')

<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header">
            <h1>{{ $menu->nama_menu }}</h1>
            <small class="text-muted">{{ $menu->deskripsi }}</small>
        </div>
        <div class="card-body">
            <div>{!! $menu->deskripsi !!}</div>
        </div>
        <div class="card-footer">
            <a href="{{ route('administrator.menuwebsite.index') }}" class="btn btn-primary">Kembali ke Daftar Menu</a>
        </div>
    </div>
</div>

@endsection
