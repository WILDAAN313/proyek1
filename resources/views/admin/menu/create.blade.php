@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <h2>Tambah Menu Baru</h2>
    <form action="{{ route('admin.menu.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nama Menu</label>
            <input type="text" name="nama_menu" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.menu.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
