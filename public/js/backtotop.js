$(document).ready(function() {
    // Saat halaman di-scroll
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('#back-to-top').fadeIn();
        } else {
            $('#back-to-top').fadeOut();
        }
    });

    // Saat tombol "Back to Top" diklik
    $('#back-to-top a').click(function() {
        $('html, body').animate({
            scrollTop: 0
        }, 800); // Animasi menggulir ke atas selama 800ms (sesuaikan dengan preferensi Anda)
        return false;
    });

    // Cek apakah tombol sebelumnya diaktifkan
    var isBackToTopVisible = sessionStorage.getItem('backToTopVisible') === 'true';

    if (isBackToTopVisible) {
        $('#back-to-top').show();
    }

    // Simpan status tombol saat reload atau pindah halaman
    $(window).on('beforeunload', function() {
        sessionStorage.setItem('backToTopVisible', $('#back-to-top').is(':visible'));
    });
});
