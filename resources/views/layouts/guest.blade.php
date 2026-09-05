<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>@yield('title', 'Login') | AdminLTE</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('adminlte/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('adminlte/css/adminlte.css') }}" />

    @stack('styles')

    <style>
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #1e2125;
        }

        .login-box {
            width: 100%;
            max-width: 400px;
            padding: 1rem;
        }

        .login-logo {
            font-size: 2rem;
            font-weight: 400;
            letter-spacing: 0.5px;
        }

        .login-logo a {
            color: #fff;
        }

        .login-logo b {
            font-weight: 700;
        }

        .card {
            background-color: #343a40;
            border: none;
            border-radius: 1rem;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.4);
            overflow: hidden;
        }

        .login-card-body {
            padding: 2.25rem 2rem;
        }

        .login-box-msg {
            color: #ced4da;
            margin-bottom: 1.5rem;
        }

        .form-control {
            background-color: #fff;
            border: 1px solid #fff;
            border-right: none;
            color: #212529;
        }

        .form-control::placeholder {
            color: #6c757d;
        }

        .form-control:focus {
            background-color: #fff;
            box-shadow: none;
            border-color: #86b7fe;
            color: #212529;
        }

        .input-group-text {
            background-color: #fff;
            border: 1px solid #fff;
            border-left: none;
            color: #495057;
        }

        .input-group:focus-within .form-control,
        .input-group:focus-within .input-group-text {
            border-color: #86b7fe;
        }

        .form-check-label {
            color: #e9ecef;
        }

        .form-check-input {
            background-color: #fff;
            border-color: #fff;
        }

        .form-check-input:checked {
            background-color: #0d6efd;
            border-color: #0d6efd;
        }

        .btn-primary {
            background-color: #f8f9fa;
            color: #212529;
            border: none;
            padding: 0.6rem;
            font-weight: 700;
            border-radius: 0.5rem;
        }

        .btn-primary:hover {
            background-color: #e2e6ea;
            color: #212529;
        }

        a {
            color: #adb5bd;
            text-decoration: none;
        }

        a:hover {
            color: #fff;
            text-decoration: underline;
        }

        .invalid-feedback {
            color: #ff8787;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <div class="login-logo mb-4 text-center">
            <a href="{{ route('dashboard') }}" class="text-decoration-none">
                <b>Admin</b>LTE
            </a>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="{{ asset('adminlte/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    @stack('scripts')
</body>
</html>