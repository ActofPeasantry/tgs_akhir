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
@endif

<div class="row">
    <div class="col-md-6">
        <button type="submit" class="btn btn-primary toastrDefaultSuccess">Submit</button>
    </div>
</div>
