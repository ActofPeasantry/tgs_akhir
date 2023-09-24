@if (isset($as_category->id))
    <div class="form-group col-mb-3">
        <label class="form-label" for="category_name">Nama Kategori</label>
        <input id="category_name" type="text" class="form-control @error('name') is-invalid @enderror" name="category_name"
        value="{{ old('category_name', $as_category->category_name)}}"
        required autocomplete="category_name">

        @error('category_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group mb-3">
        <label class="form-label" for="category_type">Penggunaan Aset</label>
        <select name="category_type" id="category_type" class="form-control">
            <option value="Aset Operasional" {{ old('category_type', $as_category->category_type) == "Aset Operasional" ? "selected" : ''}}>Aset Operasional</option>
            <option value="Aset Non Operasional" {{ old('category_type', $as_category->category_type) == "Aset Non Operasional" ? "selected" : ''}}>Aset Non Operasional</option>
        </select>
    </div>
@else
    <div class="form-group col-mb-3">
        <label class="form-label" for="category_name">Nama Kategori</label>
        <input id="category_name" type="text" class="form-control @error('name') is-invalid @enderror" name="category_name"
        value="{{ old('category_name') }}"
        required autocomplete="category_name">

        @error('category_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group mb-3">
        <label class="form-label" for="category_type">Debet/Kredit</label>
        <select name="category_type" id="category_type" class="form-control">
            <option value="Aset Operasional">Aset Operasional</option>
            <option value="Aset Non Operasional">Aset Non Operasional</option>
        </select>
    </div>
@endif

<div class="row">
    <div class="col-md-6">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
