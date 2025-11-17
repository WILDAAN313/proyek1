@extends('layouts.admin')

@section('content')
<div class="container mt-4">
<<<<<<< HEAD
    <h3>Edit Artikel</h3>

    <form action="{{ route('admin.artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ $artikel->judul }}" required>
        </div>

        <div class="mb-3">
            <label>Penulis</label>
            <input type="text" name="penulis" class="form-control" value="{{ $artikel->penulis }}">
        </div>

        <div class="mb-3">
            <label>Isi</label>
            <textarea name="isi" rows="6" class="form-control" required>{{ $artikel->isi }}</textarea>
        </div>

        <div class="mb-3">
            <label>Gambar</label><br>
            @if($artikel->gambar)
                <img src="{{ asset('storage/'.$artikel->gambar) }}" width="180" class="mb-2 rounded">
            @endif
            <input type="file" name="gambar" class="form-control">
        </div>

        <button class="btn btn-success">Update</button>
        <a href="{{ route('admin.artikel.index') }}" class="btn btn-secondary">Kembali</a>
=======
    <h2>Edit Kategori</h2>
    <form action="{{ route('kategori.update', $kategori->id_kategori) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Judul Kategori</label>
            <input type="text" name="judul" value="{{ $kategori->judul }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Konten</label>
            <textarea name="konten" class="form-control" rows="6" required>{{ $kategori->konten }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Perbarui</button>
        <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>
>>>>>>> 530378fdec9747212f25d0f45cb49dc5a49f559d
    </form>
</div>
@endsection
