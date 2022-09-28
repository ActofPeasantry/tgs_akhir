@if (isset($asset->id))
    <div class="form-group col-mb-3">
        <label class="form-label" for="asset_name">Nama Aset</label>
        <input id="asset_name" type="text" class="form-control @error('name') is-invalid @enderror" name="asset_name"
        value="{{ old('asset_name', $asset->asset_name)}}"
        required autocomplete="asset_name">

        @error('asset_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group mb-3">
        <label class="form-label" for="asset_categories_id">Jenis Aset</label>
        <select name="asset_categories_id" id="asset_categories_id" class="form-control">
            @foreach ($categories as $category => $value)
                <option value="{{ $value }}" {{ old('asset_categories_id', $asset) === $value ? "selected" : ""}}>{{ $category }}</option>
            @endforeach
        </select>
    </div>
@else
    <div class="form-group col-mb-3">
        <label class="form-label" for="asset_name">Nama Aset</label>
        <input id="asset_name" type="text" class="form-control @error('name') is-invalid @enderror" name="asset_name"
        value="{{ old('asset_name') }}"
        required autocomplete="asset_name">

        @error('asset_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group mb-3">
        <label class="form-label" for="asset_categories_id">Jenis Aset</label>
        <select name="asset_categories_id" id="asset_categories_id" class="form-control">
            @foreach ($categories as $category => $value)
                <option value={{ $value }}>{{ $category }}</option>
            @endforeach
        </select>
    </div>
@endif

<div class="row">
    <div class="col-md-6">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
