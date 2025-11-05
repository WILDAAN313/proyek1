@extends('layouts.main')

@section('title', $title)

@section('content')
<div class="container text-center">
    <div id="carouselExampleIndicators" class="carousel slide mb-5 shadow-sm" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></button>
        </div>
        <div class="carousel-inner rounded">
            <div class="carousel-item active">
                <img src="{{ asset('images/gambar_menu.jpg') }}" class="d-block w-100" alt="Gaya Hidup Sehat">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/sayuran.jpg') }}" class="d-block w-100" alt="olahan Sehat">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/salad.jpg') }}" class="d-block w-100" alt="makananTeratur">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

  <div class="artikel-section mt-4">
        <h2 class="text-center mb-4 text-success fw-bold">Artikel Kesehatan</h2>

        <div class="card mb-4 shadow-sm p-3 rounded-4 d-flex flex-row align-items-center artikel-card">
            <img src="{{ asset('images/sayuran.jpg') }}" alt="Sayuran" class="artikel-img rounded-4 me-3">
            <div class="card-body text-start">
                <h5 class="card-title fw-bold">Manfaat Sayuran Hijau</h5>
                <p class="card-text text-muted">
                    Sayuran hijau kaya akan serat, vitamin, dan mineral yang membantu menjaga sistem kekebalan tubuh serta menurunkan risiko penyakit kronis.
                </p>
                <a href="/artikel" class="btn btn-outline-success btn-sm">Baca Selengkapnya</a>
            </div>
        </div>

        <div class="card mb-4 shadow-sm p-3 rounded-4 d-flex flex-row align-items-center artikel-card">
            <img src="{{ asset('images/salad.jpg') }}" alt="Salad" class="artikel-img rounded-4 me-3">
            <div class="card-body text-start">
                <h5 class="card-title fw-bold">Rahasia Salad Buah Segar</h5>
                <p class="card-text text-muted">
                    Salad buah adalah pilihan tepat untuk menjaga berat badan. Kombinasi buah segar memberikan energi alami dan antioksidan tinggi.
                </p>
                <a href="/artikel" class="btn btn-outline-success btn-sm">Baca Selengkapnya</a>
            </div>
        </div>

        <div class="card mb-4 shadow-sm p-3 rounded-4 d-flex flex-row align-items-center artikel-card">
            <img src="{{ asset('images/jus buah.jpg') }}" alt="jus buah" class="artikel-img rounded-4 me-3">
            <div class="card-body text-start">
                <h5 class="card-title fw-bold">Pentingnya buah buahan</h5>
                <p class="card-text text-muted">
                    buah buahan tidak hanya menjaga kebugaran tubuh tetapi juga meningkatkan mood dan memperkuat sistem imun.
                </p>
                <a href="/artikel" class="btn btn-outline-success btn-sm">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
