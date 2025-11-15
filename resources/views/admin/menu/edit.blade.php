@extends('layouts.admin')

@section('content')
<h3 class="fw-bold mb-3">Edit Menu</h3>

<form action="{{ route('admin.menu.update', $menu->id) }}" method="POST">
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
        <label>Jadwal</label>
        <select name="jadwal" class="form-select">
            <option value="Sarapan" {{ $menu->jadwal == 'Sarapan' ? 'selected' : '' }}>Sarapan</option>
            <option value="Makan Siang" {{ $menu->jadwal == 'Makan Siang' ? 'selected' : '' }}>Makan Siang</option>
            <option value="Makan Malam" {{ $menu->jadwal == 'Makan Malam' ? 'selected' : '' }}>Makan Malam</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Perbarui</button>
    <a href="{{ route('admin.menu.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
