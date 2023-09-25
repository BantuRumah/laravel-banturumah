<nav class="navbar navbar-expand-md navbar-light">
    <div class="container mt-3 mb-3">
        <div class="icon-web" style="margin-right: 10px">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('img/banturumah.png') }}" alt="banturumah_logo" style="width: 125px">
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">
                        Beranda
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('service') ? 'active' : '' }}" href="/service">
                        Layanan Kami
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('about-us') ? 'active' : '' }}" href="/about-us">
                        Tentang Kami
                    </a>
                </li>
            </ul>
            <div class="d-flex ms-auto justify-content-center">
                <center>
                    <a href="/login" class="btn btn-outline-primary" style="margin-right: 10px">Login</a>
                    <a href="/register" class="btn btn-outline-success">Register</a>
                </center>
            </div>
        </div>
    </div>
</nav>
