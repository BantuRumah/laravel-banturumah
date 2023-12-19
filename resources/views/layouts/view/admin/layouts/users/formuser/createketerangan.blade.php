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

                <form method="POST" action="{{ route('admin.user.create-keterangan-mitra.store') }}"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="layanan">Layanan:</label>
                        <select id="layanan" name="layanan" class="form-control">
                            <option value="Asisten Rumah Tangga">Asisten Rumah Tangga</option>
                            <option value="Baby Sitter">Baby Sitter</option>
                            <option value="Driver">Driver</option>
                            <option value="ART + Baby Sitter">ART + Baby Sitter</option>
                        </select>
                        {{-- <input type="text" id="layanan" name="layanan" class="form-control" required> --}}
                    </div>

                    <div class="form-group">
                        <label for="umur">Umur:</label>
                        <input type="number" id="umur" name="umur" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="radius">Daerah Radius:</label>
                        <input type="text" id="radius" name="radius" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="mobilitas">Mobilitas:</label>
                        <select id="mobilitas" name="mobilitas" class="form-control">
                            <option value="Pulang Pergi">Pulang Pergi</option>
                            <option value="Menginap">Menginap</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="pekerjaan">Jenis Pekerjaan:</label>
                        <textarea id="pekerjaan" name="pekerjaan" class="form-control" rows="4" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select id="status" name="status" class="form-control" readonly>
                            <option value="tersedia">Tersedia</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="harga">Harga: (perhari)</label>
                        <input type="number" id="harga" name="harga" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Create User</button>
                </form>
            </div>
        </div>
    </section>
@endsection
