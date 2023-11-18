var passwordField = document.getElementById('password');
var confirmPasswordField = document.getElementById('password_confirmation');
var eyeIcon = document.getElementById('togglePassword');
var eyeConfirmIcon = document.getElementById('toggleConfirmPassword');

// Fungsi untuk menampilkan/menyembunyikan password
function togglePassword() {
    if (passwordField.type === 'password') {
        passwordField.type = 'text';
        eyeIcon.classList.remove('show-password');
        eyeIcon.classList.add('hide-password');
    } else {
        passwordField.type = 'password';
        eyeIcon.classList.remove('hide-password');
        eyeIcon.classList.add('show-password');
    }
}

// Fungsi untuk menampilkan/menyembunyikan konfirmasi password
function toggleConfirmPassword() {
    if (confirmPasswordField.type === 'password') {
        confirmPasswordField.type = 'text';
        eyeConfirmIcon.classList.remove('show-confirm-password');
        eyeConfirmIcon.classList.add('hide-confirm-password');
    } else {
        confirmPasswordField.type = 'password';
        eyeConfirmIcon.classList.remove('hide-confirm-password');
        eyeConfirmIcon.classList.add('show-confirm-password');
    }
}

// Event listener untuk mengganti kelas ikon mata saat diklik
eyeIcon.addEventListener('click', function() {
    togglePassword();
});

// Event listener untuk mengganti kelas ikon mata konfirmasi password saat diklik
eyeConfirmIcon.addEventListener('click', function() {
    toggleConfirmPassword();
});