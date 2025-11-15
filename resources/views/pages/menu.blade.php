@extends('layouts.main')

@section('content')

<style>
    .menu-banner {
        height: 280px;
        object-fit: cover;
        border-radius: 15px;
    }

    .menu-card {
        border: none;
        border-radius: 15px;
        overflow: hidden;
        background: #ffffff;
        transition: 0.3s;
    }

    .menu-card:hover {
        transform: translateY(-5px);
        box-shadow: 0px 8px 20px rgba(0,0,0,0.1);
    }

    .menu-img {
        height: 180px;
        object-fit: cover;
        width: 100%;
    }

    .badge-fitlife {
        background: #C8E6C9;
        color: #1B5E20;
        font-weight: 600;
        padding: 6px 10px;
        border-radius: 10px;
        font-size: 12px;
    }
</style>

<div class="container my-5">

    <h2 class="text-center fw-bold mb-2">Menu Sehat</h2>
    <p class="text-center text-muted mb-4">
        Resep makanan sehat, bergizi, dan cocok untuk mendukung pola hidup sehatmu 🌿
    </p>

   
    <div class="row justify-content-center mb-4">
        <div class="col-md-10">
            <img src="https://via.placeholder.com/1000x300"
                 class="img-fluid shadow menu-banner"
                 alt="Menu Banner">
        </div>
    </div>

    <div class="row">
        @forelse ($menus as $item)
            <div class="col-md-4 mb-4">
                <div class="card menu-card shadow-sm h-100">

                    <img src="{{ $item->gambar ? asset('storage/' . $item->gambar) : 'https://via.placeholder.com/400x200' }}"
                         class="menu-img"
                         alt="Menu Image">

                    <div class="card-body">

                        <h5 class="fw-bold">{{ $item->nama_menu }}</h5>

                        @if($item->kategori)
                        <span class="badge-fitlife">{{ $item->kategori }}</span>
                        @endif

                        <p class="text-muted small mt-2" style="font-size: 14px;">
                            {{ Str::limit($item->deskripsi, 100) }}
                        </p>

                                      <div class="d-flex justify-content-between text-muted mb-2">
                            <span>🔥 {{ $item->kalori ?? 0 }} kal</span>
                            <span>⏱️ {{ $item->waktu ?? 0 }} menit</span>
                        </div>

                        @if ($item->bahan)
                            <p class="small text-dark mb-1"><strong>Bahan-bahan:</strong></p>
                            <div class="d-flex flex-wrap gap-1">
                                @foreach (explode(',', $item->bahan) as $b)
                                    <span class="badge bg-light text-dark border">
                                        {{ trim($b) }}
                                    </span>
                                @endforeach
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        @empty
            <p class="text-center text-muted">Belum ada menu yang tersedia.</p>
        @endforelse
    </div>

</div>

@endsection
