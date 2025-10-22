@extends('layouts.main')

@section('title', $title)

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card kalkulator-card shadow-lg p-4 w-100" style="max-width: 500px;">
        <h2 class="text-center mb-4">Kalkulator BMI</h2>

        <form method="POST" action="/kalkulator">
            @csrf
            <div class="mb-3">
                <label for="gender" class="form-label fw-bold">Jenis Kelamin:</label>
                <select name="gender" id="gender" class="form-control" required>
                    <option value="Pria">Pria</option>
                    <option value="Wanita">Wanita</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="tinggi" class="form-label fw-bold">Tinggi Badan (cm):</label>
                <input type="number" name="tinggi" id="tinggi" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="berat" class="form-label fw-bold">Berat Badan (kg):</label>
                <input type="number" name="berat" id="berat" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Hitung</button>
        </form>

        @if(session('hasil'))
            <div class="hasil alert alert-info text-center mt-4">
                {!! session('hasil') !!}
            </div>
        @endif
    </div>
</div>
@endsection
