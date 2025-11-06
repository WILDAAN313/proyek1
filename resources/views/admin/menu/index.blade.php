@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Daftar Menu Sehat</h1>
    <a href="{{ route('admin.menu.create') }}" class="btn btn-primary mb-3">+ Tambah Menu</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Menu</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($menu as $m)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $m->nama_menu }}</td>
                    <td>{{ $m->deskripsi }}</td>
                    <td>
                        <a href="{{ route('admin.menu.edit', $m->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.menu.destroy', $m->id) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
