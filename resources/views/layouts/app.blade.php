<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>banturumah</title>
    {{-- WEBSITE ICON --}}
    <link rel="icon" href="{{ asset('img/banturumah_icons.png') }}">

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
    <link rel="stylesheet" href="{{ asset('/css/sliders.css') }}">

    {{-- TAMBAHAN --}}

    <style>
        .card {
            /* margin: 0 1em; */
            box-shadow: 2px 6px 8px 0 rgba(22, 22, 26, 0.18);
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
</body>

</html>
