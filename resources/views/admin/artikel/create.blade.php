@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h3>Tambah Artikel</h3>

        <form action="{{ route('admin.artikel.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <select name="kategori" class="form-control" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($kategori as $k)
                        <option value="{{ $k->nama_kategori }}"
                            {{ old('kategori', $artikel->kategori ?? '') == $k->nama_kategori ? 'selected' : '' }}>
                            {{ $k->nama_kategori }}
                        </option>
                    @endforeach
                </select>
                <small class="text-muted">Kategori akan disimpan sebagai teks</small>
            </div>
            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" name="judul" class="form-control" value="{{ old('judul') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Penulis</label>
                <input type="text" name="penulis" class="form-control" value="{{ old('penulis') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Isi</label>
                <textarea name="isi" rows="6" class="form-control" required>{{ old('isi') }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Gambar</label>
                <input type="file" name="gambar" class="form-control">
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="1" id="is_featured" name="is_featured"
                    {{ old('is_featured') ? 'checked' : '' }}>
                <label class="form-check-label" for="is_featured">
                    Tandai sebagai artikel unggulan
                </label>
            </div>

            <button class="btn btn-success">Simpan</button>
            <a href="{{ route('admin.artikel.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
