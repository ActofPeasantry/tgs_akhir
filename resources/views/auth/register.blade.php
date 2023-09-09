
@extends('layouts.auth.auth')

@section('title')
    <title>SMKK | Register</title>
@endsection

@section('content')
<p class="login-box-msg">Register Sebagai Jamaah</p>

<form action="{{route('register')}}?role=jamaah" method="POST">
    @csrf

    {{-- Username --}}
    <div class="input-group mb-3">
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="email" placeholder="Username" autofocus>
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-user"></span>
            </div>
        </div>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    {{-- Email --}}
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

    {{-- Name --}}
    <div class="input-group mb-3">
        <input id="profile_name" type="profile_name" class="form-control @error('profile_name') is-invalid @enderror" name="profile_name" value="{{ old('profile_name') }}" required autocomplete="profile_name" placeholder="Nama Jamaah" autofocus>
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-praying-hands"></span>
            </div>
        </div>
        @error('profile_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    {{-- Address --}}
    <div class="input-group mb-3">
        <input id="profile_address" type="profile_address" class="form-control @error('profile_address') is-invalid @enderror" name="profile_address" value="{{ old('profile_address') }}" required autocomplete="profile_address" placeholder="Alamat" autofocus>
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-house"></span>
            </div>
        </div>
        @error('profile_address')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    {{-- Telp --}}
    <div class="input-group mb-3">
        <input id="profile_telp" name="profile_telp" type="text" class="form-control" value="{{ old('profile_telp') }}" data-inputmask="'mask': ['9999-9999-99999', '+999 9999 99999']" inputmode="text" placeholder="____-____-_____ ">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-phone"></span>
            </div>
        </div>
        @error('profile_telp')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    {{-- Password --}}
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

<p class="mt-3 mb-1">
    <a href="{{ route('password.request') }}">I forgot my password</a>
</p>
<p class="mb-0">
    <a href="{{ route('login') }}" class="text-center">Saya sudah memiliki akun</a>
</p>
@endsection

