@extends('layouts.view.admin.panel')

@section('content')
    <div class="content-wrapper">
        <div class="nk-content-inner">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Mail Configuration</h4>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form method="post" action="{{ route('mail-config.update') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="MAIL_MAILER" class="form-label">Mail Mailer:</label>
                                        <input type="text" id="MAIL_MAILER" name="MAIL_MAILER" class="form-control"
                                            value="{{ $envVariables['MAIL_MAILER'] }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="MAIL_HOST" class="form-label">Mail Host:</label>
                                        <input type="text" id="MAIL_HOST" name="MAIL_HOST" class="form-control"
                                            value="{{ $envVariables['MAIL_HOST'] }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="MAIL_PORT" class="form-label">Mail Port:</label>
                                        <input type="text" id="MAIL_PORT" name="MAIL_PORT" class="form-control"
                                            value="{{ $envVariables['MAIL_PORT'] }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="MAIL_USERNAME" class="form-label">Mail Username:</label>
                                        <input type="text" id="MAIL_USERNAME" name="MAIL_USERNAME" class="form-control"
                                            value="{{ $envVariables['MAIL_USERNAME'] }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="MAIL_PASSWORD" class="form-label">Mail Password:</label>
                                        <input type="password" id="MAIL_PASSWORD" name="MAIL_PASSWORD" class="form-control"
                                            value="{{ $envVariables['MAIL_PASSWORD'] }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="MAIL_ENCRYPTION" class="form-label">Mail Encryption:</label>
                                        <select id="MAIL_ENCRYPTION" name="MAIL_ENCRYPTION" class="form-select">
                                            <option value="ssl"
                                                {{ $envVariables['MAIL_ENCRYPTION'] === 'ssl' ? 'selected' : '' }}>SSL
                                            </option>
                                            <option value="tls"
                                                {{ $envVariables['MAIL_ENCRYPTION'] === 'tls' ? 'selected' : '' }}>TLS
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="MAIL_FROM_ADDRESS" class="form-label">Mail From Address:</label>
                                        <input type="text" id="MAIL_FROM_ADDRESS" name="MAIL_FROM_ADDRESS"
                                            class="form-control"
                                            value="{{ trim($envVariables['MAIL_FROM_ADDRESS'], '"') }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="MAIL_FROM_NAME" class="form-label">Mail From Name:</label>
                                        <input type="text" id="MAIL_FROM_NAME" name="MAIL_FROM_NAME" class="form-control"
                                            value="{{ trim($envVariables['MAIL_FROM_NAME'], '"') }}">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
