<!-- Kode HTML modal email -->
<div class="modal fade" id="emailModal" tabindex="0" aria-labelledby="emailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-light">
                <h5 class="modal-title" id="emailModalLabel">Email Form</h5>
                <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
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
