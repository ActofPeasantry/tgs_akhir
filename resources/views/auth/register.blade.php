
@extends('layouts.auth.auth')

@section('title')
    <title>SMKK | Register</title>
@endsection

@section('content')
<p class="login-box-msg">Sign in to start your session</p>

<form action="" method="POST">
    @csrf

    {{-- Username --}}
    <div class="input-group mb-3">
        <input id="name" type="email" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="email" placeholder="Username" autofocus>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-user"></span>
            </div>
        </div>
    </div>

    {{-- Email --}}
    <div class="input-group mb-3">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-mail Address" autofocus>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-envelope"></span>
            </div>
        </div>
    </div>

    {{-- Password --}}
    <div class="input-group mb-3">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>
    </div>

    {{-- Confirmation Password --}}
    <div class="input-group mb-3">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">

        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
        </div>
        <!-- /.col -->
    </div>
</form>

<p class="mb-1">
    <a href="forgot-password.html">I forgot my password</a>
</p>
<p class="mb-0">
    <a href="{{ route('login') }}" class="text-center">Saya sudah memiliki akun</a>
</p>
@endsection

