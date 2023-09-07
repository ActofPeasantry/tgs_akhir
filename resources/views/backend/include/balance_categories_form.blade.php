@if (isset($b_category->id))
    <div class="form-group col-mb-3">
        <label class="form-label" for="category_name">Nama Kategori</label>
        <input id="category_name" type="text" class="form-control @error('name') is-invalid @enderror" name="category_name"
        value="{{ old('category_name', $b_category->category_name)}}"
        required autocomplete="category_name">

        @error('category_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group mb-3">
        <label class="form-label" for="debit_credit">Debet/Kredit</label>
        <select name="debit_credit" id="debit_credit" class="form-control">
            <option value="0" {{ old('debit_credit', $b_category->debit_credit) == 0 ? "selected" : ''}}>Debet</option>
            <option value="1" {{ old('debit_credit', $b_category->debit_credit) == 1 ? "selected" : ''}}>Kredit</option>
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
        <label class="form-label" for="debit_credit">Debet/Kredit</label>
        <select name="debit_credit" id="debit_credit" class="form-control">
            <option value=0>Debet</option>
            <option value=1>Kredit</option>
        </select>
    </div>
@endif

<div class="row">
    <div class="col-md-6">
        <button type="submit" class="btn btn-primary toastrDefaultSuccess">Submit</button>
    </div>
</div>
