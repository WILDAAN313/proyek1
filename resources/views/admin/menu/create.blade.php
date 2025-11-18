@extends('layouts.admin')
@section('content')
<h3 class="fw-bold mb-3">Tambah Menu Baru</h3>

<form action="{{ route('admin.menu.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label>Nama Menu</label>
        <input type="text" name="nama_menu" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="3" required></textarea>
    </div>

    <div class="mb-3">
        <label>Kalori (kcal)</label> 
        <input type="number" name="calories" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Waktu Memasak (menit)</label>
        <input type="number" name="waktu" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Bahan-bahan</label>
        <textarea name="bahan_bahan" class="form-control" rows="3" placeholder="contoh: Pisang, Strawberry, Granola"></textarea>
    </div>

    <div class="mb-3">
        <label>Jadwal</label>
        <select name="jadwal" class="form-select">
            <option value="Sarapan">Sarapan</option>
            <option value="Makan Siang">Makan Siang</option>
            <option value="Makan Malam">Makan Malam</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Foto Menu</label>
        <input type="file" name="gambar" class="form-control">
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('admin.menu.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
