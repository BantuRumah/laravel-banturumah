@extends('layouts.auth.register')

@section('content-register')
    <div class="header-bg text-white">
        <div class="container mb-2 mb-md-5">
            <h3 class="title">Register</h3>
        </div>
        <div class="container">
            <p class="breadcrumb">
                <a href="/">Beranda</a>&nbsp;><strong>&nbsp;Register</strong>
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
                <h3 class="text-center">REGISTER</h3>
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
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group" style="margin-top: 35px">
                        <label for="name" class="mb-2">Nama Lengkap :</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="example names"
                            required>
                    </div>

                    <div class="form-group" style="margin-top: 15px">
                        <label for="email" class="mb-2">Email :</label>
                        <input type="email" id="email" name="email" class="form-control"
                            placeholder="example@gmail.com" required>
                    </div>

                    <div class="form-group" style="margin-top: 15px">
                        <label for="name" class="mb-2">Password :</label>
                        <div class="input-group">
                            <input type="password" id="password" name="password" class="form-control"
                                placeholder="********" required>
                            <div class="input-group-append" style="margin-left: 10px">
                                <span class="input-group-text" id="togglePassword" style="width: 42px; height: 45px">
                                    <i class="eye-icon show-password fas fa-eye"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group" style="margin-top: 15px">
                        <label for="name" class="mb-2">Konfirmasi Password :</label>
                        <div class="input-group">
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="form-control" placeholder="********" required>
                            <div class="input-group-append" style="margin-left: 10px">
                                <span class="input-group-text" id="toggleConfirmPassword" style="width: 42px; height: 45px">
                                    <i class="eye-icon show-confirm-password fas fa-eye"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group" style="margin-top: 25px">
                        <button type="submit" class="btn btn-success btn-block">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
