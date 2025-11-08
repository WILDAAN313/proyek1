@extends('layouts.app')

@section('content')
<div class="container py-5">
    <a href="{{ route('menu') }}" class="btn btn-outline-secondary mb-3">← Kembali</a>

    <div class="card shadow-sm p-4">
        <h3 class="fw-bold">{{ $menu->nama_menu }}</h3>
        <span class="badge bg-success mb-3">{{ $menu->jadwal }}</span>
        <p>{{ $menu->deskripsi }}</p>
        <p class="text-muted">Dilihat: {{ $menu->dilihat }} kali</p>
    </div>
</div>
@endsection
