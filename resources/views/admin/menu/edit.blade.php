@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <h2>Edit Menu</h2>
    <form action="{{ route('admin.menu.update', $menu->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama Menu</label>
            <input type="text" name="nama_menu" value="{{ $menu->nama_menu }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="4" required>{{ $menu->deskripsi }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Perbarui</button>
        <a href="{{ route('admin.menu.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
