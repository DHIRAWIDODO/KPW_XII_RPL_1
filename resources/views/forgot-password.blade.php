@extends('layouts.guest')

@section('title', 'Forgot Password')

@section('content')
    <p class="login-box-msg">You forgot your password? Here you can enter your email address and we'll send you a link to reset it.</p>

    <form action="{{ route('forgot-password') }}" method="POST">
        @csrf
        <div class="input-group mb-3">
            <input type="email" name="email" value="{{ old('email') }}" placeholder="Email"
                   class="form-control @error('email') is-invalid @enderror" required autofocus>
            <div class="input-group-text">
                <i class="bi bi-envelope"></i>
            </div>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary w-100">Request new password</button>
            </div>
        </div>
    </form>

    <p class="mt-3 mb-0">
        <a href="{{ route('login') }}">Login</a>
    </p>
@endsection
