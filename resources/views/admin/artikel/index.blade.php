@extends('layouts.admin')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between mb-3">
        <h3>Data Artikel</h3>
        <a href="{{ route('admin.artikel.create') }}" class="btn btn-primary">+ Tambah Artikel</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th width="60">#</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Dibaca</th>
                <th width="180">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($data as $d)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $d->judul }}</td>
                <td>{{ $d->penulis ?? '-' }}</td>
                <td>{{ $d->dibaca }}</td>
                <td>
                    <a href="{{ route('admin.artikel.edit', $d->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('admin.artikel.destroy', $d->id) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('Yakin ingin menghapus?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>

            @empty
            <tr>
                <td colspan="5" class="text-center">Belum ada artikel</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{ $data->links() }}

</div>
@endsection
