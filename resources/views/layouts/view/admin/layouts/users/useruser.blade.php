@extends('layouts.view.admin.panel')

@section('content')
    <section class="content-wrapper">
        <div class="container">
            <h1>User Users</h1>

            <!-- Your code here for displaying User users -->

            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Profile Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $count = 1;
                    @endphp
                    @foreach ($userUsers as $user)
                        <tr>
                            <td>{{ $count++ }}</td>
                            <td>
                                @if ($user->profile_picture)
                                    <img src="{{ asset('storage/profile_pictures/' . $user->profile_picture) }}"
                                        alt="Profile Image" width="50" height="50">
                                @else
                                    No Image
                                @endif
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <a href="{{ route('admin.users.view', $user->id) }}" class="btn btn-info">
                                    <i class="fas fa-eye"></i> View
                                </a>
                                <a href="{{ route('admin.users.delete', $user->id) }}" class="btn btn-danger"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">
                                    <i class="fas fa-trash"></i> Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
