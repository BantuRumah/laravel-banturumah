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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    {{-- CSS - CUSTOM --}}
    <link rel="stylesheet" href="{{ asset('/css/app-homepage.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/app2-homepage.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/app3-abouthomepage.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/sliders.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/cardd-fixed.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/cardd-homepage.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/dropdown-navbar.css') }}">

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

    <!-- modal logout -->
    @include('layouts.lainnya.popup.modal-logout')

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

    <script src="{{ asset('js/slider-homepage.js') }}"></script>

    <script>
        // JavaScript to open the modal when the "Logout" link is clicked
        document.getElementById('logoutButton').addEventListener('click', function() {
            $('#logoutModal').modal('show');
        });

        // JavaScript to handle the "Logout" button within the modal
        document.getElementById('confirmLogout').addEventListener('click', function() {
            // Close the modal
            $('#logoutModal').modal('hide');

            // Display the SweetAlert for successful logout
            Swal.fire({
                title: 'Anda telah berhasil logout',
                icon: 'success',
                confirmButtonColor: '#3085d6',
            });

            // Delay the redirect after 10 seconds
            setTimeout(() => {
                window.location.href = '/';
            }, 10000); // 10 seconds delay
        });

        // JavaScript to display a SweetAlert after a successful login
        document.addEventListener('DOMContentLoaded', function() {
            const successfulLogin = '{{ session('loginSuccess') }}';
            if (successfulLogin === '1') {
                Swal.fire({
                    title: 'Anda telah berhasil login',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                });
            }
        });
    </script>

    <script>
        @if (session('success'))
            alert("{{ session('success') }}");
        @endif
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const userDropdown = document.getElementById("userDropdown");
            const dropdownContent = document.getElementById("dropdownContent");

            userDropdown.addEventListener("click", function(e) {
                dropdownContent.style.display = "block";
                e.stopPropagation();
            });

            document.addEventListener("click", function() {
                dropdownContent.style.display = "none";
            });
        });
    </script>

</body>

</html>
