@extends('layouts.admin')

@section('content')
<h3 class="fw-bold mb-3">Edit Menu</h3>

<form action="{{ route('admin.menu.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nama Menu</label>
        <input type="text" name="nama_menu" value="{{ $menu->nama_menu }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="3" required>{{ $menu->deskripsi }}</textarea>
    </div>

    <div class="mb-3">
        <label>Kalori (kkal)</label>
        <input type="number" name="kalori" value="{{ $menu->kalori }}" class="form-control" min="0" placeholder="Contoh: 250">
    </div>

    <div class="mb-3">
        <label>Waktu Memasak (menit)</label>
        <input type="number" name="waktu_memasak" value="{{ $menu->waktu_memasak }}" class="form-control" min="0" placeholder="Contoh: 30">
    </div>

    <div class="mb-3">
        <label>Foto Menu</label><br>
        @if($menu->gambar)
            <img src="{{ Storage::url($menu->gambar) }}" alt="Foto {{ $menu->nama_menu }}" class="rounded mb-2" width="160">
        @endif
        <input type="file" name="gambar" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Perbarui</button>
    <a href="{{ route('admin.menu.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
