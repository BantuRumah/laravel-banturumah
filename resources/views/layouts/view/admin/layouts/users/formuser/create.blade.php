@extends('layouts.view.admin.panel')

@section('content')
    <section class="content-wrapper">
        <div class="container">
            <div class="container-fluid">
                <h1>Create User</h1>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.users.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="role">Role:</label>
                        <select id="role" name="role" class="form-control" required>
                            <option value="admin">Admin</option>
                            <option value="mitra">Mitra</option>
                            <option value="user">User</option>
                        </select>
                    </div>

                    <!-- Form tambahan hanya ditampilkan saat peran "mitra" dipilih -->
                    <div id="mitraForm" style="display: none;">
                        <div class="form-group">
                            <label for="mitra_id">Nama:</label>
                            <select id="mitra_id" name="mitra_id" class="form-control" required>
                                @foreach ($mitra as $mitraItem)
                                    <option value="{{ $mitraItem->id }}">{{ $mitraItem->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="profile_picture">Profile Picture</label>
                        <input type="file" name="profile_picture" id="profile_picture">
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Create User</button>
                </form>
                <script>
                    // Event handler untuk perubahan pilihan "role"
                    $('#role').change(function() {
                        if ($(this).val() === 'mitra') {
                            $('#mitraForm').show();
                        } else {
                            $('#mitraForm').hide();
                        }
                    });
                </script>
            </div>
        </div>
    </section>
@endsection
