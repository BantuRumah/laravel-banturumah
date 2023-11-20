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
                <h3 class="text-center">RESET PASSWORD</h3>
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

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" id="token" value="{{ request()->token }}">
                    <input type="hidden" name="email" id="email" value="{{ request()->email }}">

                    <div class="form-group" style="margin-top: 35px">
                        <label for="password" class="mb-2">Password :</label>
                        <input type="password" name="password" id="password" placeholder="Masukkan password baru..."
                            class="form-control" required>
                    </div>

                    <div class="form-group" style="margin-top: 15px">
                        <label for="password_confirmation" class="mb-2">Konfirmasi Password :</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                            placeholder="Masukkan ulang password baru..."required>
                    </div>

                    <div class="form-group" style="margin-top: 25px">
                        <button name="submit" type="submit" class="btn btn-primary btn-block">Update Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
