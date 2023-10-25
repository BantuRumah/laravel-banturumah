@extends('layouts.view.admin.panel')

@section('content')
    <section class="content-wrapper">
        <div class="container">
            <div class="container-fluid">
                <h1>Data Users</h1>

                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th> <!-- Kolom untuk Action -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td>
                                    <a href=" {{ route('admin.users.edit', $user->id) }}">Edit</a> |
                                    <a href="{{ route('admin.users.view', $user->id) }}">View</a> |
                                    <a href="{{ route('admin.users.delete', $user->id) }}"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
