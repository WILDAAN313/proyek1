@extends('layouts.main')

@section('content')
<div class="container py-5">
    <a href="{{ route('menu') }}" class="btn btn-outline-success mb-3">Kembali</a>

    <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
        @if($menu->gambar)
            <img src="{{ Storage::url($menu->gambar) }}" alt="{{ $menu->nama_menu }}" class="w-100" style="height:320px;object-fit:cover;">
        @endif
        <div class="p-4">
            <h3 class="fw-bold mb-2">{{ $menu->nama_menu }}</h3>
            <p class="text-muted mb-3">{{ $menu->created_at?->format('d M Y') }}</p>
            <p class="fs-6" style="line-height:1.7rem;">{{ $menu->deskripsi }}</p>
        </div>
    </div>
</div>
@endsection
