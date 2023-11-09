@extends('layouts.app')


@section('content-app')
    <section class="content-wrapper">
        <div class="container">
            <h1>Riwayat Transaksi</h1>

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
                            <td>
                                @if ($tr->status == 'payyed')
                                    <button class="btn btn-secondary btn-sm" disabled>Payyed</button>
                                @elseif ($tr->status == 'success')
                                    <button class="btn btn-success btn-sm" disabled>Success</button>
                                @elseif ($tr->status == 'failed')
                                    <button class="btn btn-danger btn-sm" disabled>Failed</button>
                                @endif
                            </td>
                            <td>
                                @if ($tr->status == 'success' && \Carbon\Carbon::now()->between($tr->tanggal_sewa, $tr->tanggal_berakhir))
                                    <button class="btn btn-success btn-sm" disabled>Success</button>
                                    <a href="{{ route('user.mitra-list') }}" class="btn btn-primary btn-sm">Re-Order</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
