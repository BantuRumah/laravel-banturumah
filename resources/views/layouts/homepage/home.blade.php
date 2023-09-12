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
        <ol class="carousel-indicators"></ol>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-6">
                <h3 class="mb-3">Carousel cards title </h3>
            </div>
            {{-- <div class="col-6 text-right">
                <a class="btn btn-primary mb-3 mr-1" href="#carouselExampleIndicators2" role="button" data-bs-slide="prev">
                    <i class="fa fa-arrow-left"></i>
                </a>
                <a class="btn btn-primary mb-3" href="#carouselExampleIndicators2" role="button" data-bs-slide="next">
                    <i class="fa fa-arrow-right"></i>
                </a>
            </div> --}}
            <div class="col-12">
                <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel" data-interval="5000">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-md-4 mb-2">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280"
                                            src="https://images.unsplash.com/photo-1532781914607-2031eca2f00d?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=7c625ea379640da3ef2e24f20df7ce8d">
                                        <div class="card-body">
                                            <h4 class="card-title">Special title treatment</h4>
                                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                Odio repellendus, cupiditate atque animi sunt molestiae amet id. Pariatur
                                                vero, repellat eos asperiores ipsum optio unde.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280"
                                            src="https://images.unsplash.com/photo-1517760444937-f6397edcbbcd?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=42b2d9ae6feb9c4ff98b9133addfb698">
                                        <div class="card-body">
                                            <h4 class="card-title">Special title treatment</h4>
                                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                Odio repellendus, cupiditate atque animi sunt molestiae amet id. Pariatur
                                                vero, repellat eos asperiores ipsum optio unde.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280"
                                            src="https://images.unsplash.com/photo-1532712938310-34cb3982ef74?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=3d2e8a2039c06dd26db977fe6ac6186a">
                                        <div class="card-body">
                                            <h4 class="card-title">Special title treatment</h4>
                                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                Odio repellendus, cupiditate atque animi sunt molestiae amet id. Pariatur
                                                vero, repellat eos asperiores ipsum optio unde.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="carousel-item">
                            <div class="row">
                                <div class="col-md-4 mb-2">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280"
                                            src="https://images.unsplash.com/photo-1532771098148-525cefe10c23?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=3f317c1f7a16116dec454fbc267dd8e4">
                                        <div class="card-body">
                                            <h4 class="card-title">Special title treatment</h4>
                                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                Odio repellendus, cupiditate atque animi sunt molestiae amet id. Pariatur
                                                vero, repellat eos asperiores ipsum optio unde.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280"
                                            src="https://images.unsplash.com/photo-1532715088550-62f09305f765?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=ebadb044b374504ef8e81bdec4d0e840">
                                        <div class="card-body">
                                            <h4 class="card-title">Special title treatment</h4>
                                            <p class="card-text">
                                                With supporting text below as a natural lead-in to additional content.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280"
                                            src="https://images.unsplash.com/photo-1506197603052-3cc9c3a201bd?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=0754ab085804ae8a3b562548e6b4aa2e">
                                        <div class="card-body">
                                            <h4 class="card-title">Special title treatment</h4>
                                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                Odio repellendus, cupiditate atque animi sunt molestiae amet id. Pariatur
                                                vero, repellat eos asperiores ipsum optio unde.</p>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">

                                <div class="col-md-4 mb-2">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280"
                                            src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=ee8417f0ea2a50d53a12665820b54e23">
                                        <div class="card-body">
                                            <h4 class="card-title">Special title treatment</h4>
                                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                Odio repellendus, cupiditate atque animi sunt molestiae amet id. Pariatur
                                                vero, repellat eos asperiores ipsum optio unde.</p>

                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280"
                                            src="https://images.unsplash.com/photo-1532777946373-b6783242f211?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=8ac55cf3a68785643998730839663129">
                                        <div class="card-body">
                                            <h4 class="card-title">Special title treatment</h4>
                                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                Odio repellendus, cupiditate atque animi sunt molestiae amet id. Pariatur
                                                vero, repellat eos asperiores ipsum optio unde.</p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280"
                                            src="https://images.unsplash.com/photo-1532763303805-529d595877c5?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=5ee4fd5d19b40f93eadb21871757eda6">
                                        <div class="card-body">
                                            <h4 class="card-title">Special title treatment</h4>
                                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                Odio repellendus, cupiditate atque animi sunt molestiae amet id. Pariatur
                                                vero, repellat eos asperiores ipsum optio unde.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="col-4">
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleIndicators2" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleIndicators2" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: 100px">
        <div class="row">
            <div class="col-md-6">
                <h1>Layanan Daycare</h1>
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
                <h1>Layanan Orang Tua</h1>
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

        <!-- Tombol Hubungi Kami -->
        <div id="contact" class="row justify-content-center" style="margin-top: 150px;">
            <div class="col-md-12">
                <div class="card shadow-sm" style="background-color: rgb(234, 234, 234)">
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

    <!-- Kode HTML modal email -->
    <div class="modal fade" id="emailModal" tabindex="0" aria-labelledby="emailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary text-light">
                    <h5 class="modal-title" id="emailModalLabel">Email Form</h5>
                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control mb-2" id="nama" placeholder="Nama Anda">
                        </div>
                        <div class="form-group">
                            <label for="email">Alamat Email</label>
                            <input type="email" class="form-control mb-2" id="email" placeholder="Email Anda">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control mb-2" id="deskripsi" rows="4" placeholder="Tulis pesan Anda di sini"></textarea>
                        </div>
                        <button class="btn btn-success button" onclick="sendEmail(event)">
                            Send message
                            <i class="uil uil-message button__icon"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
