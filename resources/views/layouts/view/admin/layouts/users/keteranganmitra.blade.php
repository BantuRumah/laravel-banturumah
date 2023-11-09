@extends('layouts.view.admin.panel')

@section('content')
    <section class="content-wrapper">
        <div class="container">
            <h1>Admin Users</h1>
            <a href="/admin/user/create-keterangan-mitra" class="btn btn-success mb-3 mt-2">+ Tambah</a>
            <!-- Your existing code here -->

            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Telefon</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Harga</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $count = 1;
                    @endphp
                    @foreach ($mitra as $user)
                        <tr>
                            <td>{{ $count++ }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->telephone }}</td>
                            <td>{{ $user->description }}</td>
                            <td>{{ $user->status }}</td>
                            <td>{{ $user->harga }}</td>
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
