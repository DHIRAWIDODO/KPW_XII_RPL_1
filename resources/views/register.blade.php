@extends('layouts.guest')

@section('title', 'Register')

@section('content')
    <p class="login-box-msg">Register a new membership</p>

    <form action="{{ route('register') }}" method="POST">
        @csrf

        <div class="mb-3">
            <div class="input-group">
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                    class="form-control @error('name') is-invalid @enderror"
                    placeholder="Full Name" required autofocus>
                <span class="input-group-text">
                    <i class="bi bi-person-fill"></i>
                </span>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <div class="input-group">
                <input type="text" name="username" id="username" value="{{ old('username') }}"
                    class="form-control @error('username') is-invalid @enderror"
                    placeholder="Nickname" required>
                <span class="input-group-text">
                    <i class="bi bi-person-badge-fill"></i>
                </span>
                @error('username')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <div class="input-group">
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                    class="form-control @error('email') is-invalid @enderror"
                    placeholder="Email" required>
                <span class="input-group-text">
                    <i class="bi bi-envelope"></i>
                </span>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <div class="input-group">
                <input type="password" name="password" id="password"
                    class="form-control @error('password') is-invalid @enderror"
                    placeholder="Password" required>
                <span class="input-group-text">
                    <i class="bi bi-lock-fill"></i>
                </span>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <div class="input-group">
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="form-control" placeholder="Confirm Password" required>
                <span class="input-group-text">
                    <i class="bi bi-lock-fill"></i>
                </span>
            </div>
        </div>

        <div class="row">
            <div class="col-8">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="agreeTerms" name="terms" required>
                    <label for="agreeTerms" class="form-check-label">
                        I agree to the <a href="#">terms</a>
                    </label>
                </div>
            </div>
            <div class="col-4">
                <button type="submit" class="btn btn-primary w-100">Register</button>
            </div>
        </div>
    </form>

    <p class="mt-3 mb-0">
        <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
    </p>
@endsection