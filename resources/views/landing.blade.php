<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>FitLife Landing</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

<nav class="d-flex justify-content-between align-items-center">
    <h3 class="text-success fw-bold">FitLife</h3>
    <div>
        <a href="/login" class="btn btn-outline-success me-2">Login</a>
        <a href="/register" class="btn btn-success">Daftar</a>
    </div>
</nav>

<section class="hero">
    <h1>Selamat Datang di <span>FitLife</span></h1>
    <p>Platform manajemen diet dan kesehatan untuk hidup lebih sehat</p>
    <a href="/register" class="btn btn-light btn-lg mt-2">Mulai Sekarang</a>
</section>

<div class="container text-center mt-5">
    <h2 class="fw-bold">Fitur Unggulan</h2>
    <p>Dapatkan panduan hidup sehat</p>

    <div class="row mt-4">
        <div class="col-md-4 mb-3">
            <div class="p-4 shadow feature-card">
                <h5>Kalkulator BMI</h5>
                <p>Hitung berat badan ideal</p>
                <a href="/login" class="btn btn-success">Lihat Detail</a>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="p-4 shadow feature-card">
                <h5>Menu Sehat</h5>
                <p>Rekomendasi makanan sehat</p>
                <a href="/login" class="btn btn-success">Lihat Detail</a>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="p-4 shadow feature-card">
                <h5>Artikel Kesehatan</h5>
                <p>Tips hidup sehat</p>
                <a href="/login" class="btn btn-success">Lihat Detail</a>
            </div>
        </div>
    </div>
</div>

<section class="footer-hero">
    <h1>Siap memulai perjalanan sehat anda?</h1>
    <p>bergabunglah dengan ribuan pengguna yang telah merasakan manfaat hidup yang lebih sehat</p>
        </section>

</body>
</html>
