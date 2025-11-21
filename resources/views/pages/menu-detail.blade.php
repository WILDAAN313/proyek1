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
            <div class="d-flex gap-4 align-items-center mb-3 text-muted">
                <div class="d-flex align-items-center gap-2 fw-semibold">
                    <span class="badge bg-success-subtle text-success rounded-3 p-2">
                        <i class="bi bi-fire"></i>
                    </span>
                    <span>{{ !is_null($menu->kalori ?? null) ? $menu->kalori . ' kkal' : 'Kalori belum ada' }}</span>
                </div>
                <div class="d-flex align-items-center gap-2 fw-semibold">
                    <span class="badge bg-success-subtle text-success rounded-3 p-2">
                        <i class="bi bi-clock-history"></i>
                    </span>
                    <span>{{ !is_null($menu->waktu_memasak ?? null) ? $menu->waktu_memasak . ' menit' : 'Waktu belum ada' }}</span>
                </div>
            </div>
            <p class="fs-6" style="line-height:1.7rem;">{{ $menu->deskripsi }}</p>
        </div>
    </div>
</div>
@endsection
