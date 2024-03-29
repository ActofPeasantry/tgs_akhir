
@extends('layouts.auth.auth')

@section('title')
    <title>SMKK | Login</title>
@endsection

@section('content')
<p class="login-box-msg">Silahkan masukkan alamat email anda untuk mendapatkan password yang baru</p>

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ __('A fresh verification link has been sent to your email address.') }}
    </div>
@endif

<form  method="POST" action="{{ route('password.email') }}">
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
    <div class="row">
        <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Request new password</button>
        </div>
    </div>
</form>

<p class="mt-3 mb-1">
    <a href="{{ route('register') }}" class="text-center">Register sebagai jamaah</a>
</p>
@endsection

