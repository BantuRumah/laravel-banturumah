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
                @auth
                    @if (Auth::user()->role == 'user')
                        <ul class="navbar-nav ml-auto">
                            <!-- Menu-menu untuk role user -->
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
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('user/mitra-list') ? 'active' : '' }}"
                                    href="/user/mitra-list">
                                    Transaksi
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link {{ Request::is('user/riwayat-transaksi') ? 'active' : '' }}"
                                    href="/user/riwayat-transaksi">
                                    Riwayat Transaksi
                                </a>
                            </li> --}}
                        </ul>
                    @elseif (Auth::user()->role == 'mitra' && Auth::user()->role == 'admin')
                        <ul class="navbar-nav ml-auto">
                            <!-- Menu-menu untuk role mitra -->
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
                    @else
                        <ul class="navbar-nav ml-auto">
                            <!-- Menu-menu untuk role mitra -->
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
                    @endif
                @else
                    <!-- Menu-menu ketika tidak ada auth yang login -->
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
                @endauth

            </ul>
            <div class="d-flex ms-auto justify-content-center">
                @auth
                    <div class="dropdown custom-dropdown">
                        <button class="btn btn-clear" type="button" data-bs-toggle="dropdown" id="userDropdown">
                            @if (Auth::user()->profile_picture)
                                <div class="user-avatar">
                                    <img src="{{ asset('storage/profile_pictures/' . Auth::user()->profile_picture) }}"
                                        class="user-avatar" alt="User Image"
                                        style="border-radius: 50%; width: 40px; height: 40px; margin-right: 8px">
                                    <div class="user-name">{{ Auth::user()->name }}</div>
                                </div>
                            @else
                                <div class="user-avatar">
                                    <div class="avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                                    <div class="user-name">{{ Auth::user()->name }}</div>
                                </div>
                            @endif
                        </button>
                        <div class="custom-dropdown-content" id="dropdownContent"></div>
                        <ul class="dropdown-menu" id="dropdownContent">
                            @if (Auth()->user()->role == 'admin')
                                <li>
                                    <a class="dropdown-item" href="/admin/dashboard">
                                        <i class="nav-icon fas fa-tachometer-alt"></i>
                                        Dashboard
                                    </a>
                                </li>
                            @endif
                            <li>
                                <a class="dropdown-item" href="/update_profiles">
                                    <i class="nav-icon fas fa-user-edit"></i>
                                    Update Profile
                                </a>
                            </li>
                            @if (Auth()->user()->role == 'user')
                                <a class="dropdown-item" href="/user/riwayat-transaksi">
                                    <i class="nav-icon fas fa-history"></i>
                                    Riwayat Transaksi
                                </a>
                            @endif
                            <li>
                                <a class="dropdown-item" href="javascript:void(0)" id="logoutButton">
                                    <i class="fa fa-sign-out-alt"></i>
                                    Logout
                                </a>
                            </li>
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
