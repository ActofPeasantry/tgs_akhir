<input type="hidden" name="asset_id" id="asset_id" value="{{ $as_id }}">
@if (isset($as_detail->id))
    <div class="form-group mb-3">
        <label class="form-label" for="quality">Kualitas Aset</label>
        <select name="quality" id="quality" class="form-control">
            <option value="1" {{ old('quality', $as_detail->quality) == 1 ? "selected" : ''}}>Bagus</option>
            <option value="2" {{ old('quality', $as_detail->quality) == 2 ? "selected" : ''}}>Sedang</option>
            <option value="3" {{ old('quality', $as_detail->quality) == 3 ? "selected" : ''}}>Buruk</option>
        </select>
    </div>

    <div class="form-group mb-3">
        <label for="form-label" for="photo">Foto Aset</label>
        <div class="input-group">
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="photo" id="photo" accept="image/*" value="{{ old('photo', $as_detail->photo) }}">
              <label class="custom-file-label" for="photo">Pilih Foto</label>
            </div>
        </div>
    </div>
@else
    <div class="form-group mb-3">
        <label class="form-label" for="quality">Kualitas Aset</label>
        <select name="quality" id="quality" class="form-control">
            <option value=1>Baik</option>
            <option value=2>Tidak Baik</option>
        </select>
    </div>

    <div class="form-group mb-3">
        <label for="form-label" for="photo">Foto Aset</label>
        <div class="input-group">
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="photo" id="photo" accept="image/*">
              <label class="custom-file-label" for="photo">Pilih Foto</label>
            </div>
        </div>
    </div>
@endif

<div class="row">
    <div class="col-md-6">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
