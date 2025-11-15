@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <h3 class="fw-bold mb-3">Daftar Menu Sehat</h3>

        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
          
            <form class="d-flex" action="#" method="GET">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari Jadwal Menu"
                        value="{{ request('search') }}">
                    <button class="btn btn-outline-success" type="submit" aria-label="Cari">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>

                 <a href="{{ route('admin.menu.create') }}" class="btn btn-success">
                <i class="bi bi-plus-lg me-1"></i> Tambah Menu
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
           <table class="table table-hover text-center align-middle">
    <thead style="background:#E8F5E9;">
        <tr>
            <th>No</th>
            <th>Menu</th>
            <th>Jadwal</th>
            <th>Dilihat</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($menus as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td class="text-start fw-semibold">{{ $item->nama_menu }}</td>
                <td>
                    <span class="badge px-3 py-2"
                        style="background:#C8E6C9; color:#2E7D32; font-size:13px;">
                        {{ $item->jadwal ?? '-' }}
                    </span>
                </td>
                <td class="text-primary fw-bold">{{ $item->dilihat ?? 0 }}x</td>
                <td>
                    <a href="{{ route('admin.menu.edit', $item->id) }}"
                    class="btn btn-sm"
                    style="background:#4CAF50; color:white;">Edit</a>

                    <form action="{{ route('admin.menu.destroy', $item->id) }}"
                          method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-muted">Belum ada data</td>
            </tr>
        @endforelse
    </tbody>
</table>

        </div>
    </div>
@endsection