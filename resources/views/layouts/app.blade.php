<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>banturumah - pencarian art untuk anak dan orang tua</title>

    {{-- WEBSITE ICON --}}
    <link rel="icon" href="{{ asset('img/Artboard 1banturumah_icon.png') }}">

    {{-- CSS - BOOTSTRAP --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- JS - BOOTSTRAP --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>

    {{-- CSS - CUSTOM --}}
    <link rel="stylesheet" href="{{ asset('/css/app-homepage.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/app2-homepage.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/app3-abouthomepage.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/sliders.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/cardd-fixed.css') }}">

    {{-- TAMBAHAN --}}
    <style>
        /* Gaya kustom untuk card */
        .cards {
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin: 10px;
            overflow: hidden;
            align-content: center;
            transition: transform 0.2s ease-in-out;
            width: 270px;
            /* Lebar card yang lebih besar */
        }

        .cards img {
            max-width: 100%;
            height: auto;
        }

        .cards:hover {
            transform: scale(1.08);
            /* Perbesar sedikit saat dihover */
        }

        .cards-body {
            padding: 1.5rem;
            /* Tingkatkan padding untuk konten yang lebih besar */
        }

        .cards-title {
            font-size: 1.5rem;
            /* Font title yang lebih besar */
            margin-bottom: 1rem;
        }

        .cards-text {
            font-size: 1.25rem;
            /* Font teks yang lebih besar */
        }

        /* Gaya kustom untuk carousel */
        .custom-carousel {
            display: flex;
            position: relative;
            margin: 0 auto;
            max-width: 1265px;
            /* Lebar carousel yang lebih besar */
        }

        .custom-carousel .carousel-container {
            display: flex;
            overflow: hidden;
            position: relative;
        }

        .custom-carousel .carousel-container .carousel-slide {
            flex: 0 0 100%;
            transition: transform 0.3s ease-in-out;
        }

        .custom-carousel .carousel-controls {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .custom-carousel .carousel-controls button {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            padding: 15px
        }
    </style>
</head>

<body>
    <!-- navbar -->
    @include('layouts.lainnya.navbar-app')

    <!-- content app -->
    @yield('content-app')

    <!-- Tombol Back to Top -->
    @include('layouts.lainnya.backtotop')

    <!-- footer -->
    @include('layouts.lainnya.footer-app')

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

    <script>
        const slides = document.querySelectorAll('.carousel-slide');
        let currentSlide = 0;

        const showSlide = (slideIndex) => {
            slides.forEach((slide) => {
                slide.style.transform = `translateX(-${slideIndex * 100}%)`;
            });
        };

        const prevSlide = () => {
            currentSlide = (currentSlide - 1 + slides.length) % slides.length;
            showSlide(currentSlide);
        };

        const nextSlide = () => {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
        };

        document.getElementById('prevSlide').addEventListener('click', prevSlide);
        document.getElementById('nextSlide').addEventListener('click', nextSlide);
    </script>
</body>

</html>
