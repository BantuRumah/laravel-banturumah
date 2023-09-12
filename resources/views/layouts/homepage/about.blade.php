@extends('layouts.app')

@section('content-app')
    <div class="header-bg text-white">
        <div class="container mb-5">
            <h3 class="display-6 title">Kontak dan</h3>
            <h3 class="title">Tentang Kami</h3>
        </div>
        <div class="container">
            <p class="breadcrumb">
                <a href="/">Home</a>&nbsp><strong>&nbspAbout Us</strong>
            </p>
        </div>
    </div>

    <div id="about" class="container">
        <div class="row breadcrumb-content">
            <div class="col-md-6 mb-4">
                <img src="{{ asset('img/banturumah_icons.png') }}" alt="Logo BantuRumah" class="img-fluid mx-auto d-block">
            </div>
            <div class="col-md-6 mt-3">
                <h1>About Us</h1>
                <p class="mt-3">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsa necessitatibus adipisci exercitationem
                    ipsum aperiam voluptatem id iste magnam, omnis expedita officia nobis pariatur animi in dolor optio
                    perspiciatis ea accusantium voluptate? Obcaecati itaque repellendus eius tenetur nesciunt corporis,
                    explicabo totam porro quasi aut distinctio repudiandae facilis ullam iste reprehenderit, quod cumque
                    deserunt iure, possimus ad! Ut totam eum, molestiae provident mollitia quibusdam minima minus, saepe
                    quae aliquam error recusandae commodi molestias. Tenetur porro exercitationem nulla saepe corrupti, aut
                    maxime eum quo eius laborum numquam molestiae ea sapiente ut ex? Ratione a quasi sit! Aut numquam
                    exercitationem vero. Quidem, libero omnis.
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
