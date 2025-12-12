@php
    use Illuminate\Support\Str;
    use Illuminate\Support\Facades\Storage;
@endphp
<nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top" style="z-index: 50;">
    <div class="container py-2">
        <a class="navbar-brand d-flex align-items-center fw-bold" href="{{ route('home') }}" style="color:#1fb879;">
            <img src="{{ asset('images/logo.png') }}" alt="FitLife Logo" class="me-2"
                style="width:36px; height:36px; object-fit:contain;">
            FitLife.id
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                <li class="nav-item">
                    <a class="nav-link px-3 {{ request()->is('/') || request()->is('home') ? 'fw-semibold text-success' : '' }}"
                        href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 {{ request()->is('kalkulator') ? 'fw-semibold text-success' : '' }}"
                        href="{{ route('kalkulator') }}">Kalkulator BMI</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 {{ request()->is('menu*') ? 'fw-semibold text-success' : '' }}"
                        href="{{ route('menu') }}">Menu Sehat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 {{ request()->is('artikel*') ? 'fw-semibold text-success' : '' }}"
                        href="{{ route('artikel.index') }}">Artikel</a>
                </li>
                <li class="nav-item ms-lg-2">
                    @if (Auth::check())
                        @php
                            $user = Auth::user();

                            // Tentukan URL foto yang dipakai
                            if (!empty($user->google_avatar)) {
                                // Jika avatar Google berupa URL langsung (http)
                                $profilePhoto = Str::startsWith($user->google_avatar, 'http')
                                    ? $user->google_avatar
                                    : Storage::url($user->google_avatar);
                            } elseif (!empty($user->photo)) {
                                // Jika foto upload biasa
                                $profilePhoto = Storage::url($user->photo);
                            } else {
                                // Default avatar
                                $profilePhoto = asset('default-user.png');
                            }
                        @endphp

                        {{-- Foto profil berbentuk bulat --}}
                        <a href="{{ route('test.profile') }}" class="d-inline-block"
                            style="width:30px; height:30px; border-radius:50%; overflow:hidden;">
                            <img src="{{ $profilePhoto }}" alt="Profile"
                                style="width:100%; height:100%; object-fit:cover;">
                        </a>
                    @else
                        {{-- Jika belum login --}}
                        <a class="btn btn-success px-3 py-2 rounded-pill fw-semibold" href="{{ route('auth.index') }}">
                            Login
                        </a>
                    @endif
                </li>


            </ul>
        </div>
    </div>
</nav>
