@extends('layouts.view.admin.panel')

@section('content')
    <section class="content-wrapper">
        <div class="container">
            <div class="container-fluid">
                <h1>Edit User</h1>

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

                <form method="POST" action="{{ route('admin.users.update', $user->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" value="{{ $user->name }}"
                            class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" value="{{ $user->email }}"
                            class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="role">Role:</label>
                        <select id="role" name="role" class="form-control">
                            <option value="admin" @if ($user->role == 'admin') selected @endif>Admin</option>
                            <option value="mitra" @if ($user->role == 'mitra') selected @endif>Mitra</option>
                            <option value="user" @if ($user->role == 'user') selected @endif>User</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="telephone">Telephone:</label>
                        <input type="telephone" id="telephone" name="telephone" value="{{ $user->telephone }}"
                            class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <input type="alamat" id="alamat" name="alamat" value="{{ $user->alamat }}"
                            class="form-control">
                    </div>

                    @if ($user->role == 'mitra')
                        <div class="form-group">
                            <label for="mitra_id">Mitra ID:</label>
                            <select id="mitra_id" name="mitra_id" class="form-control" required>
                                @foreach ($mitra as $mitraItem)
                                    <option value="{{ $mitraItem->id }}" @if ($user->mitra_id == $mitraItem->id) selected @endif>
                                        {{ $mitraItem->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="profile_picture">Profile Picture</label>
                        <input type="file" name="profile_picture" id="profile_picture">
                    </div>

                    <div class="form-group">
                        <label for="remove_profile_picture">Remove Profile Picture</label>
                        <input type="checkbox" name="remove_profile_picture" id="remove_profile_picture" value="1">
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </section>
@endsection
