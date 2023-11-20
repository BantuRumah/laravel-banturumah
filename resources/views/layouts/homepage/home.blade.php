@extends('layouts.app')

@section('content-app')
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel"
        style="margin-left: 25px; margin-right: 25px; margin-top: 10px; margin-bottom: 70px">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="d-flex justify-content-center">
                    <!-- Gambar Slider -->
                    <div class="carousel-image">
                        <img src="{{ asset('/img/gambar-asisten.jpg') }}" class="img-fluid" alt="Gambar 1">
                    </div>
                </div>
                <div class="carousel-caption text-center">
                    <h2>Aplikasi Pencari Pekerja Rumah Tangga</h2>
                    <p>Dan Penitipan Anak Secara Profesional</p>
                </div>
            </div>
            <div class="carousel-item">
                <div class="d-flex justify-content-center">
                    <!-- Gambar Slider -->
                    <div class="carousel-image">
                        <img src="{{ asset('/img/gambar-anak.jpg') }}" class="img-fluid" alt="Gambar 2">
                    </div>
                </div>
                <div class="carousel-caption text-center">
                    <h2>Slider Slide Kedua</h2>
                    <p>Deskripsi slide kedua di sini.</p>
                </div>
            </div>
            <!-- Tambahkan slide lainnya sesuai kebutuhan -->
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        <!-- Indikator halaman -->
        <ol class="carousel-indicators" id="carouselIndicatorsImage"></ol>
    </div>

    <div class="container">
        <div class="row">
            <div class="text-center mb-5">
                <h1 class="mb-3">Layanan Kami</h1>
            </div>
            <div class="col-12 d-flex">
                <div class="cards-fixed">
                    <img class="img-fluid" alt="cards-fixed image" src="{{ asset('img/gambar-anak.jpg') }}">
                    <div class="cards-fixed-body">
                        <h4 class="cards-fixed-title">Slide 1</h4>
                        <p class="cards-fixed-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                </div>
                <div class="cards-fixed">
                    <img class="img-fluid" alt="cards-fixed image" src="{{ asset('img/gambar-anak.jpg') }}">
                    <div class="cards-fixed-body">
                        <h4 class="cards-fixed-title">Slide 1</h4>
                        <p class="cards-fixed-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                </div>
                <div class="cards-fixed">
                    <img class="img-fluid" alt="cards-fixed image" src="{{ asset('img/gambar-anak.jpg') }}">
                    <div class="cards-fixed-body">
                        <h4 class="cards-fixed-title">Slide 1</h4>
                        <p class="cards-fixed-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                </div>
                <div class="cards-fixed">
                    <img class="img-fluid" alt="cards-fixed image" src="{{ asset('img/gambar-anak.jpg') }}">
                    <div class="cards-fixed-body">
                        <h4 class="cards-fixed-title">Slide 1</h4>
                        <p class="cards-fixed-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: 100px">
        <div class="row">
            <div class="col-md-6">
                <h1>Daycare</h1>
                <p>Daycare adalah penitipan untuk balita hingga anak-anak yang aman dan menyenangkan. Di
                    sini, mereka akan ditemani oleh staf yang ahli dalam merawat anak-anak. Aktivitas pendidikan yang
                    menarik juga disediakan untuk membantu perkembangan mereka. Keamanan anak-anak adalah prioritas utama,
                    dengan fasilitas yang dirancang khusus untuk mereka. Dengan daycare ini, orangtua dapat bekerja dengan
                    tenang, sambil tahu bahwa anak-anak mereka dalam perawatan yang baik dan penuh kasih.
                </p>
                <a href="#" class="btn btn-primary mb-5">Selengkapnya</a>
            </div>
            <div class="col-md-6 mb-5">
                <img src="{{ asset('/img/gambar-anak.jpg') }}" alt="Gambar Anak" class="img-fluid">
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-6 mb-4">
                <img src="{{ asset('img/gambar-orang-tua.jpg') }}" alt="Gambar Orang Tua" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h1>Orang Tua</h1>
                <p class="mt-3">Kami juga menyediakan fasilitas yang nyaman untuk orang tua. Pelayanan orang tua dengan
                    asisten rumah
                    tangga adalah solusi praktis bagi keluarga yang memerlukan bantuan dalam menjalankan berbagai tugas
                    rumah tangga. Asisten rumah tangga kami adalah profesional yang terlatih untuk mengatasi pekerjaan rumah
                    sehari-hari, seperti membersihkan rumah, memasak makanan sehat, dan melakukan tugas-tugas lainnya sesuai
                    kebutuhan.
                </p>
                <a href="#" class="btn btn-primary">Selengkapnya</a>
            </div>
        </div>
    </div>

    <div style="width: 100%; height: 100%; background: #092647; margin-top: 125px; padding-top: 50px; padding-bottom: 50px">
        <div class="container">
            <div class="header text-center" style="color: #FFD700">
                <h3 class="display-6">Informasi</h3>
                <h1>Testimoni</h1>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12 d-flex mt-5">
                        <div class="cards-fixed">
                            <img class="img-fluid" alt="cards-fixed image" src="{{ asset('img/gambar-anak.jpg') }}">
                            <div class="cards-fixed-body bg-white">
                                <h4 class="cards-fixed-title">Slide 1</h4>
                                <p class="cards-fixed-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            </div>
                        </div>
                        <div class="cards-fixed">
                            <img class="img-fluid" alt="cards-fixed image" src="{{ asset('img/gambar-anak.jpg') }}">
                            <div class="cards-fixed-body bg-white">
                                <h4 class="cards-fixed-title">Slide 1</h4>
                                <p class="cards-fixed-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            </div>
                        </div>
                        <div class="cards-fixed">
                            <img class="img-fluid" alt="cards-fixed image" src="{{ asset('img/gambar-anak.jpg') }}">
                            <div class="cards-fixed-body bg-white">
                                <h4 class="cards-fixed-title">Slide 1</h4>
                                <p class="cards-fixed-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            </div>
                        </div>
                        <div class="cards-fixed">
                            <img class="img-fluid" alt="cards-fixed image" src="{{ asset('img/gambar-anak.jpg') }}">
                            <div class="cards-fixed-body bg-white">
                                <h4 class="cards-fixed-title">Slide 1</h4>
                                <p class="cards-fixed-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <!-- Tombol Hubungi Kami -->
        <div id="contact" class="row justify-content-center" style="margin-top: 125px;">
            <div class="col-md-12">
                <div class="card shadow-sm" style="background-color: rgb(234, 234, 234)">
                    <div class="card-body text-center mt-5 mb-5">
                        <h1 class="card-title mb-4" style="font-size: 300%">Anda Punya Kendala?</h1>
                        <p class="card-text mb-5 text-center">
                            Hubungi kami jika anda mempunyai kendala, <br>
                            silahkan klik salah satu tombol dibawah ini.
                        </p>
                        <button id="emailBtn" class="btn btn-primary btn-lg mb-4" data-toggle="modal"
                            data-target="#emailModal">
                            <i class="fas fa-envelope" style="margin-right: 10px"></i>
                            Hubungi melalui Email
                        </button><br>
                        <a href="https://api.whatsapp.com/send?phone=+6282313568127&text=Halo%20Bantu%20Rumah%2C%20Saya%20Punya%20Kendala%20tentang%0A%0ATULIS%20KENDALA%20DIBAWAH%20:%0A"
                            target="_blank">
                            <button class="btn btn-success btn-lg">
                                <i class="fab fa-whatsapp"></i>
                                Hubungi melalui WhatsApp
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.lainnya.popup.form-mail')

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("sendButton").addEventListener("click", function(e) {
                e.preventDefault(); // Prevent the form from submitting

                // Display a popup alert
                alert("Email sent successfully!");

                // Optionally, you can submit the form after displaying the alert
                document.querySelector('form').submit();
            });
        });
    </script>
@endsection
