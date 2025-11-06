@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <h2>Tambah Artikel Baru</h2>
    <form action="{{ route('admin.artikel.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Judul Artikel</label>
            <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Konten</label>
            <textarea name="konten" class="form-control" rows="6" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.artikel.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
