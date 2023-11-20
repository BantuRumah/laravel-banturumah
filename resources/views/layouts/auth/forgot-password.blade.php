@extends('layouts.auth.login')

@section('content-login')
    <div class="header-bg text-white">
        <div class="container mb-2 mb-md-5">
            <h3 class="title">Login</h3>
        </div>
        <div class="container">
            <p class="breadcrumb">
                <a href="/">Beranda</a>&nbsp;><strong>&nbsp;Login</strong>
            </p>
        </div>
    </div>
    <div class="container">
        <div class="card mx-auto" style="max-width: 450px; padding: 15px; margin-top: 125px">
            <div class="card-body">
                <div class="d-flex justify-content-center">
                    <img src="{{ asset('img/banturumah_nobg.png') }}" alt="image_login" style="width: 250px"
                        class="mx-auto">
                </div>
                <h3 class="text-center">FORGOT PASSWORD</h3>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="form-group" style="margin-top: 35px">
                        <label for="email" class="mb-2">Email :</label>
                        <input type="email" id="email" value="{{ old('email') }}" name="email" class="form-control"
                            placeholder="">
                    </div>

                    <div class="form-group" style="margin-top: 25px">
                        <button name="submit" type="submit" class="btn btn-primary btn-block"
                            onclick="showAlert()">Request Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function showAlert() {
            var email = document.getElementById('email').value; // Mengambil nilai email dari input
            if (email === "") {
                alert("Silahkan isi alamat email Anda.");
            }
        }
    </script>

@endsection
