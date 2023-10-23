<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Admin | {{ Auth()->user()->name }}</title>

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

    {{-- CUSTOM --}}

</head>

<body>
    <!-- navbar -->
    @include('layouts.view.admin.lainnya.navbar-admin')
</body>

</html>
