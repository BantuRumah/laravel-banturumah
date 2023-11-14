<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin/dashboard" class="brand-link" style="text-decoration: none;">
        <img src="{{ asset('img/Artboard 1banturumah_icon.png') }}" alt="BantuRumah Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">BantuRumah</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        @auth
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    @if (Auth::user()->profile_picture)
                        <img src="{{ asset('storage/profile_pictures/' . Auth::user()->profile_picture) }}"
                            class="img-circle elevation-2" alt="User Image">
                    @else
                        <img src="{{ asset('img/profile_icon.png') }}" alt="Profile Image Default"
                            class="img-circle elevation-2" alt="User Image">
                    @endif
                </div>
                <div class="info">
                    <span class="text-white">{{ Auth::user()->name }}</span>
                </div>
            </div>
        @endauth

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item">
                    <a href="/" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Beranda
                        </p>
                    </a>
                </li>

                <li class="nav-header">WELCOME</li>
                <li class="nav-item">
                    <a href="/admin/dashboard" class="nav-link {{ Request::is('admin/dashboard') ? ' active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-header">MAIN PAGE</li>

                <li class="nav-item {{ Request::is('admin/user/*') || Request::is('admin/user') ? 'menu-open' : '' }}">
                    <a href="/admin/user/"
                        class="nav-link {{ Request::is('admin/user/*') || Request::is('admin/user') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Users
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/user/alluser"
                                class="nav-link {{ Request::is('admin/user/alluser') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/user/admin"
                                class="nav-link {{ Request::is('admin/user/admin') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Admin</p>
                            </a>
                        </li>
                        <li
                            class="nav-item {{ Request::is('admin/user/mitra') || Request::is('admin/user/keterangan-mitra') ? 'menu-open' : '' }}">
                            <a href="#"
                                class="nav-link {{ Request::is('admin/user/mitra') || Request::is('admin/user/keterangan-mitra') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Mitra
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/admin/user/mitra"
                                        class="nav-link {{ Request::is('admin/user/mitra') ? 'active' : '' }}">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Mitra</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/user/keterangan-mitra"
                                        class="nav-link {{ Request::is('admin/user/keterangan-mitra') ? 'active' : '' }}">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Keterangan Mitra</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/user/user"
                                class="nav-link {{ Request::is('admin/user/user') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="/admin/transaksi" class="nav-link {{ Request::is('admin/transaksi') ? 'active' : '' }}"
                        class="nav-link">
                        <i class="nav-icon fas fa-exchange-alt"></i>
                        <p>
                            Transaksi
                        </p>
                    </a>
                </li>

                <li class="nav-header">PENGATURAN</li>

                <li class="nav-item">
                    <a href="{{ route('mail-config') }}"
                        class="nav-link {{ Request::is('admin/settings/mail-config') ? 'active' : '' }}"
                        class="nav-link">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>
                            Mailbox
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('indexdebug') }}"
                        class="nav-link {{ Request::is('admin/settings/debug') ? 'active' : '' }}" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Debug
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" data-toggle="modal" data-target="#logoutModal">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
@include('layouts.lainnya.popup.modal-logout')
