@if (isset($user->id))
    {{-- Username --}}
    <div class="form-group mb-3">
        <label class="form-label" for="name">Username</label>
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" required autocomplete="email" placeholder="Username" autofocus>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    {{-- Email --}}
    <div class="form-group mb-3">
        <label class="form-label" for="email">Alamat Email</label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" required autocomplete="email" placeholder="E-mail Address" autofocus>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    {{-- Profile Name --}}
    <div class="form-group mb-3">
        <label class="form-label" for="activity_name">Nama Pengguna</label>
        <input id="profile_name" type="profile_name" class="form-control @error('profile_name') is-invalid @enderror" name="profile_name" value="{{ old('profile_name', $user->profile_name) }}" required autocomplete="profile_name" placeholder="E-mail Address" autofocus>
        @error('profile_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    {{-- Profile Address --}}
    <div class="form-group mb-3">
        <label class="form-label" for="activity_name">Alamat</label>
        <input id="profile_address" type="profile_address" class="form-control @error('profile_address') is-invalid @enderror" name="profile_address" value="{{ old('profile_address', $user->profile_address) }}" required autocomplete="profile_address" placeholder="E-mail Address" autofocus>
        @error('profile_address')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    {{-- Profile Telp --}}
    <div class="form-group mb-3">
        <label class="form-label" for="activity_name">Nomor Telepon</label>
        <input id="profile_telp" name="profile_telp" type="text" class="form-control" value="{{ old('profile_telp', $user->profile_telp) }}" data-inputmask="'mask': ['9999-9999-99999', '+999 9999 99999']" inputmode="text" placeholder="____-____-_____ ">
        @error('profile_telp')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    {{-- Roles --}}
    <div class="form-group">
        <label class="form-label" for="activity_name">Role User</label>
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
    <div class="form-group mb-3">
        <label class="form-label" for="activity_name">Username</label>
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="email" placeholder="Username" autofocus>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    {{-- Email --}}
    <div class="form-group mb-3">
        <label class="form-label" for="activity_name">Alamat e-mail</label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-mail Address" autofocus>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    {{-- Password --}}
    <div class="form-group mb-3">
        <label class="form-label" for="activity_name">Password</label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    {{-- Profile Name --}}
    <div class="form-group mb-3">
        <label class="form-label" for="activity_name">Nama Pengguna</label>
        <input id="profile_name" type="profile_name" class="form-control @error('profile_name') is-invalid @enderror" name="profile_name" value="{{ old('profile_name') }}" required autocomplete="profile_name" placeholder="Nama Pengguna" autofocus>
        @error('profile_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    {{-- Profile Address --}}
    <div class="form-group mb-3">
        <label class="form-label" for="activity_name">Alamat Pengguna</label>
        <input id="profile_address" type="profile_address" class="form-control @error('profile_address') is-invalid @enderror" name="profile_address" value="{{ old('profile_address') }}" required autocomplete="profile_address" placeholder="Alamat Pengguna" autofocus>
        @error('profile_address')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    {{-- Profile Telp --}}
    <div class="form-group mb-3">
        <label class="form-label" for="activity_name">Nomor Telepon</label>
        <input id="profile_telp" name="profile_telp" type="text" class="form-control" value="{{ old('profile_telp') }}" data-inputmask="'mask': ['9999-9999-99999', '+999 9999 99999']" inputmode="text" placeholder="____-____-_____ ">
        @error('profile_telp')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    {{-- Roles --}}
    <div class="form-group">
        <label class="form-label" for="activity_name">Role User</label>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="role[]" value={{ $roles['admin'] }}>
            <label class="form-check-label" for="">{{ rolesName($roles['admin']) }}</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="role[]" value={{ $roles['bendahara'] }}>
            <label class="form-check-label" for="">{{ rolesName($roles['bendahara']) }}</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="role[]" value={{ $roles['pengurus'] }}>
            <label class="form-check-label" for="">{{ rolesName($roles['pengurus']) }}</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="role[]" value={{ $roles['jamaah'] }}>
            <label class="form-check-label" for="">{{ rolesName($roles['jamaah']) }}</label>
        </div>
    </div>
@endif

<div class="row">
    <div class="col-md-6">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
