@extends('layouts.view.admin.panel')

@section('content')
    <div class="content-wrapper">
        <div class="nk-content-inner">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Debug Settings</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('debug.update') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="app_debug" class="form-label">Set APP_DEBUG:</label>
                                <div class="form-check">
                                    <input type="radio" id="app_debug_true" name="app_debug" value="true"
                                        class="form-check-input" {{ $appDebug ? 'checked' : '' }}>
                                    <label for="app_debug_true" class="form-check-label">True</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" id="app_debug_false" name="app_debug" value="false"
                                        class="form-check-input" {{ !$appDebug ? 'checked' : '' }}>
                                    <label for="app_debug_false" class="form-check-label">False</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>

                {{-- <div class="card mt-4"></div>

                    <!-- Clear Cache and Config Card -->
                    <div class="card mt-4">
                        <div class="card-header">
                            <h4 class="card-title">Clear Cache and Config</h4>
                        </div>
                        <div class="card-body text-center">
                            @if (!$appDebug)
                                <div class="alert alert-warning" role="alert">
                                    This options are disabled when APP_DEBUG is set to false.
                                </div>
                            @endif
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <h5>Clear various caches and configurations:</h5>
                            <ul class="list-unstyled">
                                <li><a href="{{ route('cache.clear') }}" class="btn btn-danger btn-block mt-2"
                                        {{ $appDebug ? '' : 'disabled' }}>Clear Cache</a></li>
                                <li><a href="{{ route('config.clear') }}" class="btn btn-warning btn-block mt-2"
                                        {{ $appDebug ? '' : 'disabled' }}>Clear Config</a></li>
                                <li><a href="{{ route('view.clear') }}" class="btn btn-primary btn-block mt-2"
                                        {{ $appDebug ? '' : 'disabled' }}>Clear View</a></li>
                                <li><a href="{{ route('route.clear') }}" class="btn btn-success btn-block mt-2"
                                        {{ $appDebug ? '' : 'disabled' }}>Clear Route</a></li>
                                <li><a href="{{ route('optimize.clear') }}" class="btn btn-secondary btn-block mt-2"
                                        {{ $appDebug ? '' : 'disabled' }}>Clear Optimize</a></li>
                            </ul>
                            <h5>Lainnya</h5>
                            <ul class="list-unstyled">
                                <li><a href="/routes" class="btn btn-info btn-block mt-2" target="_blank">See Routes</a>
                                </li>
                            </ul>
                        </div>
                    </div> --}}
            </div>
        </div>
    </div>
@endsection
