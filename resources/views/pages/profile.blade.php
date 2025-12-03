@extends('layouts.main')

@section('content')
<style>
    .profile-wrapper {
        max-width: 800px;
        margin: auto;
        background: #ffffff;
        padding: 30px;
        border-radius: 20px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        margin-top: 40px;
        margin-bottom: 80px;
    }

    .profile-photo {
        width: 110px;
        height: 110px;
        border-radius: 50%;
        object-fit: cover;
        border: 5px solid #29a745;
        cursor: pointer;
    }

    .title {
        font-size: 28px;
        font-weight: 700;
        color: #2b2b2b;
    }

    .section-title {
        font-size: 20px;
        font-weight: 600;
        color: #2b2b2b;
        margin-bottom: 15px;
        padding-left: 10px;
        border-left: 5px solid #28a745;
    }
</style>

<div class="container text-center mb-4">
    <form action="{{ route('test.profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="photoInput">
            <img src="{{ Auth::user()->photo ? asset('storage/profile/' . Auth::user()->photo) : asset('default-user.png') }}"
                id="profilePreview" class="profile-photo mt-4">
        </label>

        <input type="file" id="photoInput" name="photo" class="d-none" accept="image/*">

        <h2 class="title mt-3">Profile</h2>
        <p class="text-muted">Kelola Informasi Pribadi Anda</p>

</div>

<div class="profile-wrapper">

    <div class="section-title">Informasi Pribadi</div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="name" class="form-control editable"
                    value="{{ Auth::user()->nama_lengkap }}" readonly>
            </div>

            <div class="col-md-6">
                <label class="form-label">Email</label>
                <input type="text" name="email" class="form-control editable"
                    value="{{ Auth::user()->email }}" readonly>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Nomor Telepon</label>
                <input type="text" name="phone" class="form-control editable"
                    value="{{ Auth::user()->phone }}" readonly>
            </div>

            <div class="col-md-6">
                <label class="form-label">Tanggal Lahir</label>
                <input type="date" name="birthdate" class="form-control editable"
                    value="{{ Auth::user()->birthdate }}" readonly>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6">
                <label class="form-label">Berat Badan (kg)</label>
                <input type="text" name="weight" class="form-control editable"
                    value="{{ Auth::user()->weight }}" readonly>
            </div>

            <div class="col-md-6">
                <label class="form-label">Tinggi Badan (cm)</label>
                <input type="text" name="height" class="form-control editable"
                    value="{{ Auth::user()->height }}" readonly>
            </div>
        </div>

        <div class="text-end">
            <button type="button" id="editBtn" class="btn btn-success px-4">Edit Profile</button>
            <button type="submit" id="saveBtn" class="btn btn-primary px-4 d-none">Simpan Perubahan</button>
        </div>

    </form> 
</div>

<script>
    document.getElementById("photoInput").addEventListener("change", function (e) {
        let reader = new FileReader();
        reader.onload = () => {
            document.getElementById("profilePreview").src = reader.result;
        };
        reader.readAsDataURL(e.target.files[0]);
        e.target.form.submit();
    });

    document.getElementById("editBtn").addEventListener("click", function () {
        document.querySelectorAll(".editable").forEach(inp => inp.removeAttribute("readonly"));
        document.getElementById("editBtn").classList.add("d-none");
        document.getElementById("saveBtn").classList.remove("d-none");
    });
</script>

@endsection
