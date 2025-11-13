@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <h3 class="fw-bold mb-3">Daftar Pengguna</h3>

        {{-- Search --}}
        <div class="d-flex justify-content-start mb-3 flex-wrap gap-2">
            <form class="d-flex" action="#" method="GET">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari Nama / Email"
                        value="{{ request('search') }}">
                    <button class="btn btn-outline-success" type="submit" aria-label="Cari">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered align-middle text-center">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th class="text-start">Nama</th>
                        <th>Email</th>
                        <th>Peran</th>
                        <th>Status</th>
                        <th style="width: 180px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $index => $user)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td class="text-start">{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td><span class="badge bg-info text-dark">{{ $user->role ?? 'User' }}</span></td>
                            <td>
                                <span class="badge {{ $user->is_active ?? true ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $user->is_active ?? true ? 'Aktif' : 'Nonaktif' }}
                                </span>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-primary" disabled title="Belum ada halaman edit">
                                    <i class="bi bi-pencil-square me-1"></i> Edit
                                </button>
                                <button class="btn btn-sm btn-danger" disabled title="Belum ada fitur hapus">
                                    <i class="bi bi-trash me-1"></i> Hapus
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-muted">Belum ada data pengguna</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
