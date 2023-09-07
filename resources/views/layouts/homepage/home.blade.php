@extends('layouts.lainnya.app')

@section('content')
    <div class="container" style="margin-top: 100px">
        <div class="row">
            <div class="col-md-6">
                <h1>Layanan Daycare</h1>
                <p>Kami adalah tempat yang aman dan nyaman untuk merawat anak-anak Anda.
                    <br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis a vitae ipsa amet impedit,
                    velit debitis suscipit consectetur iste! Voluptas, architecto maxime quibusdam aspernatur minima
                    facilis libero optio ab? Quas harum fuga facere eum molestias quam perferendis voluptates obcaecati
                    perspiciatis consequatur odio cum provident, at labore aspernatur rerum? Asperiores, odit?
                </p>
                <a href="/layanan-anak" class="btn btn-primary mb-3">Layanan Anak</a>
            </div>
            <div class="col-md-6 mb-5">
                <img src="{{ asset('/img/gambar-anak.jpg') }}" alt="Gambar Anak" class="img-fluid">
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-6">
                <img src="{{ asset('img/gambar-orang-tua.jpg') }}" alt="Gambar Orang Tua" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h1>Layanan Orang Tua</h1>
                <p>Kami juga menyediakan fasilitas yang nyaman untuk orang tua.
                    <br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis a vitae ipsa amet impedit,
                    velit debitis suscipit consectetur iste! Voluptas, architecto maxime quibusdam aspernatur minima
                    facilis libero optio ab? Quas harum fuga facere eum molestias quam perferendis voluptates obcaecati
                    perspiciatis consequatur odio cum provident, at labore aspernatur rerum? Asperiores, odit?
                </p>
                <a href="/layanan-orang-tua" class="btn btn-primary">Layanan Orang Tua</a>
            </div>
        </div>

        <!-- Tombol Hubungi Kami -->
        <div id="contact" class="row justify-content-center" style="margin-top: 150px;">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-body text-center mt-5 mb-5">
                        <h1 class="card-title mb-4">Anda Punya Kendala?</h1>
                        <p class="card-text mb-5">
                            Hubungi kami jika anda mempunyai kendala, <br>
                            silahkan klik salah satu tombol dibawah ini.
                        </p>
                        <button id="emailBtn" class="btn btn-primary btn-lg mb-4" data-toggle="modal"
                            data-target="#emailModal">
                            <i class="fas fa-envelope" style="margin-right: 10px"></i>
                            Hubungi melalui Email
                        </button><br>
                        <a href="https://api.whatsapp.com/send?phone=+6285159094233&text=Hi%20Taskhub%20Center%2C%20Saya%20ingin%20Memesan%20Perawat%0A%0ADATA%20PEMESANAN%0A%E2%80%A2%20Nama%20Lengkap%20%3A%20%0A%E2%80%A2%20Email%20%3A%20%0A%E2%80%A2%20No%20HP%20%3A%20%0A%E2%80%A2%20Kota%20%3A%20%0A%0ADATA%20PASIEN%0A%E2%80%A2%20Usia%20%3A%20%0A%E2%80%A2%20Berat%20Badan%2FTinggi%20Badan%20%3A%20%0A%E2%80%A2%20Jenis%20Kelamin%20%3A%20%0A%E2%80%A2%20Kota%20Tinggal%20Pasien%20%3A%20%0A%0AKONDISI%20PASIEN%0A%E2%80%A2%20Alat%20yang%20Terpasang%20%3A%20%0A%E2%80%A2%20Luka%20pada%20Pasien%20%3A%20%0A%E2%80%A2%20Ceritakan%20Kondisi%20Pasien%20%3A%20"
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
@endsection
