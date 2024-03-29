<input type="hidden" name="asset_id" id="asset_id" value="{{ $as_id }}">
@if (isset($as_detail->id))
    <div class="form-group mb-3">
        <label class="form-label" for="procurement_date">Tanggal Pengadaan Aset</label>
        <div class="input-group date" id="dtp_procurement_date" data-target-input="nearest">
            <input name="procurement_date" type="text" class="form-control datetimepicker-input" data-target="#dtp_procurement_date" value="{{ old('procurement_date', $as_detail->procurement_date->format('d-m-Y')) }}" required />
            <div class="input-group-append" data-target="#dtp_procurement_date" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
            </div>
        </div>
    </div>

    <div class="form-group mb-3">
        <label class="form-label" for="quality">Kualitas Aset</label>
        <select name="quality" id="quality" class="form-control">
            <option value="1" {{ old('quality', $as_detail->quality) == 1 ? "selected" : ''}}>Baik</option>
            <option value="2" {{ old('quality', $as_detail->quality) == 2 ? "selected" : ''}}>Tidak Baik</option>
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
        <label class="form-label" for="procurement_date">Tanggal Pengadaan Aset</label>
        <div class="input-group date" id="dtp_procurement_date" data-target-input="nearest">
            <input name="procurement_date" type="text" class="form-control datetimepicker-input" data-target="#dtp_procurement_date" required />
            <div class="input-group-append" data-target="#dtp_procurement_date" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
            </div>
        </div>
    </div>

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
