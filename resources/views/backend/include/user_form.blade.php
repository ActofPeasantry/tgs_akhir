@if (isset($user->id))
    {{-- Username --}}
    <div class="input-group mb-3">
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" required autocomplete="email" placeholder="Username" autofocus>
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
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" required autocomplete="email" placeholder="E-mail Address" autofocus>
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

    {{-- Roles --}}
    <div class="form-group">
        @foreach ($roles as $role)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="role[]"
                    @if( in_array($role, $user->userRoles->pluck('role_id')->toArray(), TRUE) )
                        checked=''
                    @endif
                value="{{$role}}" id="{{$role}}">
                <label class="form-check-label" for="{{$user->callRoleName($role)}}">{{$user->callRoleName($role)}}</label>
            </div>
        @endforeach
    </div>
@else
    {{-- Username --}}
    <div class="input-group mb-3">
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="email" placeholder="Username" autofocus>
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

    {{-- Roles --}}
    <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="role[]" value={{ $roles['jamaah'] }}>
                <label class="form-check-label" for="">{{ rolesName($roles['jamaah']) }}</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="role[]" value={{ $roles['pengurus'] }}>
                <label class="form-check-label" for="">{{ rolesName($roles['pengurus']) }}</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="role[]" value={{ $roles['admin'] }}>
                <label class="form-check-label" for="">{{ rolesName($roles['admin']) }}</label>
            </div>
    </div>
@endif

<div class="row">
    <div class="col-md-6">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
