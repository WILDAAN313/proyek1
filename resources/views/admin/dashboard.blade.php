@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h2 class="fw-bold mb-4">Dashboard Admin</h2>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="card shadow-sm border-0 p-3">
                <h6 class="text-muted">Total Pengguna</h6>
                <h3>{{ $userCount ?? 0 }}</h3>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0 p-3">
                <h6 class="text-muted">Total Menu Sehat</h6>
                <h3>{{ $menuCount ?? 0 }}</h3>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0 p-3">
                <h6 class="text-muted">Total Artikel</h6>
                <h3>{{ $artikelCount ?? 0 }}</h3>
            </div>
        </div>
    </div>

    <hr class="my-4">

    <div class="row">
        <div class="col-md-12">
            <h5 class="fw-bold mb-3">Daftar Menu Sehat Terbaru</h5>
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Menu</th>
                        <th>Kategori</th>
                        <th>Kalori</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($menus as $menu)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $menu->nama_menu }}</td>
                        <td>{{ $menu->kategori ?? '-' }}</td>
                        <td>{{ $menu->kalori ?? '-' }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">Belum ada data menu</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
