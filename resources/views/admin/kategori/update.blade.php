@extends('layouts.admin')
@section('content')
    <h2>Update Kategori</h2>
    <form method="POST" action="/kategori/update/{{ $kategori->id_kategori }}">
        {{ csrf_field() }}
        <div class="mb-3">
            <label class="form-label">ID Kategori</label>
            <input type="text" class="form-control" value="{{ $kategori->id_kategori }}" disabled>
        </div>
        <div class="mb-3">
            <label class="form-label">Nama Kategori</label>
            <input type="text" name="nama_kategori" class="form-control"
                   value="{{ $kategori->nama_kategori }}" required>
        </div>
        <a href="/kategori" class="btn btn-secondary">KEMBALI</a>
        <button type="submit" class="btn btn-primary">UPDATE</button>
    </form>
@endsection
