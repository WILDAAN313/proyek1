@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h3>Edit Artikel</h3>

    <form action="{{ route('admin.artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ old('judul', $artikel->judul) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Penulis</label>
            <input type="text" name="penulis" class="form-control" value="{{ old('penulis', $artikel->penulis) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Isi</label>
            <textarea name="isi" rows="6" class="form-control" required>{{ old('isi', $artikel->isi) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Gambar</label><br>
            @if ($artikel->gambar)
                <img src="{{ asset('uploads/artikel/'.$artikel->gambar) }}" width="180" class="mb-2 rounded">
            @endif
            <input type="file" name="gambar" class="form-control">
        </div>

        <button class="btn btn-success">Update</button>
        <a href="{{ route('admin.artikel.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
