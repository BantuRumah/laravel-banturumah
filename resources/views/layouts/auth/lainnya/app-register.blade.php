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
                <form method="POST" action="{{ route('register') }}">
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
                        <div class="input-group">
                            <input type="password" id="password" name="password" class="form-control"
                                placeholder="Password" required>
                            <div class="input-group-append" style="margin-left: 10px">
                                <span class="input-group-text" id="togglePassword" style="width: 42px; height: 45px">
                                    <i class="eye-icon show-password fas fa-eye"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group" style="margin-top: 25px">
                        <div class="input-group">
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="form-control" placeholder="Konfirmasi Password" required>
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
    <script>
        var passwordField = document.getElementById('password');
        var confirmPasswordField = document.getElementById('password_confirmation');
        var eyeIcon = document.getElementById('togglePassword');
        var eyeConfirmIcon = document.getElementById('toggleConfirmPassword');

        // Fungsi untuk menampilkan/menyembunyikan password
        function togglePassword() {
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeIcon.classList.remove('show-password');
                eyeIcon.classList.add('hide-password');
            } else {
                passwordField.type = 'password';
                eyeIcon.classList.remove('hide-password');
                eyeIcon.classList.add('show-password');
            }
        }

        // Fungsi untuk menampilkan/menyembunyikan konfirmasi password
        function toggleConfirmPassword() {
            if (confirmPasswordField.type === 'password') {
                confirmPasswordField.type = 'text';
                eyeConfirmIcon.classList.remove('show-confirm-password');
                eyeConfirmIcon.classList.add('hide-confirm-password');
            } else {
                confirmPasswordField.type = 'password';
                eyeConfirmIcon.classList.remove('hide-confirm-password');
                eyeConfirmIcon.classList.add('show-confirm-password');
            }
        }

        // Event listener untuk mengganti kelas ikon mata saat diklik
        eyeIcon.addEventListener('click', function() {
            togglePassword();
        });

        // Event listener untuk mengganti kelas ikon mata konfirmasi password saat diklik
        eyeConfirmIcon.addEventListener('click', function() {
            toggleConfirmPassword();
        });
    </script>
    @if (isset($success) && $success)
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Registrasi Berhasil',
                text: 'Anda telah berhasil melakukan registrasi.'
            });
        </script>
    @endif
@endsection
