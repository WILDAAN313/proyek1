@extends('layouts.main')

@section('content')
<style>
    .profile-header {
        text-align: center;
        margin-top: 30px;
        margin-bottom: 20px;
    }

    .profile-icon {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        background-color: #4CAF50;
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
        font-size: 32px;
        margin: 0 auto 15px;
    }

    .profile-title {
        font-size: 28px;
        font-weight: bold;
    }

    .profile-subtitle {
        color: gray;
        margin-top: -5px;
    }

    .profile-card {
        width: 70%;
        margin: 0 auto;
        background: white;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    }

    .profile-section-title {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 20px;
        border-left: 4px solid #4CAF50;
        padding-left: 10px;
    }

    .btn-edit {
        float: right;
        margin-top: -40px;
    }
</style>

<div class="container">

    <!-- HEADER -->
    <div class="profile-header">
        <div class="profile-icon">
            <i class="bi bi-person"></i>
        </div>
        <div class="profile-title">Profile</div>
        <div class="profile-subtitle">Kelola Informasi Pribadi Anda</div>
    </div>

    <!-- CARD -->
    <div class="profile-card">

        <div class="profile-section-title">
            Informasi Pribadi
        </div>

        <a href="#" class="btn btn-success btn-sm btn-edit">Edit Profile</a>

        <div class="row mt-4">
            <div class="col-md-6 mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" value="{{ Auth::user()->name }}" readonly>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Email</label>
                <input type="text" class="form-control" value="{{ Auth::user()->email }}" readonly>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Nomor Telepon</label>
                <input type="text" class="form-control" placeholder="08123456789">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Berat Badan (kg)</label>
                <input type="number" class="form-control" placeholder="40 kg">
            </div>

            <div class="col-md-6 mb-4">
                <label class="form-label">Tinggi Badan (cm)</label>
                <input type="number" class="form-control" placeholder="160 cm">
            </div>
        </div>

    </div>
</div>

@endsection
