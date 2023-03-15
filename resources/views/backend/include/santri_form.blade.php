@if (isset($santri->id))
    <div class="form-group col-mb-3">
        <label class="form-label" for="santri_name">Nama Santri</label>
        <input id="santri_name" type="text" class="form-control @error('santri_name') is-invalid @enderror" name="santri_name"
        value="{{ old('santri_name', $santri->santri_name) }}" autocomplete="santri_name" required>

        @error('santri_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group col-mb-3">
        <label class="form-label" for="birth_place">Tempat / Tanggal Lahir</label>
        <div class="row">
            <div class="col-3">
                <input id="birth_place" type="text" class="form-control @error('birth_place') is-invalid @enderror" name="birth_place" value="{{ old('birth_place', $santri->birth_place) }}" autocomplete="birth_place" required>

                @error('birth_place')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col-3">
                <input id="birth_date" type="date" class="form-control @error('birth_date') is-invalid @enderror" name="birth_date"
                value="{{ old('birth_date', $santri->birth_date) }}"
                required autocomplete="birth_date">

                @error('birth_date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
    </div>

    <div class="form-group col-mb-3">
        <label class="form-label" for="sex">Jenis Kelamin</label>
        <select name="sex" id="sex" class="form-control">
            <option value=1 {{ old('sex', $santri->sex) === 1 ? "selected" : ""}}>Laki-laki</option>
            <option value=2 {{ old('sex', $santri->sex) === 2 ? "selected" : ""}}>Perempuan</option>
        </select>
    </div>

    <div class="form-group col-mb-3">
        <label class="form-label" for="telp_number">Nomor Telepon</label>
        {{-- <input id="telp_number" type="text" class="form-control @error('telp_number') is-invalid @enderror" name="telp_number" value="{{ old('telp_number', $santri->telp_number) }}" autocomplete="telp_number" required> --}}
        <input id="telp_number" type="text" class="form-control" name="telp_number" value="{{ old('telp_number', $santri->telp_number) }}" data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask="" inputmode="text" placeholder="____-____-_____ " required>

    </div>

    <div class="form-group col-mb-3">
        <label class="form-label" for="address">Alamat</label>
        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address', $santri->address) }}" autocomplete="address" required>

        @error('address')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    {{-- <h4>Nama Orang Tua</h4> --}}

    <div class="form-group col-mb-3">
        <div class="row">
            <div class="col-6">
                <label class="form-label" for="father_name">Nama Ayah</label>
                <input id="father_name" type="text" class="form-control @error('father_name') is-invalid @enderror" name="father_name"
                value="{{ old('father_name', $santri->father_name) }}"
                required autocomplete="father_name">

                @error('father_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col-6">
                <label class="form-label" for="mother_name">Nama Ibu</label>
                <input id="mother_name" type="text" class="form-control @error('mother_name') is-invalid @enderror" name="mother_name"
                value="{{ old('mother_name', $santri->mother_name) }}"
                required autocomplete="mother_name">

                @error('mother_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
    </div>

    <div class="form-group col-mb-3">
        <div class="row">
            <div class="col-5">
                <label class="form-label" for="school_name">Nama Sekolah</label>
                <input id="school_name" type="text" class="form-control @error('school_name') is-invalid @enderror" name="school_name"
                value="{{ old('school_name', $santri->school_name) }}"
                required autocomplete="school_name">

                @error('school_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col-3">
                <label class="form-label" for="school_grade">Kelas</label>
                <select name="school_grade" id="school_grade" class="form-control">
                    @for ($x=1; $x<=6; $x++)
                        <option value={{ $x }} {{ old('school_grade', $santri->school_grade) === $x ? "selected" : ""}}>{{ $x }}</option>
                    @endfor
                </select>
            </div>
        </div>
    </div>

    <div class="form-group col-mb-3">
        <label class="form-label" for="photo">Foto Santri</label> <br>
        <div class="custom-file col-8">
            <input id="photo" type="file" class="custom-file-input @error('photo') is-invalid @enderror" name="photo"
            value="{{ old('photo', $santri->photo) }}"
            autocomplete="photo">

            @error('photo')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <label class="custom-file-label" for="photo">Pilih Foto</label>
        </div>
    </div>
    <input type="hidden"  id="user_id" name="user_id" value="{{ auth()->user()->id}}">
@else
    {{-- Nama Santri --}}
    <div class="form-group col-mb-3">
        <label class="form-label" for="santri_name">Nama Santri</label>
        <input id="santri_name" type="text" class="form-control @error('santri_name') is-invalid @enderror" name="santri_name"
        value="{{ old('santri_name') }}" autocomplete="santri_name" required>

        @error('santri_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    {{-- Tempat/Tanggal Lahir --}}
    <div class="form-group col-mb-3">
        <label class="form-label" for="birth_place">Tempat / Tanggal Lahir</label>
        <div class="row">
            <div class="col-3">
                <input id="birth_place" type="text" class="form-control @error('birth_place') is-invalid @enderror" name="birth_place" value="{{ old('birth_place') }}" autocomplete="birth_place" required>

                @error('birth_place')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col-3">
                <input id="birth_date" type="date" class="form-control @error('birth_date') is-invalid @enderror" name="birth_date"
                value="{{ old('birth_date') }}"
                required autocomplete="birth_date">

                @error('birth_date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
    </div>
    {{-- Jenis Kelamin --}}
    <div class="form-group col-mb-3">
        <label class="form-label" for="sex">Jenis Kelamin</label>
        <select name="sex" id="sex" class="form-control">
            <option value=1>Laki-laki</option>
            <option value=2>Perempuan</option>
        </select>
    </div>
    {{-- Telepon --}}
    <div class="form-group col-mb-3">
        <label class="form-label" for="telp_number">Nomor Telepon</label>
        {{-- <input id="telp_number" type="number" class="form-control" name="telp_number" value="{{ old('telp_number') }}" autocomplete="telp_number" required> --}}
        <input id="telp_number" type="text" class="form-control" name="telp_number" value="{{ old('telp_number') }}" data-inputmask="'mask': ['9999-9999-99999', '+999 9999 99999']" inputmode="text" placeholder="____-____-_____ " required>
    </div>

    <div class="form-group col-mb-3">
        <label class="form-label" for="address">Alamat</label>
        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" autocomplete="address" required>

        @error('address')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    {{-- <h4>Nama Orang Tua</h4> --}}

    <div class="form-group col-mb-3">
        <div class="row">
            <div class="col-6">
                <label class="form-label" for="father_name">Nama Ayah</label>
                <input id="father_name" type="text" class="form-control @error('father_name') is-invalid @enderror" name="father_name"
                value="{{ old('father_name') }}"
                required autocomplete="father_name">

                @error('father_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col-6">
                <label class="form-label" for="mother_name">Nama Ibu</label>
                <input id="mother_name" type="text" class="form-control @error('mother_name') is-invalid @enderror" name="mother_name"
                value="{{ old('mother_name') }}"
                required autocomplete="mother_name">

                @error('mother_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
    </div>

    <div class="form-group col-mb-3">
        <div class="row">
            <div class="col-5">
                <label class="form-label" for="school_name">Nama Sekolah</label>
                <input id="school_name" type="text" class="form-control @error('school_name') is-invalid @enderror" name="school_name"
                value="{{ old('school_name') }}"
                required autocomplete="school_name">

                @error('school_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col-3">
                <label class="form-label" for="mother_name">Kelas</label>
                <select name="school_grade" id="school_grade" class="form-control">
                    @for ($x=1; $x<=6; $x++)
                        <option value={{ $x }}>{{ $x }}</option>
                    @endfor
                </select>
            </div>
        </div>
    </div>

    <div class="form-group col-mb-3">
        <label class="form-label" for="photo">Foto Santri</label> <br>
        <div class="custom-file col-8">
            <input id="photo" type="file" class="custom-file-input @error('photo') is-invalid @enderror" name="photo"
            value="{{ old('photo') }}"
            autocomplete="photo">

            @error('photo')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <label class="custom-file-label" for="photo">Pilih Foto</label>
        </div>
    </div>
    <input type="hidden"  id="user_id" name="user_id" value="{{ auth()->user()->id}}">
    {{-- <div class="form-group mb-3">
        <label class="form-label" for="asset_categories_id">Jenis Aset</label>
        <select name="asset_categories_id" id="asset_categories_id" class="form-control">
            @foreach ($categories as $category => $value)
                <option value={{ $value }}>{{ $category }}</option>
            @endforeach
        </select>
    </div> --}}
@endif

<div class="row">
    <div class="col-md-6">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
