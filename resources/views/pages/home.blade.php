@extends('layouts.main')

@section('title', $title)

@section('content')

<style>
    :root {
        --fitlife-green: #33aa66;
        --fitlife-green-dark: #2f8b57;
        --fitlife-text-dark: #3a3a3a;
        --fitlife-bg-light: #f9fafa;
    }

    .artikel-wrapper {
        background-color: var(--fitlife-bg-light);
        padding-top: 40px;
        padding-bottom: 60px;
    }

    .carousel-inner img {
        height: 420px;
        object-fit: cover;
        filter: brightness(92%);
    }

    .artikel-section h2 {
        font-size: 32px;
        font-weight: 700;
        color: var(--fitlife-green); 
        letter-spacing: 1px;
        text-transform: uppercase;
    }

    .artikel-card {
        border: none;
        background: #ffffff;
        transition: all .3s ease;
        border-radius: 16px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.08); 
        overflow: hidden; 
      }

    .artikel-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 28px rgba(0,0,0,0.12); 
            }

    .artikel-img {
        width: 160px;
        height: 120px;
        object-fit: cover;
        border-radius: 14px; 
    }

    .artikel-card .card-title {
        color: var(--fitlife-green);
        font-weight: 700;
    }

    .artikel-card .card-text {
        color: #555; 
        font-size: 0.95rem;
    }

    .btn-fitlife {
        background-color: var(--fitlife-green);
        color: white;
        font-weight: 600;
        border-radius: 50px; 
        padding: 8px 22px;
        text-decoration: none;
        transition: all .3s ease;
        border: none;
        box-shadow: 0 4px 15px rgba(51,170,102,0.3); 
        display: inline-block; 
    }

    .btn-fitlife:hover {
        background-color: var(--fitlife-green-dark);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(51,170,102,0.4);
    }

</style>

<div class="container text-center">
    <div id="carouselExampleIndicators" class="carousel slide mb-5 shadow-sm rounded" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></button>
        </div>
        <div class="carousel-inner rounded-4 overflow-hidden">
            <div class="carousel-item active">
                <img src="{{ asset('images/gambar_menu.jpg') }}" class="d-block w-100" alt="Gambar 1">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/sayuran.jpg') }}" class="d-block w-100" alt="Gambar 2">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/salad.jpg') }}" class="d-block w-100" alt="Gambar 3">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</div>

<div class="artikel-wrapper">
    <div class="container text-center">
        <div class="artikel-section">

            <h2 class="mb-4">Artikel Kesehatan</h2>
            <div class="card mb-4 p-3 d-flex flex-row align-items-center artikel-card">
                <img src="{{ asset('images/sayuran.jpg') }}" alt="Sayuran" class="artikel-img me-3">
                <div class="card-body text-start">
                    <h5 class="card-title">Manfaat Sayuran Hijau</h5>
                    <p class="card-text">
                        Sayuran hijau kaya akan serat, vitamin, dan mineral yang membantu menjaga tubuh tetap bugar.
                    </p>
                                      <a href="/artikel" class="btn-fitlife mt-2">Baca Selengkapnya</a>
                </div>
            </div>

            <div class="card mb-4 p-3 d-flex flex-row align-items-center artikel-card">
                <img src="{{ asset('images/salad.jpg') }}" alt="Salad" class="artikel-img me-3">
                <div class="card-body text-start">
                    <h5 class="card-title">Rahasia Salad Buah Segar</h5>
                    <p class="card-text">
                        Kombinasi buah segar memberikan energi alami dan antioksidan sangat baik untuk tubuh.
                    </p>
                    <a href="/artikel" class="btn-fitlife mt-2">Baca Selengkapnya</a>
                </div>
            </div>

            <div class="card mb-4 p-3 d-flex flex-row align-items-center artikel-card">
                <img src="{{ asset('images/jus buah.jpg') }}" alt="Jus Buah" class="artikel-img me-3">
                <div class="card-body text-start">
                    <h5 class="card-title">Pentingnya Konsumsi Buah</h5>
                    <p class="card-text">
                        Buah tidak hanya menjaga kesehatan tetapi juga mampu meningkatkan mood harian.
                    </p>
                    <a href="/artikel" class="btn-fitlife mt-2">Baca Selengkapnya</a>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection