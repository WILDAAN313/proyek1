@extends('layouts.main')

@section('title', $title)

@section('content')
<style>
    .calc-hero {
        background: linear-gradient(120deg, #1fb879 0%, #0ea36b 100%);
        color: #fff;
        padding: 60px 0 80px;
    }
    .calc-card {
        margin-top: -80px;
        background: #fff;
        border-radius: 18px;
        box-shadow: 0 20px 44px rgba(0,0,0,0.12);
    }
</style>

<section class="calc-hero text-center">
    <div class="container">
        <h2 class="fw-bold mb-2">Kalkulator BMI</h2>
        <p class="mb-0">Hitung indeks massa tubuh dan dapatkan rekomendasi kategori kesehatan Anda</p>
    </div>
</section>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card calc-card p-4">
                <form method="POST" action="/kalkulator">
                    @csrf
                    <div class="mb-3">
                        <label for="gender" class="form-label fw-bold">Jenis Kelamin</label>
                        <select name="gender" id="gender" class="form-select" required>
                            <option value="Pria">Pria</option>
                            <option value="Wanita">Wanita</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="tinggi" class="form-label fw-bold">Tinggi Badan (cm)</label>
                        <input type="number" name="tinggi" id="tinggi" class="form-control" required min="1">
                    </div>

                    <div class="mb-3">
                        <label for="berat" class="form-label fw-bold">Berat Badan (kg)</label>
                        <input type="number" name="berat" id="berat" class="form-control" required min="1">
                    </div>

                    <button type="submit" class="btn btn-fitlife w-100">Hitung BMI</button>
                </form>

                @if(session('hasil'))
                    <div class="alert alert-success text-center mt-4">
                        {!! session('hasil') !!}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
