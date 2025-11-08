@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h3 class="fw-bold mb-3">Dashboard Admin</h3>

    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="card p-3 border-0 shadow-sm">
                <h6 class="text-muted mb-1">Total Pengguna</h6>
                <h3 class="text-success">{{ $userCount }}</h3>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-3 border-0 shadow-sm">
                <h6 class="text-muted mb-1">Total Menu</h6>
                <h3 class="text-success">{{ $menuCount }}</h3>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-3 border-0 shadow-sm">
                <h6 class="text-muted mb-1">Total Artikel</h6>
                <h3 class="text-success">{{ $artikelCount }}</h3>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <h5 class="fw-bold">Menu Terbaru</h5>
        <table class="table table-bordered table-striped mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Menu</th>
                    <th>Jadwal</th>
                    <th>Dilihat</th>
                </tr>
            </thead>
            <tbody>
                @forelse($menus as $index => $menu)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $menu->nama_menu }}</td>
                        <td>{{ $menu->jadwal }}</td>
                        <td>{{ $menu->dilihat ?? 0 }}x</td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center text-muted">Belum ada data</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
