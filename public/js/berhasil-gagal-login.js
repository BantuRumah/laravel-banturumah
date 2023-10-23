document.getElementById('loginForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    $.ajax({
        url: '/login',
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            email: email,
            password: password
        },
        success: function(response) {
            if (response.success) {
                Swal.fire({
                    title: 'Sukses',
                    text: response.success,
                    icon: 'success'
                });
            } else if (response.error) {
                Swal.fire({
                    title: 'Gagal',
                    text: response.error,
                    icon: 'error'
                });
            }
        }
    });
});