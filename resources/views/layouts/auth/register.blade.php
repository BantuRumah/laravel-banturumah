<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register | BantuRumah</title>
    {{-- WEBSITE ICON --}}
    <link rel="icon" href="{{ asset('img/Artboard 1banturumah_icon.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

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

</head>

<body>
    @include('layouts.lainnya.navbar-app')

    @yield('content-register')

    @include('layouts.lainnya.backtotop')

    @include('layouts.lainnya.footer-app')
</body>

</html>
