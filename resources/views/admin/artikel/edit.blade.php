@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <h2>Edit Artikel</h2>
    <form action="{{ route('admin.artikel.update', $artikel->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Judul Artikel</label>
            <input type="text" name="judul" value="{{ $artikel->judul }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Konten</label>
            <textarea name="konten" class="form-control" rows="6" required>{{ $artikel->konten }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Perbarui</button>
        <a href="{{ route('admin.artikel.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
