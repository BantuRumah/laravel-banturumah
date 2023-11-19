@extends('layouts.app')

@section('content-app')
    <section class="content-wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card mt-5">
                        <div class="card-header">
                            <h1 class="card-title">Update Profile</h1>
                        </div>

                        <div class="card-body">
                            <!-- Menampilkan error validasi -->
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- Form update profile -->
                            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama:</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ old('name', Auth::user()->name) }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ old('email', Auth::user()->email) }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="role" class="form-label">Role:</label>
                                    <input type="text" class="form-control" id="role" name="role"
                                        value="{{ Auth::user()->role }}" readonly>
                                </div>

                                <div class="mb-3">
                                    <label for="telephone" class="form-label">Telephone:</label>
                                    <input type="text" class="form-control" id="telephone" name="telephone"
                                        value="{{ Auth::user()->telephone }}">
                                </div>

                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat:</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat"
                                        value="{{ Auth::user()->alamat }}">
                                </div>

                                <div class="mb-3">
                                    <label for="profile_picture" class="form-label">Foto Profil:</label>
                                    <input type="file" class="form-control" id="profile_picture" name="profile_picture">
                                    <small class="form-text text-muted">Unggah foto profil Anda (opsional).</small>
                                </div>

                                <!-- Tampilkan foto profil saat ini -->
                                @if (Auth::user()->profile_picture)
                                    <div class="current-profile-picture">
                                        <img src="{{ asset('storage/profile_pictures/' . Auth::user()->profile_picture) }}"
                                            alt="Foto Profil" width="100">
                                    </div>
                                    <div class="mt-3">
                                        <a href="{{ route('profile.delete_picture') }}" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus foto profil?')">Hapus
                                            Foto Profil</a>
                                    </div>
                                @endif

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password (biarkan kosong jika tidak ingin
                                        mengubah):</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>

                                <button type="submit" class="btn btn-primary">Update Profile</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        // Check if the 'profile_updated' session flash message exists
        @if (session('profile_updated'))
            // Display SweetAlert message with a success icon
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('profile_updated') }}',
                showConfirmButton: false, // Remove the 'OK' button
                timer: 2000 // Auto-close the alert after 2 seconds
            });
        @endif
    </script>
@endsection
