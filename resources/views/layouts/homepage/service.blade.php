@extends('layouts.app')

@section('content-app')
    <!-- Header -->
    <div class="header-bg text-white">
        <div class="container mb-5">
            <h3 class="title">Layanan Kami</h3>
        </div>
        <div class="container">
            <p class="breadcrumb">
                <a href="/">Beranda</a>&nbsp><strong>&nbsp;Layanan Kami</strong>
            </p>
        </div>
    </div>

    <!-- Layanan -->
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <img src="{{ asset('/img/icon_art.png') }}" alt="icon_art" class="mx-auto d-block mt-4"
                        style="width: 150px">
                    <div class="card-body">
                        <h4 class="card-title">Asisten Rumah Tangga</h4>
                        <p class="card-text">
                            Asisten rumah tangga adalah seseorang yang dipekerjakan untuk memberikan bantuan dalam
                            tugas-tugas rumah tangga sehari-hari, seperti membersihkan rumah, memasak, mencuci pakaian,
                            dan tugas-tugas lainnya yang berhubungan dengan pengelolaan rumah.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <img src="{{ asset('/img/icon_babysitter.png') }}" alt="icon_babysitter" class="mx-auto d-block mt-4"
                        style="width: 150px">
                    <div class="card-body">
                        <h4 class="card-title">Baby Sitter</h4>
                        <p class="card-text">Babysitter, atau pengasuh bayi, adalah seseorang yang dipekerjakan untuk
                            merawat dan mengawasi anak-anak dalam jangka waktu tertentu. Tugas utama seorang babysitter
                            adalah menjaga keselamatan dan kesejahteraan anak-anak, termasuk memberi makan, menghibur,
                            mengawasi permainan, dan memastikan anak-anak tidur dengan nyaman.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <img src="{{ asset('/img/icon_sopir.png') }}" alt="icon_sopir" class="mx-auto d-block mt-4"
                        style="width: 150px">
                    <div class="card-body">
                        <h4 class="card-title">Sopir</h4>
                        <p class="card-text">
                            Pengemudi atau sopir adalah individu yang mengemudikan kendaraan bermotor untuk mengangkut
                            penumpang atau kargo. Tugas utamanya adalah menjaga keselamatan dan mematuhi peraturan lalu
                            lintas, serta memastikan kendaraan dalam kondisi baik.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
