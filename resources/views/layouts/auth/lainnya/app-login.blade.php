@extends('layouts.auth.login')

@section('content-login')
    <div class="header-bg text-white">
        <div class="container mb-2 mb-md-5">
            <h3 class="title">Login</h3>
        </div>
        <div class="container">
            <p class="breadcrumb">
                <a href="/">Beranda</a>&nbsp;<strong>&nbsp;Login</strong>
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
                <h3 class="text-center ">LOGIN</h3>
                <form method="POST" action="{{-- {{ route('login') }} --}}">
                    @csrf

                    <div class="form-group" style="margin-top: 25px">
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email"
                            required>
                    </div>

                    <div class="form-group" style="margin-top: 25px">
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password"
                            required>
                    </div>

                    <div class="form-group form-check" style="margin-top: 25px">
                        <input type="checkbox" class="form-check-input" id="showPassword">
                        <label class="form-check-label" for="showPassword">Show Password</label>
                    </div>

                    <div class="form-group" style="margin-top: 25px">
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>

                    <div class="form-group text-center"> <!-- Tambahkan class text-center -->
                        <a href="#">
                            <p>Forgot Password?</p>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        // JavaScript to toggle password visibility
        document.getElementById('showPassword').addEventListener('change', function() {
            var passwordField = document.getElementById('password');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
            } else {
                passwordField.type = 'password';
            }
        });
    </script>
@endsection
