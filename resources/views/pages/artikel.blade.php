@extends('layouts.main')

@section('content')
    @php
        $featuredId = optional($featured)->id;
    @endphp

    <style>
        .artikel-hero {
            background: #e9f6ef;
            padding: 50px 0 30px;
        }

        .artikel-card {
            border: 1px solid #e5ece8;
            border-radius: 16px;
            background: #fff;
            overflow: hidden;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.06);
            transition: 0.2s ease;
            height: 100%;
        }

        .artikel-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 36px rgba(0, 0, 0, 0.08);
        }

        .artikel-card img {
            width: 100%;
            height: 170px;
            object-fit: cover;
        }

        .featured-box {
            border-radius: 22px;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.12);
            background: #ffffff;
        }

        .pill {
            display: inline-block;
            padding: 8px 14px;
            background: #e7f8ef;
            color: #0da36b;
            border-radius: 999px;
            font-weight: 600;
            font-size: 12px;
        }

        .fitlife-icon {
            width: 80px;
            height: 80px;
            background: #e8f8ef;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .fitlife-icon i {
            font-size: 42px;
            color: #1fb879;
        }

        .input-group-lg .form-control::placeholder {
            font-size: 14px;
            opacity: 0.7;
        }
    </style>

    <section class="artikel-hero">
        <div class="container text-center">
            <div class="fitlife-icon mx-auto mb-2"><i class="bi bi-journal-text"></i></div>
            <h2 class="fw-bold mb-2">Artikel Diet & Kesehatan</h2>
            <p class="text-muted mb-4">Baca artikel terbaru seputar diet, nutrisi, dan tips hidup sehat dari para ahli</p>
            <div class="mx-auto" style="max-width: 540px;">
                <div class="input-group input-group-lg">
                    <span class="input-group-text bg-white border-end-0">
                        <i class="bi bi-search"></i>
                    </span>
                    <input type="text" class="form-control border-start-0"
                        placeholder="Cari berdasarkan kategori yang diinginkan" readonly>
                </div>
            </div>
        </div>
    </section>

    @if ($featured)
        <section class="py-4">
            <div class="container">
                <div class="featured-box">
                    <div class="row g-0">
                        <div class="col-md-6">
                            <img src="{{ $featured->gambar ? Storage::url($featured->gambar) : asset('images/jus buah.jpg') }}"
                                alt="{{ $featured->judul }}" style="width:100%;height:100%;object-fit:cover;">
                        </div>
                        <div class="col-md-6 p-4 d-flex flex-column justify-content-center">
                            <div class="pill mb-3">{{ $featured->kategori ?? 'Artikel Unggulan' }}</div>
                            <h3 class="fw-bold mb-2">{{ $featured->judul }}</h3>
                            <p class="text-muted">{{ Str::limit(strip_tags($featured->isi), 180) }}</p>
                            <div class="text-muted small mb-3">
                                <i
                                    class="bi bi-calendar me-1"></i>{{ $featured->created_at?->format('d F Y') ?? 'Terbit terbaru' }}
                            </div>
                            <a href="{{ route('artikel.show', $featured->slug) }}" class="btn btn-fitlife w-auto">Baca
                                Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section class="py-5" style="background:#f7fbf8;">
        <div class="container">
            <div class="row g-4">
                @forelse($artikels as $a)
                    @if ($featuredId && $featuredId === $a->id)
                        @continue
                    @endif
                    <div class="col-lg-4 col-md-6">
                        <div class="artikel-card">
                            <img src="{{ $a->gambar ? Storage::url($a->gambar) : asset('images/sayuran.jpg') }}"
                                alt="{{ $a->judul }}">
                            <div class="p-3">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="pill">{{ $a->kategori ?? 'Tips' }}</span>
                                    <span class="text-muted small"><i class="bi bi-calendar"></i>
                                        {{ $a->created_at?->format('d M Y') }}</span>
                                </div>
                                <h6 class="fw-bold">{{ $a->judul }}</h6>
                                <p class="text-muted small mb-3">{{ Str::limit(strip_tags($a->isi), 100) }}</p>
                                <a href="{{ route('artikel.show', $a->slug) }}" class="text-success fw-semibold">Baca
                                    Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-center text-muted">Belum ada artikel.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
