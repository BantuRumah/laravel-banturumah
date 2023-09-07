
function sendEmail() {
    // Mengambil nilai dari formulir
    var nama = document.getElementById('nama').value;
    var email = document.getElementById('email').value;
    var deskripsi = document.getElementById('deskripsi').value;
    // Tutup modal setelah mengirim
    $('#emailModal').modal('hide');
    // Reset formulir
    document.getElementById('nama').value = '';
    document.getElementById('email').value = '';
    document.getElementById('deskripsi').value = '';
}
// Menambahkan event listener saat dokumen selesai dimuat
document.addEventListener('DOMContentLoaded', function() {
    // Menampilkan modal saat tombol logout ditekan
    var emailBtn = document.getElementById('emailBtn');
    var emailModal = new bootstrap.Modal(document.getElementById('emailModal'));
    emailBtn.addEventListener('click', function(event) {
        event.preventDefault(); // Mencegah tindakan default link
        emailModal.show();
    });
    // Menambahkan event listener pada tombol "Logout" dalam modal
    var confirmemailBtn = document.getElementById('confirmemailBtn');
    confirmemailBtn.addEventListener('click', function() {
        window.location.href = "{{ url('/logout') }}";
    });
});