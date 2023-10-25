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
                @auth
                    <div class="dropdown custom-dropdown">
                        <button class="btn btn-clear" type="button" data-bs-toggle="dropdown" id="userDropdown">
                            <div class="user-avatar">
                                <div class="avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                                <div class="user-name">{{ Auth::user()->name }}</div>
                            </div>
                        </button>
                        <div class="custom-dropdown-content" id="dropdownContent"></div>
                        <ul class="dropdown-menu" id="dropdownContent">
                            @if (Auth()->check())
                                @if (Auth()->user()->role == 'admin')
                                    <li>
                                        <a class="dropdown-item" href="/admin/dashboard">
                                            <i class="nav-icon fas fa-tachometer-alt"></i>
                                            Dashboard
                                        </a>
                                    </li>
                                @elseif (Auth()->user()->role == 'mitra')
                                    <li>
                                        <a class="dropdown-item" href="/mitra/dashboard">
                                            <i class="nav-icon fas fa-tachometer-alt"></i>
                                            Dashboard
                                        </a>
                                    </li>
                                @endif
                                <li>
                                    <a class="dropdown-item" href="javascript:void(0)" id="logoutButton">
                                        <i class="fa fa-sign-out-alt"></i>
                                        Logout
                                    </a>
                                </li>
                            @else
                                <li>
                                    <a class="dropdown-item" href="javascript:void(0)" id="logoutButton">
                                        <i class="fa fa-sign-out-alt"></i>
                                        Logout
                                    </a>
                                </li>
                            @endif

                        </ul>
                    </div>
                @else
                    <center>
                        <a href="/login" class="btn btn-outline-primary" style="margin-right: 10px">Login</a>
                        <a href="/register" class="btn btn-outline-success">Register</a>
                    </center>
                @endauth
            </div>
        </div>
    </div>
</nav>
