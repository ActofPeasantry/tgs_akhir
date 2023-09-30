@if (isset($santriRegistration->id))
    <div class="form-group col-mb-3">
        <label class="form-label" for="category_name">Nama Santri</label>
        <select name="santri_id" id="santri_id" class="form-control">
            @foreach ($santris as $santri => $value)
                <option value="{{ $value }}" {{ old('santri_id', $santriRegistration->santri_id) == $value ? "selected" : ''}}>{{ $santri }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group mb-3">
        <label class="form-label" for="tpq_period_id">Penggunaan Aset</label>
        <select name="tpq_period_id" id="tpq_period_id" class="form-control">
            @foreach ($tpq_periods as $tpq_period => $value)
                <option value="{{ $value }}" {{ old('tpq_period_id', $santriRegistration->tpq_id) == $value ? "selected" : ''}}>{{ $tpq_period }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group mb-3">
        <label class="form-label" for="regist_fee">Biaya Pendaftaran (Rp)</label>
        <input id="regist_fee" type="text" class="form-control @error('regist_fee') is-invalid @enderror" value="{{ old('regist_fee', $santriRegistration->regist_fee) }}" required autocomplete="regist_fee">

        @error('regist_fee')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <input type="hidden"  id="hidden_regist_fee" name="regist_fee" value="">
    <input type="hidden"  id="user_id" name="user_id" value="{{ auth()->user()->id}}">
@else
    <div class="form-group mb-3">
        <label class="form-label" for="santri_id">Nama Santri</label>
        <select name="santri_id" id="santri_id" class="form-control">
            @foreach ($santris as $santri => $value)
                <option value="{{ $value }}">{{ $santri }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group mb-3">
        <label class="form-label" for="tpq_period_id">Periode</label>
        <select name="tpq_period_id" id="tpq_period_id" class="form-control">
            @foreach ($tpq_periods as $tpq_period => $value)
                <option value="{{ $value }}">{{ $tpq_period }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group mb-3">
        <label class="form-label" for="regist_fee">Biaya Pendaftaran (Rp)</label>
        <input id="regist_fee" type="text" class="form-control @error('regist_fee') is-invalid @enderror" value="{{ old('regist_fee') }}" required autocomplete="regist_fee">

        @error('regist_fee')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <input type="hidden"  id="hidden_regist_fee" name="regist_fee" value="">
    <input type="hidden"  id="user_id" name="user_id" value="{{ auth()->user()->id}}">
@endif

<div class="row">
    <div class="col-md-6">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
