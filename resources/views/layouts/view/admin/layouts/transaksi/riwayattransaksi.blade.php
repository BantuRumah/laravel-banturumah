@extends('layouts.app')


@section('content-app')
    <style>
        .star {
            font-size: 24px;
            color: #ccc;
            cursor: pointer;
        }

        .star.active {
            color: #ffcc00;
            /* Warna saat bintang aktif/dipilih */
        }
    </style>
    <section class="content-wrapper">
        <div class="container mt-5">
            <h1>Riwayat Transaksi</h1>

            <!-- Your existing code here -->

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Mitra</th>
                            <th>Jenis Sewa</th>
                            <th>Harga</th>
                            <th>Tanggal Sewa</th>
                            <th>Tanggal berakhir</th>
                            <th>Tanggal transaksi</th>
                            <th>Waktu transaksi</th>
                            <th>Status</th>
                            <th>Rating</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $count = 1;
                        @endphp
                        @foreach ($transaksis as $tr)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $tr->mitra->name }}</td>
                                <td>{{ $tr->jenis_sewa }}</td>
                                <td>{{ $tr->jumlah_harga }}</td>
                                <td>{{ $tr->tanggal_sewa }}</td>
                                <td>{{ $tr->tanggal_berakhir }}</td>
                                <td>{{ $tr->tanggal_transaksi }}</td>
                                <td>{{ $tr->waktu_transaksi }}</td>
                                <td>
                                    @if ($tr->status == 'payyed')
                                        <button class="btn btn-secondary btn-sm" disabled>Payyed</button>
                                    @elseif ($tr->status == 'success')
                                        <button class="btn btn-success btn-sm" disabled>Success</button>
                                    @elseif ($tr->status == 'failed')
                                        <button class="btn btn-danger btn-sm" disabled
                                            style="background-color: red; color: white;">Failed</button>
                                        <a href="{{ route('user.mitra-list') }}" class="btn btn-warning btn-sm"
                                            title="re-order"><i class="fas fa-sync-alt fa-spin"></i></a>
                                    @elseif ($tr->status == 'finished')
                                        <button class="btn btn-info btn-sm" disabled>
                                            Finished
                                        </button>
                                        <a href="{{ route('user.mitra-list') }}" class="btn btn-warning btn-sm"
                                            title="re-order">
                                            <i class="fas fa-sync-alt fa-spin"></i>
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    @if ($tr->status == 'finished')
                                        @if ($tr->ratings->isEmpty())
                                            <button class="btn btn-primary btn-sm"
                                                onclick="openReviewModal('{{ $tr->id }}')">
                                                Review
                                            </button>
                                        @elseif ($tr->ratings->isNotEmpty())
                                            <button class="btn btn-secondary btn-sm"
                                                onclick="viewReview('{{ $tr->ratings->first()->rating }}', '{{ $tr->ratings->first()->review }}')">Lihat
                                                Review</button>
                                        @endif
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Modal untuk review diluar loop foreach -->
    <div class="modal fade" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="reviewModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reviewModalLabel">Beri Rating dan Review</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form untuk rating dan review -->
                    <form id="reviewForm" method="POST">
                        @csrf <!-- Tambahkan ini jika Anda menggunakan Laravel -->
                        <div class="form-group">
                            <label for="rating">Rating:</label>
                            <div class="rating" id="rating">
                                <span class="star" data-value="1">&#9733;</span>
                                <span class="star" data-value="2">&#9733;</span>
                                <span class="star" data-value="3">&#9733;</span>
                                <span class="star" data-value="4">&#9733;</span>
                                <span class="star" data-value="5">&#9733;</span>
                            </div>
                            <input type="hidden" name="rating" id="selected_rating" value="0" required>
                        </div>
                        <div class="form-group">
                            <label for="review">Review:</label>
                            <textarea id="review" name="review" class="form-control" rows="5" required></textarea>
                        </div>
                        <button type="submit" id="submitReview" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk menampilkan hasil review -->
    <div class="modal fade" id="viewReviewModal" tabindex="-1" role="dialog" aria-labelledby="viewReviewModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewReviewModalLabel">Hasil Rating dan Review</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form untuk menampilkan hasil review dalam bentuk bintang dan textarea -->
                    <div class="form-group">
                        <label for="viewRating">Rating:</label>
                        <div class="rating" id="viewRating">
                            <!-- Tempat bintang akan ditampilkan -->
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="viewReview">Review:</label>
                        <textarea id="viewReview" class="form-control" rows="5" disabled></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openReviewModal(id) {
            $('#reviewModal').modal('show'); // Tampilkan modal
            document.getElementById('reviewForm').action = '/user/review/' + id; // Atur action form
        }

        // Fungsi untuk menangani klik bintang
        document.querySelectorAll('.star').forEach(star => {
            star.addEventListener('click', function() {
                const value = this.getAttribute('data-value');
                document.getElementById('selected_rating').value = value;

                // Hapus class 'active' dari semua bintang
                document.querySelectorAll('.star').forEach(s => s.classList.remove('active'));

                // Tambahkan class 'active' untuk bintang yang dipilih
                for (let i = 1; i <= value; i++) {
                    document.querySelector('.star[data-value="' + i + '"]').classList.add('active');
                }
            });
        });

        function viewReview(rating, review) {
            $('#viewReviewModal').modal('show');

            // Menampilkan hasil review dalam bentuk bintang
            const viewRating = document.getElementById('viewRating');
            viewRating.innerHTML = '';
            for (let i = 1; i <= rating; i++) {
                const star = document.createElement('span');
                star.setAttribute('class', 'star active');
                star.innerHTML = '&#9733;';
                viewRating.appendChild(star);
            }

            // Menampilkan hasil review dalam textarea
            document.getElementById('viewReview').value = review;
        }

        // Fungsi untuk menampilkan bintang aktif
        document.querySelectorAll('.star').forEach(star => {
            star.addEventListener('click', function() {
                const value = this.getAttribute('data-value');
                document.getElementById('selected_rating').value = value;

                // Hapus class 'active' dari semua bintang
                document.querySelectorAll('.star').forEach(s => s.classList.remove('active'));

                // Tambahkan class 'active' untuk bintang yang dipilih
                for (let i = 1; i <= value; i++) {
                    document.querySelector('.star[data-value="' + i + '"]').classList.add('active');
                }
            });
        });
    </script>
@endsection
