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
            <table class="table table-bordered align-middle text-center">
                <thead class="table-light">
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
                            <td class="text-start">{{ $item->nama_menu }}</td>
                            <td>
                                <span
                                    class="badge {{ $item->jadwal === 'Sarapan' ? 'bg-warning text-dark' : 'bg-success' }}">
                                    {{ $item->jadwal ?? '-' }}
                                </span>
                            </td>
                            <td>{{ $item->dilihat ?? 0 }}x</td>
                            <td>
                                <a href="{{ route('admin.menu.edit', $item->id) }}" class="btn btn-sm btn-primary">
                                    <i class="bi bi-pencil-square me-1"></i> Edit
                                </a>
                                <form action="{{ route('admin.menu.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin ingin menghapus menu ini?')">
                                        <i class="bi bi-trash me-1"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-muted">Belum ada data menu</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection