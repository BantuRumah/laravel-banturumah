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
                <form method="POST" action="{{-- {{ route('register') }} --}}">
                    @csrf

                    <div class="form-group" style="margin-top: 25px">
                        <input type="text" id="name" name="name" class="form-control" placeholder="Nama"
                            required>
                    </div>

                    <div class="form-group" style="margin-top: 25px">
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email"
                            required>
                    </div>

                    <div class="form-group" style="margin-top: 25px">
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password"
                            required>
                    </div>

                    <div class="form-group" style="margin-top: 25px">
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"
                            placeholder="Konfirmasi Password" required>
                    </div>

                    <div class="form-group" style="margin-top: 25px">
                        <button type="submit" class="btn btn-success btn-block">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
