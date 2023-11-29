<!-- Modal -->
<div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="orderModalLabel" aria-hidden="true">
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
                    <div class="alert alert-info" role="alert">
                        Transfer ke rekening BRI <strong>312701035606537 </strong><i id="copy-icon"
                            class="fas fa-copy copy-icon" onclick="copyText()" title="copy nomor rekening"></i> atas
                        nama <br>
                        <strong>Arief Nauvan Ramadha</strong>
                    </div>
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
                        <label for="jumlah_harga">Jumlah Harga:</label>
                        <input type="text" class="form-control" id="jumlah_harga"
                            value="Rp. {{ number_format($mitraItem->harga, 0, ',', '.') }}" readonly>
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
