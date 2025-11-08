@include('menu.header')
@include('menu.nav')

<div class="container py-5">
    <h1 class="text-center mb-4">Menu Sehat</h1>

    <div class="row justify-content-center">
        @forelse ($menus as $menu)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $menu->nama_menu }}</h5>
                        <p class="card-text text-muted">{{ $menu->deskripsi }}</p>
                        <span class="badge bg-success">{{ $menu->jadwal }}</span>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center text-muted">Belum ada menu yang tersedia.</p>
        @endforelse
    </div>
</div>

@include('menu.footer')
