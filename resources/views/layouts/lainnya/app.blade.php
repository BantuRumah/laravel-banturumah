<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Taskhub</title>

    {{-- CSS - BOOTSTRAP --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">

    {{-- JS - BOOTSTRAP --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>

    {{-- CSS - CUSTOM --}}
    <link rel="stylesheet" href="{{ asset('/css/app-homepage.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/app2-homepage.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/slider.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light">
        <div class="container mt-3 mb-3">
            <a class="navbar-brand" href="/">Navbar</a>
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
                        <a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="/about">
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

    @yield('content')

    <!-- Tombol Back to Top -->
    <div id="back-to-top" class="position-fixed bottom-0 end-0 mb-4 me-4" style="display: none">
        <a href="#" class="btn-back-to-top rounded-3">
            <i class="fas fa-arrow-up"></i>
        </a>
    </div>

    <footer style="margin-top: 250px">
        <div class="container">
            <div class="row mb-5 mt-4">
                <div class="col-md-6" style="margin-right: 125px">
                    <h4>Deskripsi tentang Perusahaan Kami</h4>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsam nisi quae ut debitis
                        provident
                        esse fugiat error sunt ad doloribus. Facere, itaque amet. Voluptatum enim aspernatur ad,
                        delectus quae ea, illum veritatis reprehenderit id soluta repudiandae sunt voluptate nihil
                        officiis dolores exercitationem labore dolorum. Consequuntur vitae, voluptatibus ratione
                        esse
                        ab, doloribus illo velit quas, quibusdam officia laudantium tempore odit nulla reiciendis
                        iusto
                        debitis fugit libero? Ipsum quo, tenetur vel quia enim ad! Quis sit cupiditate facilis quae
                        mollitia nulla magni doloremque similique cumque maxime suscipit, sunt, deserunt quasi
                        commodi
                        quo, debitis ex. Officiis expedita quasi quod nam architecto perferendis similique.</p>
                </div>
                <div class="col-md-2" style="margin-right: 25px">
                    <h4>Menu</h4>
                    <ul class="list-unstyled">
                        <li><a href="/home">Beranda</a></li>
                        <li><a href="/service">Layanan Kami</a></li>
                        <li><a href="/about">Tentang Kami</a></li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h4>Sosmed</h4>
                    <ul class="list-unstyled">
                        <li><a href="#">Instagram</a></li>
                        <li><a href="#">X</a></li>
                        <li><a href="#">LinkedIn</a></li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-6 mt-2">
                        <h4>Kontak</h4>
                        <p><i class="fas fa-phone" style="margin-right: 10px"></i>123-456-789</p>
                        <p><i class="fas fa-envelope" style="margin-right: 10px"></i>team.homecares4@gmail.com</p>
                        <p><i class="fas fa-map-marker-alt" style="margin-right: 15px"></i>Jl. Soekarno Hatta No.9,
                            Jatimulyo, Kec.Lowokwaru, Kota Malang, Jawa Timur 65141</p>
                    </div>
                </div>
            </div>
            <hr> <!-- Garis pemisah antara bagian konten dan hak cipta -->
            <div class="row mt-3">
                <div class="col-md-12 text-center">
                    <p>&copy; 2023 Taskhub. Hak Cipta Dilindungi.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Kode HTML modal email -->
    <div class="modal fade" id="emailModal" tabindex="0" aria-labelledby="emailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary text-light">
                    <h5 class="modal-title" id="emailModalLabel">Email Form</h5>
                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control mb-2" id="nama" placeholder="Nama Anda">
                        </div>
                        <div class="form-group">
                            <label for="email">Alamat Email</label>
                            <input type="email" class="form-control mb-2" id="email" placeholder="Email Anda">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control mb-2" id="deskripsi" rows="4" placeholder="Tulis pesan Anda di sini"></textarea>
                        </div>
                        <button class="btn btn-success button" onclick="sendEmail(event)">
                            Send message
                            <i class="uil uil-message button__icon"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/home-app.js') }}"></script>

    <script src="{{ asset('js/backtotop.js') }}"></script>

    <script>
        // Menghitung jumlah slide dalam carousel
        var totalSlides = $('.carousel-item').length;

        // Mengisi indikator halaman sesuai dengan jumlah slide
        for (var i = 0; i < totalSlides; i++) {
            if (i === 0) {
                // Tandai slide pertama sebagai active
                $('.carousel-indicators').append('<li data-bs-target="#carouselExample" data-bs-slide-to="' + i +
                    '" class="active"></li>');
            } else {
                $('.carousel-indicators').append('<li data-bs-target="#carouselExample" data-bs-slide-to="' + i +
                    '"></li>');
            }
        }
    </script>
</body>

</html>
