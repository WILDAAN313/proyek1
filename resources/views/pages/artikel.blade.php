@extends('layouts.main')

@section('content')

<style>
    .featured-box img {
        width: 100%;
        height: 350px;
        object-fit: cover;
        border-radius: 12px;
    }
    .featured-title {
        font-size: 28px;
        font-weight: 700;
        margin-top: 15px;
    }
    .featured-desc {
        color: #555;
        margin-top: 10px;
        margin-bottom: 20px;
    }

    .artikel-card {
        border-radius: 12px;
        overflow: hidden;
        background: #ffffff;
        box-shadow: 0px 3px 10px rgba(0,0,0,0.1);
        transition: 0.2s;
    }
    .artikel-card:hover {
        transform: translateY(-4px);
    }
    .artikel-card img {
        width: 100%;
        height: 180px;
        object-fit: cover;
    }
    .artikel-title {
        font-size: 18px;
        font-weight: 700;
    }
    .artikel-desc {
        color: #555;
        height: 60px;
        overflow: hidden;
    }
</style>


<div class="container py-4">

    @if($featured)
    <div class="featured-box mb-5">
        <img src="{{ asset('storage/' . $featured->gambar) }}" alt="">

        <div class="featured-title">
            {{ $featured->judul }}
        </div>

        <div class="featured-desc">
            {{ Str::limit(strip_tags($featured->isi), 180) }}
        </div>

        <a href="{{ route('artikel.show', $featured->slug) }}" class="btn btn-primary px-4">
            Lihat Artikel
        </a>
    </div>
    @endif

    <h4 class="mb-3 fw-bold">Artikel Lainnya</h4>

    <div class="row g-4">

        @foreach($artikels as $a)
        @if($a->id != $featured->id)
        <div class="col-md-4">
            <div class="artikel-card">
                <img src="{{ asset('storage/' . $a->gambar) }}" alt="">

                <div class="p-3">
                    <div class="artikel-title">{{ $a->judul }}</div>
                    <div class="artikel-desc">
                        {{ Str::limit(strip_tags($a->isi), 80) }}
                    </div>

                    <a href="{{ route('artikel.show', $a->slug) }}" class="btn btn-outline-primary w-100 mt-2">
                        Baca Selengkapnya
                    </a>
                </div>
            </div>
        </div>
        @endif
        @endforeach

    </div>
</div>

@endsection
