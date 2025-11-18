@extends('layouts.main')

@section('content')

<style>
    .detail-img {
        width: 100%;
        height: 380px;
        object-fit: cover;
        border-radius: 12px;
    }
    .detail-title {
        font-size: 32px;
        font-weight: 800;
        margin-top: 20px;
    }
    .detail-info {
        color: #666;
        margin-bottom: 20px;
    }
    .detail-content {
        font-size: 17px;
        line-height: 1.7rem;
        color: #333;
    }

    .artikel-card {
        border-radius: 12px;
        overflow: hidden;
        background: #fff;
        box-shadow: 0px 3px 10px rgba(0,0,0,0.1);
        transition: 0.2s;
    }
    .artikel-card:hover {
        transform: translateY(-4px);
    }
    .artikel-card img {
        width: 100%;
        height: 170px;
        object-fit: cover;
    }
</style>


<div class="container py-4">

    <img src="{{ asset('storage/' . $artikel->gambar) }}" class="detail-img" alt="">

    <h1 class="detail-title">
        {{ $artikel->judul }}
    </h1>

    <div class="detail-info">
        <span>📅 {{ $artikel->created_at->format('d M Y') }}</span> &nbsp; | &nbsp;
        <span>👁 {{ $artikel->dibaca }} kali dibaca</span>
    </div>

    <div class="detail-content mb-5">
        {!! nl2br($artikel->isi) !!}
    </div>
    @if(isset($artikels) && $artikels->count() > 1)
    <h3 class="fw-bold mb-3">Artikel Lainnya</h3>

    <div class="row g-4">
        @foreach($artikels as $a)
            @if($a->id != $artikel->id)
            <div class="col-md-4">
                <div class="artikel-card">
                    <img src="{{ asset('storage/' . $a->gambar) }}" alt="">

                    <div class="p-3">
                        <div class="fw-bold" style="font-size: 18px;">
                            {{ $a->judul }}
                        </div>

                        <div class="text-muted mb-2">
                            {{ Str::limit(strip_tags($a->isi), 80) }}
                        </div>

                        <a href="{{ route('artikel.show', $a->slug) }}"
                           class="btn btn-outline-primary w-100">
                            Baca Selengkapnya
                        </a>
                    </div>
                </div>
            </div>
            @endif
        @endforeach
    </div>
    @endif

</div>

@endsection
