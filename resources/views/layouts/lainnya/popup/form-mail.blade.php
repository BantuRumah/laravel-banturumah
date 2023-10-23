<!-- Kode HTML modal email -->
<div class="modal fade" id="emailModal" tabindex="0" aria-labelledby="emailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-light">
                <h5 class="modal-title" id="emailModalLabel">Email Form</h5>
                <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ url('sendemail/send') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Masukkan Nama</label>
                        <input type="text" name="name" class="form-control" value="" />
                    </div>
                    <div class="form-group">
                        <label>Masukkan Email</label>
                        <input type="text" name="email" class="form-control" value="" />
                    </div>
                    <div class="form-group">
                        <label>Tulis Pesan Kendala</label>
                        <textarea class="form-control mb-2" name="message" id="deskripsi" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="send" class="btn btn-success" value="Kirim" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
