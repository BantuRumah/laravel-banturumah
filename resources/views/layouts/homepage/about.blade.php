@extends('layouts.app')

@section('content-app')
    <div class="header-bg text-white">
        <div class="container mb-5">
            <h3 class="display-6 title">Kontak dan</h3>
            <h3 class="title">Tentang Kami</h3>
        </div>
        <div class="container">
            <p class="breadcrumb">
                <a href="/">Beranda</a>&nbsp><strong>&nbspAbout Us</strong>
            </p>
        </div>
    </div>

    <div id="about" class="container">
        <div class="row breadcrumb-content">
            <div class="col-md-6 mb-4">
                <img src="{{ asset('img/banturumah_nobg.png') }}" alt="Logo BantuRumah" class="img-fluid mx-auto d-block"
                    style="width: 500px">
            </div>
            <div class="col-md-6 mt-3">
                <h1>About Us</h1>
                <p class="mt-3">
                    BantuRumah Merupakan sebuah platform yang menghubungkan seseorang yang <strong>memerlukan layanan di
                        rumah tangga</strong>, termasuk <strong>pengasuh anak, pengemudi, dan asisten rumah
                        tangga</strong>. Platform ini bertujuan untuk memfasilitasi <strong>pertemuan antara para
                        pencari pekerja yang memiliki keahlian dalam bidang ini sesuai dengan kebutuhan,</strong> baik
                    itu untuk hari, minggu, atau bulan tertentu. Sehingga membantu masyarakat dengan lebih mudah
                    menemukan dan
                    memperoleh pelayanan yang mereka butuhkan.
                </p>
            </div>
        </div>
        <div class="row breadcrumb">
            <div class="col-md-6 text-end">
                <h1>Our Contact</h1>
                <p class="mt-4 contact-info">+6282313568127<i class="fas fa-phone"
                        style="margin-left: 15px; margin-right: 10px"></i></p>
                <p class="contact-info">banturumah4@gmail.com<i class="fas fa-envelope" style="margin-left: 15px"></i></p>
                <p class="contact-info">Jl. Soekarno Hatta No.9, Kec.Lowokwaru, Kota
                    Malang, Jawa Timur 65141<i class="fas fa-map-marker-alt"
                        style="margin-left: 20px; margin-right: 10px"></i></p>
            </div>
            <div class="col-md-6 mb-5">
                <img src="{{ asset('/img/clean-img.png') }}" alt="Gambar Anak" class="img-fluid about-image">
            </div>
        </div>
    </div>
@endsection
