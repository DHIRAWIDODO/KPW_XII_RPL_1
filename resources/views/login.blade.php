@extends('layouts.guest')

@section('title', 'Login')

@section('content')
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="{{ route('login') }}" method="POST">
        @csrf

        <div class="mb-3">
            <div class="input-group">
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                    class="form-control @error('email') is-invalid @enderror"
                    placeholder="Email" required autofocus>
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

        <div class="row">
            <div class="col-7">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">Remember Me</label>
                </div>
            </div>
            <div class="col-5">
                <button type="submit" class="btn btn-primary w-100">Sign In</button>
            </div>
        </div>
    </form>

    <p class="mt-3 mb-1">
        <a href="{{ route('forgot-password') }}">I forgot my password</a>
    </p>
    <p class="mb-0">
        <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
    </p>
@endsection