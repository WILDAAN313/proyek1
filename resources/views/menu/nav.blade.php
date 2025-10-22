<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
       <a class="navbar-brand" href="/">
    <span class="fit">Fit</span><span class="life">Life</span>
</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" 
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ ($slug === 'home') ? 'active' : '' }}" href="/home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($slug === 'kalkulator') ? 'active' : '' }}" href="/kalkulator">Kalkulator</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($slug === 'menu') ? 'active' : '' }}" href="/menu">Menu Sehat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($slug === 'artikel') ? 'active' : '' }}" href="/artikel">Artikel</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
