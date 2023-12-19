@extends('layouts.view.admin.panel')

@section('content')
    <section class="content-wrapper">
        <div class="container">
            <div class="container-fluid">
                <h1>Edit Keterangan Mitra</h1>

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

                <form method="POST" action="{{ route('admin.user.keterangan-mitra.update', $keteranganMitra->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" class="form-control"
                            value="{{ $keteranganMitra->name }}" required>
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
                        <input type="number" id="umur" name="umur" class="form-control"
                            value="{{ $keteranganMitra->umur }}" required>
                    </div>

                    <div class="form-group">
                        <label for="radius">Daerah Radius:</label>
                        <input type="text" id="radius" name="radius" class="form-control"
                            value="{{ $keteranganMitra->radius }}" required>
                    </div>

                    <div class="form-group">
                        <label for="mobilitas">Mobilitas:</label>
                        <select id="mobilitas" name="mobilitas" class="form-control"
                            value="{{ $keteranganMitra->mobilitas }}" required>
                            <option value="Pulang Pergi">Pulang Pergi</option>
                            <option value="Menginap">Menginap</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="pekerjaan">Jenis Pekerjaan:</label>
                        <textarea id="pekerjaan" name="pekerjaan" class="form-control" rows="4" required>
                            {{ $keteranganMitra->pekerjaan }}
                        </textarea>
                    </div>

                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select id="status" name="status" class="form-control" readonly>
                            <option value="tersedia">Tersedia</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="harga">Harga:</label>
                        <input type="number" id="harga" name="harga" class="form-control"
                            value="{{ $keteranganMitra->harga }}" required>
                    </div>

                    <a class="btn btn-success" href="/admin/user/keterangan-mitra">Kembali</a>
                    <button type="submit" class="btn btn-warning">Update</button>
                </form>
            </div>
        </div>
    </section>
@endsection
