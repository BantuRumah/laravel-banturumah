@extends('layouts.view.admin.panel')

@section('content')
    <section class="content-wrapper">
        <div class="container my-4">
            <h1 class="mb-4">Ratings</h1>

            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Mitra</th>
                                    <th>Nama Penyewa</th>
                                    <th>Ratings</th>
                                    <th>Review</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $count = 1; @endphp
                                @foreach ($transaksis as $tr)
                                    <tr>
                                        <td>{{ $count++ }}</td>
                                        <td>{{ $tr->mitra->name }}</td>
                                        <td>{{ $tr->users->name }}</td>
                                        <td>
                                            @if ($tr->ratings->isNotEmpty())
                                                {{ $tr->ratings->first()->rating }} / 5
                                            @else
                                                No Rating
                                            @endif
                                        </td>
                                        <td>
                                            @if ($tr->ratings->isNotEmpty())
                                                {{ $tr->ratings->first()->review }}
                                            @else
                                                No Review
                                            @endif
                                        </td>
                                        <td>
                                            @if ($tr->ratings->isNotEmpty())
                                                <form
                                                    action="{{ route('admin.ratings.destroy', $tr->ratings->first()->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Are you sure you want to delete this rating?')">Delete</button>
                                                </form>
                                            @else
                                                No Action Available
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
