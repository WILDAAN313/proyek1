<nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top" style="z-index: 50;">
    <div class="container py-2">
        <a class="navbar-brand d-flex align-items-center fw-bold" href="{{ route('landing') }}" style="color:#1fb879;">
            <span class="rounded-circle d-inline-flex align-items-center justify-content-center me-2"
                  style="width:36px;height:36px;background:#e8f8ef;">
                <span style="font-weight:800;color:#0da36b;">F</span>
            </span>
            FitLife.id
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                <li class="nav-item">
                    <a class="nav-link px-3 {{ request()->is('/') || request()->is('home') ? 'fw-semibold text-success' : '' }}" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 {{ request()->is('kalkulator') ? 'fw-semibold text-success' : '' }}" href="{{ route('kalkulator') }}">Kalkulator BMI</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 {{ request()->is('menu*') ? 'fw-semibold text-success' : '' }}" href="{{ route('menu') }}">Menu Sehat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 {{ request()->is('artikel*') ? 'fw-semibold text-success' : '' }}" href="{{ route('artikel.index') }}">Artikel</a>
                </li>
                <li class="nav-item ms-lg-2">
                    <a class="btn btn-outline-success rounded-circle d-inline-flex align-items-center justify-content-center" href="{{ route('auth.index') }}" style="width:42px;height:42px;">
                        <i class="bi bi-person"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
