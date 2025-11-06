@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Daftar Artikel Kesehatan</h2>
    <a href="{{ route('admin.artikel.create') }}" class="btn btn-success mb-3">+ Tambah Artikel</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Konten</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($artikel as $a)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $a->judul }}</td>
                    <td>{{ Str::limit($a->konten, 100) }}</td>
                    <td>
                        <a href="{{ route('admin.artikel.edit', $a->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.artikel.destroy', $a->id) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus artikel ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center">Belum ada data artikel.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
