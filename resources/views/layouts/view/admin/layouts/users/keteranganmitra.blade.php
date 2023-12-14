@extends('layouts.view.admin.panel')

@section('content')
    <section class="content-wrapper">
        <div class="container">
            <h1>Admin Users</h1>
            <a href="/admin/user/create-keterangan-mitra" class="btn btn-success mb-3 mt-2">+ Tambah</a>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Layanan</th>
                            <th>Umur</th>
                            <th>Radius</th>
                            <th>Mobilitas</th>
                            <th>Pekerjaan</th>
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
                                <td>{{ $user->layanan }}</td>
                                <td>{{ $user->umur }}</td>
                                <td>{{ $user->radius }}</td>
                                <td>{{ $user->mobilitas }}</td>
                                <td>{!! nl2br($user->pekerjaan) !!}</td>
                                <td>{{ $user->status }}</td>
                                <td>{{ $user->harga }}</td>
                                <td>
                                    <a href="{{ route('admin.user.keterangan-mitra.edit', $user->id) }}"
                                        class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                    {{-- <a href="{{ route('admin.users.view', $user->id) }}" class="btn btn-info"><i
                                            class="fas fa-eye"></i></a> --}}
                                    <form method="POST"
                                        action="{{ route('admin.user.keterangan-mitra.delete', $user->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
