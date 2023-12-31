@extends('layouts.app')

@php
    use App\Http\Controllers\UserProfileController;
@endphp

@section('content-app')
    <style>
        .copy-icon {
            cursor: pointer;
            padding: 1px
        }
    </style>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="margin-left: 0px; margin-right: 0px;">
                    <div class="card-header">
                        <h2>Transaksi</h2>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-info" role="alert">
                            Transfer ke rekening BRI <strong>312701035606537</strong> atas nama <strong>Arief Nauvan
                                Ramadha</strong>
                        </div>
                        @if (empty(Auth::user()->telephone) || empty(Auth::user()->alamat))
                            <div class="alert alert-warning" role="alert">
                                Silakan lengkapi profil Anda terlebih dahulu. <a
                                    href="{{ route('profile1.update') }}">Update
                                    Profile</a>
                            </div>
                        @endif

                        <div class="filter-layanan mb-3">
                            <form action="{{ route('user.mitra-list') }}" method="get">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" style="padding: 10px">
                                                    <i class="fas fa-filter"></i>
                                                </span>
                                            </div>
                                            <select id="filterLayanan" name="layanan" class="form-control">
                                                <option value="">Pilih Layanan</option>
                                                @foreach ($layananList as $layanan)
                                                    <option value="{{ $layanan }}"
                                                        {{ $selectedLayanan == $layanan ? 'selected' : '' }}>
                                                        {{ $layanan }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="input-group">
                                            <input type="text" name="search" class="form-control" placeholder="Cari...">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col"></div>
                                    <div class="col"></div>
                                </div>
                            </form>
                            @if ($mitra->isEmpty() && empty($selectedLayanan) && empty($searchTerm))
                                <div class="alert alert-warning" role="alert">
                                    Pencarian Anda tidak ditemukan.
                                </div>
                            @endif
                        </div>

                        @php
                            $chunks = $mitra->chunk(3);
                            // dd($chunks);
                        @endphp

                        @foreach ($chunks as $chunk)
                            <div class="row">
                                @foreach ($chunk as $mitraItem)
                                    <div class="col-md-4 mb-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="image mb-4">
                                                    @if ($mitraItem->user_profile_picture)
                                                        <img src="{{ asset('storage/profile_pictures/' . $mitraItem->user_profile_picture) }}"
                                                            alt="{{ $mitraItem->user_name }}"
                                                            class="card-img-top img-fluid profile-image">
                                                    @else
                                                        <div style="text-align: center;">
                                                            <img src="{{ asset('img/profile_icon.png') }}"
                                                                alt="Gambar Profil Default" class="img-fluid profile-image">
                                                        </div>
                                                    @endif
                                                </div>
                                                <label>Nama Mitra:</label>
                                                <b>
                                                    <p class="card-text mb-2">{{ $mitraItem->user_name }}</p>
                                                </b>

                                                <label>Layanan:</label>
                                                <b>
                                                    <p class="card-text mb-2">{{ $mitraItem->layanan }}</p>
                                                </b>

                                                <label>Umur:</label>
                                                <b>
                                                    <p class="card-text mb-2">{{ $mitraItem->umur }} Tahun</p>
                                                </b>

                                                <label>Status:</label>
                                                <div class="card-text mb-2">
                                                    @if ($mitraItem->status == 'tersedia')
                                                        <span class="badge bg-success"
                                                            style="font-size: 14px; padding: 8px 12px; border-radius: 8px;">
                                                            {{ $mitraItem->status }}
                                                        </span>
                                                    @elseif ($mitraItem->status == 'menunggu')
                                                        <span class="badge bg-info"
                                                            style="font-size: 14px; padding: 8px 12px; border-radius: 8px;">
                                                            {{ $mitraItem->status }}
                                                        </span>
                                                    @else
                                                        <span class="badge bg-danger"
                                                            style="font-size: 14px; padding: 8px 12px; border-radius: 8px;">
                                                            {{ $mitraItem->status }}
                                                        </span>
                                                    @endif
                                                </div>
                                                <label>Harga:</label>
                                                <p class="card-text">Rp.
                                                    {{ number_format($mitraItem->harga, 0, ',', '.') }} / Hari</p>
                                                <a href="#" class="btn btn-secondary detail-button"
                                                    data-pekerjaan="{{ $mitraItem->pekerjaan }}"
                                                    data-radius="{{ $mitraItem->radius }}"
                                                    data-mobilitas="{{ $mitraItem->mobilitas }}" data-toggle="modal"
                                                    data-target="#detailModal">
                                                    Detail
                                                </a>
                                                @if ($mitraItem->status == 'tersedia')
                                                    <a href="#" class="btn btn-primary order-button"
                                                        data-mitra="{{ $mitraItem->user_name }}"
                                                        data-mitra_id="{{ $mitraItem->id }}"
                                                        data-price="{{ $mitraItem->harga }}"
                                                        data-profile-updated="{{ UserProfileController::hasUpdatedProfile(Auth::id()) }}">
                                                        Order Sekarang</a>
                                                @elseif ($mitraItem->status == 'menunggu')
                                                    <a href="#" class="btn btn-warning order-button disabled"
                                                        data-mitra="{{ $mitraItem->user_name }}"
                                                        data-mitra_id="{{ $mitraItem->id }}">Menunggu Konfirmasi</a>
                                                @else
                                                    <a href="#" class="btn btn-secondary order-button disabled"
                                                        data-mitra="{{ $mitraItem->user_name }}"
                                                        data-mitra_id="{{ $mitraItem->id }}">Booked</a>
                                                @endif
                                                <a href="#" class=""></a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header text-warning" style="background: #092647">
                    <h5 class="modal-title" id="detailModalLabel">Detail Mitra</h5>
                    <button type="button" id="closeModalDetail" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4">
                            <h6>Mengerjakan Tugas</h6>
                        </div>
                        <div class="col-8">
                            <p id="pekerjaanDetail"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <h6>Daerah Radius</h6>
                        </div>
                        <div class="col-8">
                            <p id="radiusDetail"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <h6>Mobilitas</h6>
                        </div>
                        <div class="col-8">
                            <p id="mobilitasDetail"></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.lainnya.popup.modal-transaksi')

    <script>
        $(document).ready(function() {
            $(".detail-button").click(function() {
                var pekerjaan = $(this).data('pekerjaan');
                var radius = $(this).data('radius');
                var mobilitas = $(this).data('mobilitas');

                // Set the text in the modal
                $("#pekerjaanDetail").text(pekerjaan);
                $("#radiusDetail").text(radius);
                $("#mobilitasDetail").text(mobilitas);

                // Show the modal
                $('#detailModal').modal('show');
            });
            // Tutup modal
            $("#closeModalDetail, .modal-footer .btn-secondary").click(function() {
                $('#detailModal').modal('hide');
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            // Menangani perubahan filter layanan
            $("#filterLayanan").change(function() {
                // Dapatkan nilai yang dipilih dari dropdown filter
                var selectedLayanan = $(this).val();

                // Redirect ke halaman dengan parameter layanan yang dipilih
                window.location.href = "{{ route('user.mitra-list') }}?layanan=" + selectedLayanan;
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            var userId = {{ Auth::id() }};
            var selectedPrice = 0;

            $(".order-button").click(function() {
                var profileUpdated = $(this).data('profile-updated');
                // Cek apakah profil telah diperbarui
                if (profileUpdated) {
                    // Lanjutkan dengan menampilkan modal "Order Sekarang"
                    var mitraName = $(this).data('mitra');
                    var mitraId = $(this).data('mitra_id');
                    var mitraPrice = $(this).data('price');
                    selectedPrice = mitraPrice;
                    $("#mitraName").text("Mitra: " + mitraName);
                    $("#mitra_id").val(mitraId);
                    $("#user_id").val(userId); // Set the user_id value
                    $("#orderModal").modal("show");

                    updateJumlahHarga(mitraPrice);
                } else {
                    // Tampilkan pesan bahwa profil harus diperbarui
                    alert('Silakan perbarui profil Anda sebelum melakukan transaksi.');
                }
            });

            // Handle form submission
            $("#placeOrderButton").click(function() {
                // Dapatkan data dari formulir
                var mitraId = $("#mitra_id").val();
                var userId = $("#user_id").val();
                var jenisSewa = $("#jenis_sewa").val();
                var tanggalSewa = $("#tanggal_sewa").val();
                var tanggalberakhir = $("#tanggal_berakhir").val();

                // Validasi apakah bukti pembayaran telah dipilih
                var buktiPembayaranInput = $("#bukti_pembayaran")[0];
                var buktiPembayaranFile = buktiPembayaranInput.files[0];
                if (!buktiPembayaranFile) {
                    alert("Silakan pilih berkas.");
                    return; // Hentikan pengiriman formulir jika tidak ada berkas yang dipilih
                }

                // Validasi ekstensi berkas
                var allowedExtensions = ["jpeg", "jpg", "png"];
                var fileExtension = buktiPembayaranFile.name.split('.').pop().toLowerCase();
                if (allowedExtensions.indexOf(fileExtension) === -1) {
                    alert("Silakan pilih berkas gambar dengan ekstensi: jpeg, jpg, png");
                    return; // Hentikan pengiriman formulir jika ekstensi berkas tidak valid
                }

                // Dapatkan formulir HTML
                var form = document.getElementById("order-form");

                // Tentukan URL untuk panggilan AJAX
                var ajaxUrl;
                if (window.location.protocol === 'https:') {
                    // Gunakan URL khusus jika diakses melalui HTTPS
                    ajaxUrl = "https://nauvan.my.id/transaksi";
                } else {
                    // Gunakan route Laravel jika tidak diakses melalui HTTPS
                    ajaxUrl = "{{ route('transaksi.store') }}";
                }

                // Buat FormData objek untuk pengiriman formulir
                var formData = new FormData(form);

                // Send data to the server using AJAX
                $.ajax({
                    url: ajaxUrl,
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        // Hide the order modal
                        $("#orderModal").modal("hide");

                        var statusParagraph = $('a[data-mitra_id="' + mitraId + '"]').siblings(
                            '.card-text.status');
                        statusParagraph.text('tidak tersedia');
                        statusParagraph.css('color', 'red');

                        // Show SweetAlert
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Anda telah berhasil melakukan transaksi. Orderan anda sedang diperiksa oleh admin.',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Reload the page to '/user/mitra-list'
                                window.location.href = '/user/mitra-list';
                            }
                        });
                    },
                    error: function(error) {
                        // Handle errors that may occur during submission
                        alert("Error: " + error.responseText);
                    }
                });
            });

            // Tutup modal
            $("#closeModal").click(function() {
                $("#orderModal").modal("hide");
            });

            // Perbarui tanggal_berakhir berdasarkan jenis_sewa dan tanggal_sewa
            function updateTanggalBerakhir() {
                var jenisSewa = $("#jenis_sewa").val();
                var tanggalSewa = new Date($("#tanggal_sewa").val());
                var tanggalBerakhir;

                switch (jenisSewa) {
                    case "harian":
                        tanggalBerakhir = new Date(tanggalSewa.setDate(tanggalSewa.getDate() + 1));
                        break;
                    case "mingguan":
                        tanggalBerakhir = new Date(tanggalSewa.setDate(tanggalSewa.getDate() + 7));
                        break;
                    case "bulanan":
                        tanggalBerakhir = new Date(tanggalSewa.setMonth(tanggalSewa.getMonth() + 1));
                        break;
                    default:
                        tanggalBerakhir = new Date(tanggalSewa);
                        break;
                }

                // Format tanggal_berakhir to YYYY-MM-DD
                var formattedDate = tanggalBerakhir.toISOString().split('T')[0];
                $("#tanggal_berakhir").val(formattedDate);
            }

            // Function to calculate and update Jumlah Harga
            function updateJumlahHarga() {
                var jenisSewa = $("#jenis_sewa").val();
                // var harga = {{ $mitraItem->harga }};
                var jumlahHarga = 0;

                if (jenisSewa === "harian") {
                    jumlahHarga = selectedPrice * 1;
                } else if (jenisSewa === "mingguan") {
                    jumlahHarga = selectedPrice * 7;
                } else if (jenisSewa === "bulanan") {
                    jumlahHarga = selectedPrice * 30;
                }

                $("#jumlah_harga").val("Rp. " + jumlahHarga.toLocaleString());
            }

            // Call updateJumlahHarga() when jenis_sewa changes
            $("#jenis_sewa").change(function() {
                updateJumlahHarga();
            });

            // Call updateJumlahHarga() initially
            updateJumlahHarga();

            // Dengarkan perubahan pada jenis_sewa dan tanggal_sewa
            $("#jenis_sewa, #tanggal_sewa").change(function() {
                updateTanggalBerakhir();
            });

            // Perbarui tanggal_berakhir saat halaman dimuat
            updateTanggalBerakhir();
        });
    </script>
    <script>
        function copyText() {
            /* Copy text into clipboard */
            var rekeningText = "312701035606537"; // The text you want to copy
            navigator.clipboard.writeText(rekeningText).then(function() {
                var textArea = document.createElement("textarea");
                textArea.value = rekeningText;
                document.body.appendChild(textArea);
                textArea.select();
                document.execCommand("copy");
                document.body.removeChild(textArea);

                var copyIcon = document.getElementById("copy-icon");
                copyIcon.classList.remove("fa-copy");
                copyIcon.classList.add("fa-check");

                // Show a standard JavaScript alert
                // alert("Text berhasil disalin ke clipboard!");

                setTimeout(function() {
                    copyIcon.classList.remove("fa-check");
                    copyIcon.classList.add("fa-copy");
                }, 2000);
            }).catch(function(error) {
                console.error("Unable to copy text: ", error);
            });
        }
    </script>
@endsection
