@extends('layouts.view.admin.panel')

@section('content')
    <section class="content-wrapper">
        <div class="container">
            <h1>Admin Users</h1>

            <!-- Your existing code here -->

            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis Sewa</th>
                        <th>Tanggal Sewa</th>
                        <th>Tanggal berakhir</th>
                        <th>Tanggal transaksi</th>
                        <th>waktu transaksi</th>
                        <th>status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $count = 1;
                    @endphp
                    @foreach ($transaksis as $tr)
                        <tr>
                            <td>{{ $count++ }}</td>
                            <td>{{ $tr->jenis_sewa }}</td>
                            <td>{{ $tr->tanggal_sewa }}</td>
                            <td>{{ $tr->tanggal_berakhir }}</td>
                            <td>{{ $tr->tanggal_transaksi }}</td>
                            <td>{{ $tr->waktu_transaksi }}</td>
                            <td>{{ $tr->status }}</td>
                            <td>
                                {{-- <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <a href="{{ route('admin.users.view', $user->id) }}" class="btn btn-info">
                                    <i class="f     as fa-eye"></i> View
                                </a> --}}
                                <form action="{{ route('admin.transaksi.destroy', $tr->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this transaction?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                                {{-- ... existing table rows --}}
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#updateStatusModal{{ $tr->id }}">
                                    Update Status
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
    @foreach ($transaksis as $tr)
        <div class="modal fade" id="updateStatusModal{{ $tr->id }}" tabindex="-1"
            aria-labelledby="updateStatusModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateStatusModalLabel">Update Status for Transaction
                            #{{ $tr->id }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{-- Show bukti_pembayaran if available --}}
                        @if ($tr->bukti_pembayaran)
                            <img src="{{ asset('/storage/bukti_pembayaran/' . $tr->bukti_pembayaran) }}"
                                alt="Bukti Pembayaran" class="img-fluid">
                        @else
                            <p>No Bukti Pembayaran available.</p>
                        @endif
                        <p>{{ $tr->jenis_sewa }}</p>
                        {{-- Update Status Form --}}
                        <form action="{{ route('admin.transaksi.update_status', $tr->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" name="status" required>
                                    <option value="payyed" {{ $tr->status == 'payyed' ? 'selected' : '' }}>Payyed</option>
                                    <option value="success" {{ $tr->status == 'success' ? 'selected' : '' }}>Success
                                    </option>
                                    <option value="failed" {{ $tr->status == 'failed' ? 'selected' : '' }}>Failed</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Status</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <!-- Load jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Load Bootstrap CSS and JavaScript -->
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Bundle JS (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('.btn-warning').on('click', function() {
                var targetModal = $(this).data('bs-target');
                $(targetModal).modal('show');
            });
        });
    </script>
@endsection
