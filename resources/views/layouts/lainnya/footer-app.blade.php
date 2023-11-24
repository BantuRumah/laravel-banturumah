<footer style="margin-top: 150px">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-5" style="margin-right: 75px">
                <img src="{{ asset('img/banturumah_nobg.png') }}" alt="" style="width: 250px">
                <p>
                    BantuRumah Merupakan sebuah platform yang menghubungkan seseorang yang <strong>memerlukan layanan di
                        rumah tangga</strong>, termasuk <strong>pengasuh anak, pengemudi, dan asisten rumah
                        tangga</strong>. Platform ini bertujuan untuk memfasilitasi <strong>pertemuan antara para
                        pencari pekerja yang memiliki keahlian dalam bidang ini sesuai dengan kebutuhan,</strong> baik
                    itu untuk hari, minggu, atau bulan tertentu. Sehingga membantu masyarakat dengan lebih mudah
                    menemukan dan
                    memperoleh pelayanan yang mereka butuhkan.
                </p>
            </div>
            <div class="col-md-2 mt-2">
                <h4>Menu</h4>
                <ul class="list-unstyled">
                    @auth
                        @if (Auth::user()->role == 'mitra' || Auth::user()->role == 'admin')
                            <li><a href="/">Beranda</a></li>
                            <li><a href="/service">Layanan Kami</a></li>
                            <li><a href="/about-us">Tentang Kami</a></li>
                        @elseif(Auth::user()->role == 'user')
                            <li><a href="/">Beranda</a></li>
                            <li><a href="/service">Layanan Kami</a></li>
                            <li><a href="/about-us">Tentang Kami</a></li>
                            <li><a href="/user/mitra-list">Transaksi</a></li>
                        @endif
                    @endauth
                    @guest
                        <li><a href="/">Beranda</a></li>
                        <li><a href="/service">Layanan Kami</a></li>
                        <li><a href="/about-us">Tentang Kami</a></li>
                    @endguest
                </ul>
            </div>
            <div class="col-md-4 mt-2">
                <h4>Kontak Kami</h4>
                <p><i class="fas fa-phone" style="margin-right: 10px"></i>+6282313568127</p>
                <p><i class="fas fa-envelope" style="margin-right: 10px"></i>banturumah4@gmail.com</p>
                <p><i class="fas fa-map-marker-alt" style="margin-right: 15px"></i>Jl. Soekarno Hatta No.9,
                    Jatimulyo, Kec.Lowokwaru, Kota Malang, Jawa Timur 65141</p>
                <div class="embed-responsive-item" style="width: 100%">
                    <iframe class="embed-responsive-item embed-responsive-16by9"
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d987.8824823292664!2d112.61413541706554!3d-7.944060645445279!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd629dfd58aaf95%3A0xe72a182dfd18e01c!2sCivil%20Engineering%20and%20Information%20Technology%20Building%2C%20POLINEMA!5e0!3m2!1sen!2sus!4v1700045676060!5m2!1sen!2sus"
                        width="350" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 mt-4">
                    <div class="icons">
                        <a href="https://www.facebook.com/profile.php?id=61552004108558" target="_blank">
                            <img src="{{ asset('img/facebook_icon.png') }}" alt=""
                                style="width: 45px; height: 45px; border-radius: 10px; margin-right: 2px">
                        </a>
                        <a href="https://www.instagram.com/bantu.rumah" target="_blank">
                            <img src="{{ asset('img/instagram_icon.png') }}" alt=""
                                style="width: 55px; height: 55px;">
                        </a>
                        <a href="">
                            <img src="{{ asset('img/linkedin_icon.png') }}" alt=""
                                style="width: 47px; height: 47px; margin-right: 6px">
                        </a>
                        <a href="https://wa.me/+6282313568127" target="_blank">
                            <img src="{{ asset('img/wa_icon.png') }}" alt="" style="width: 43px; height: 43px">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <hr> <!-- Garis pemisah antara bagian konten dan hak cipta -->
        <div class="row mt-3">
            <div class="col-md-12 text-center">
                <p>&copy; 2023 Bantu Rumah. Hak Cipta Dilindungi.</p>
            </div>
        </div>
    </div>
</footer>
