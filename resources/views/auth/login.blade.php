
@extends('layouts.auth.auth')

@section('title')
    <title>SMKK | Login</title>
@endsection

@section('content')
{{-- <p class="login-box-msg">Sign in to start your session</p> --}}
<p class="login-box-msg">Login</p>

<form  method="POST" action="{{ route('login') }}">
    @csrf

    <div class="input-group mb-3">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Alamat e-mail" autofocus>
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-envelope"></span>
            </div>
        </div>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="input-group mb-3">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>

        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

    </div>

    <div class="row">
        <div class="col-8">
            <div class="icheck-primary">
            <input type="checkbox" id="remember" name="remember">
            <label for="remember">
                Ingat Saya
            </label>
            </div>
        </div>
        <!-- /.col -->
        <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
        </div>
        <!-- /.col -->
    </div>
</form>

<p class="mb-1">
    <a href="{{ route('password.request') }}">Saya Lupa Password</a>
</p>
<p class="mb-0">
    <a href="{{ route('register') }}?role=jamaah" class="text-center">Register sebagai jamaah</a>
</p>
@endsection

