@extends('layouts.app')

@section('content-app')
    <script>
        // Define a JavaScript variable to hold the user_id
        var userId = {{ Auth::id() }};
    </script>
    <style>
        .card {
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin: 10px;
            padding: 10px;
        }

        .card-header {
            padding: 15px;
            background-color: #092647;
            color: #FFD700;
        }

        .card-body {
            padding: 15px;
        }

        .card-title {
            font-size: 24px;
            font-weight: bold;
        }

        .card-text {
            font-size: 16px;
            margin-bottom: 10px;
            text-align: justify;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        b {
            font-weight: normal;
        }

        .badge {
            font-size: 14px;
            padding: 8px 12px;
            border-radius: 8px;
        }

        .btn-primary {
            background-color: #007BFF;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .btn-primary:disabled {
            background-color: #6c757d;
        }

        .btn-danger:disabled {
            background-color: #6c757d;
        }
    </style>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="margin-left: 50px; margin-right: 50px;">
                    <div class="card-header">
                        <h2>Transaksi</h2>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-info" role="alert">
                            Transfer ke rekening BRI <strong>312701035606537</strong> atas nama <strong>Arief Nauvan
                                Ramadha</strong>
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
                                                            class="card-img-top img-fluid">
                                                    @else
                                                        <div style="text-align: center;">
                                                            <img src="{{ asset('img/profile_icon.png') }}"
                                                                alt="Gambar Profil Default" class="img-fluid">
                                                        </div>
                                                    @endif
                                                </div>
                                                <label>User Name:</label>
                                                <b>
                                                    <p class="card-text mb-2">{{ $mitraItem->user_name }}</p>
                                                </b>

                                                <label>Layanan:</label>
                                                <b>
                                                    <p class="card-text mb-2">{{ $mitraItem->layanan }}</p>
                                                </b>

                                                <label>Umur:</label>
                                                <b>
                                                    <p class="card-text mb-2">{{ $mitraItem->umur }}</p>
                                                </b>

                                                <label>Status:</label>
                                                <div class="card-text mb-2">
                                                    <span
                                                        class="badge {{ $mitraItem->status == 'tersedia' ? 'bg-success' : 'bg-danger' }}"
                                                        style="font-size: 14px; padding: 8px 12px; border-radius: 8px;">
                                                        {{ $mitraItem->status }}
                                                    </span>
                                                </div>
                                                <label>Harga:</label>
                                                <p class="card-text">Rp. {{ $mitraItem->harga }} / Bulan</p>
                                                @if ($mitraItem->status == 'tersedia')
                                                    <a href="#" class="btn btn-primary order-button"
                                                        data-mitra="{{ $mitraItem->user_name }}"
                                                        data-mitra_id="{{ $mitraItem->id }}">Order
                                                        Sekarang</a>
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
    <!-- Modal -->
    <div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="orderModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="orderModalLabel">Pesan Sekarang</h5>
                    <button type="button" id="closeModal" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="order-form" action="{{ route('transaksi.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="mitra_id" id="mitra_id" value="{{ Auth::id() }}">
                        <input type="hidden" name="user_id" id="user_id" value="{{ Auth::id() }}">
                        <div class="form-group">
                            <label for="jenis_sewa">Jenis Sewa</label>
                            <select class="form-control" name="jenis_sewa" id="jenis_sewa" required>
                                <option value="harian">Harian</option>
                                <option value="mingguan">Mingguan</option>
                                <option value="bulanan">Bulanan</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="tanggal_sewa">Tanggal Sewa</label>
                            <input type="date" class="form-control" name="tanggal_sewa" id="tanggal_sewa"
                                value="{{ date('Y-m-d') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_berakhir">Tanggal Berakhir</label>
                            <input type="date" class="form-control" name="tanggal_berakhir" id="tanggal_berakhir"
                                value="{{ date('Y-m-d') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="bukti_pembayaran">Bukti Pembayaran</label>
                            <input type="file" class="form-control" name="bukti_pembayaran" id="bukti_pembayaran"
                                required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="placeOrderButton">Pesan Sekarang</button>
                </div>
            </div>

        </div>
    </div>
    </div>
    <!-- Load jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>

    <script>
        $(document).ready(function() {
            var userId = {{ Auth::id() }};

            $(".order-button").click(function() {
                var mitraName = $(this).data('mitra');
                var mitraId = $(this).data('mitra_id');
                $("#mitraName").text("Mitra: " + mitraName);
                $("#mitra_id").val(mitraId);
                $("#user_id").val(userId); // Set the user_id value
                $("#orderModal").modal("show");
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
                            text: 'Anda telah berhasil melakukan transaksi.',
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

            // Dengarkan perubahan pada jenis_sewa dan tanggal_sewa
            $("#jenis_sewa, #tanggal_sewa").change(function() {
                updateTanggalBerakhir();
            });

            // Perbarui tanggal_berakhir saat halaman dimuat
            updateTanggalBerakhir();
        });
    </script>
@endsection
