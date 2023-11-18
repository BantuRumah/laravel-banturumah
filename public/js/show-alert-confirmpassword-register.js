
document.addEventListener("DOMContentLoaded", function() {
    const passwordInput = document.getElementById("password");
    const confirmPasswordInput = document.getElementById("password_confirmation");
    const submitButton = document.querySelector("form button[type='submit']");

    confirmPasswordInput.addEventListener("keyup", function() {
        if (passwordInput.value !== confirmPasswordInput.value) {
            confirmPasswordInput.setCustomValidity("Password confirmation tidak cocok.");
        } else {
            confirmPasswordInput.setCustomValidity("");
        }
    });

    submitButton.addEventListener("click", function(event) {
        if (passwordInput.value !== confirmPasswordInput.value) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Konfirmasi password tidak cocok.',
            });
            event.preventDefault(); // Mencegah pengiriman formulir jika password tidak cocok.
        }
    });
});