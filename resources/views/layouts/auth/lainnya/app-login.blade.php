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
                <h3 class="text-center">LOGIN</h3>
                {{-- <center>
                    <p>email admin : banturumah4@gmail.com</p>
                    <p>email mitra : mitra@gmail.com</p>
                    <p>email admin : user@gmail.com</p>
                </center> --}}
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

                <form method="POST" action="">
                    @csrf

                    <div class="form-group" style="margin-top: 35px">
                        <label for="email" class="mb-2">Email :</label>
                        <input type="email" id="email" value="{{ old('email') }}" name="email" class="form-control"
                            placeholder="example@gmail.com">
                    </div>

                    <div class="form-group" style="margin-top: 15px">
                        <label for="password" class="mb-2">Password :</label>
                        <input type="password" id="password" value="{{ old('password') }}" name="password"
                            class="form-control" placeholder="********">
                    </div>

                    <div class="form-group form-check" style="margin-top: 15px">
                        <input type="checkbox" class="form-check-input" id="showPassword">
                        <label class="form-check-label" for="showPassword">Show Password</label>
                    </div>

                    <div class="form-group" style="margin-top: 25px">
                        {!! NoCaptcha::renderJs() !!}
                        {!! NoCaptcha::display() !!}
                    </div>

                    <div class="form-group" style="margin-top: 25px">
                        <button name="submit" type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>

                    <div class="form-group" style="margin-top: 15px">
                        <p>Pengguna Baru? <a href="/register">Buat Akun</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
