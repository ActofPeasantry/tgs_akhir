@if (isset($balance->id))
    <div class="form-group mb-3">
        <label class="form-label" for="date_received">Tanggal Diterima</label>
        <input id="date_received" type="date" class="form-control @error('date_received') is-invalid @enderror" name="date_received"
        value="{{ old('date_received', $balance->date_received->format('Y-m-d')) }}"
        required autocomplete="date_received">

        @error('date_received')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group col-mb-3">
        <label class="form-label" for="description">Deskripsi</label>
        <input id="description" type="text" class="form-control @error('name') is-invalid @enderror" name="description"
        value="{{ old('description', $balance->description)}}"
        required autocomplete="description">

        @error('description')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group mb-3">
        <label class="form-label" for="no_invoice">Nomor Invoice</label>

        <input id="no_invoice" type="number" class="form-control @error('name') is-invalid @enderror" name="no_invoice"
        value="{{ old('no_invoice', $balance->no_invoice)}}"
        required autocomplete="no_invoice">

        @error('no_invoice')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group mb-3">
        <label class="form-label" for="balance_category_id">Kategori</label>
        <select name="balance_category_id" id="balance_category_id" class="form-control">
            @foreach ($categories as $category => $value)
                <option value="{{ $value }}" {{ old('balance_category_id', $balance) === $value ? "selected" : ""}}>{{ $category }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group mb-3">
        <label class="form-label" for="debit_credit">Debet/Kredit</label>
        <select name="debit_credit" id="debit_credit" class="form-control">
            <option value="0" {{ old('debit_credit', $balance->debit_credit) == 0 ? "selected" : ''}}>Debet</option>
            <option value="1" {{ old('debit_credit', $balance->debit_credit) == 1 ? "selected" : ''}}>Kredit</option>
        </select>
    </div>

    <div class="form-group mb-3">
        <label class="form-label" for="total_amount">Jumlah Dana (Rp)</label>
        <input id="total_amount" type="number" class="form-control @error('total_amount') is-invalid @enderror" name="total_amount"
        value="{{ old('total_amount', $balance->total_amount) }}"
        required autocomplete="total_amount">

        @error('total_amount')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
@else
    <div class="form-group mb-3">
        <label class="form-label" for="date_received">Tanggal Diterima</label>
        <input id="date_received" type="date" class="form-control @error('date_received') is-invalid @enderror" name="date_received"
        value="{{ old('date_received') }}"
        required autocomplete="date_received">

        @error('date_received')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group col-mb-3">
        <label class="form-label" for="description">Deskripsi</label>
        <input id="description" type="text" class="form-control @error('name') is-invalid @enderror" name="description"
        value="{{ old('description') }}"
        required autocomplete="description">

        @error('description')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group mb-3">
        <label class="form-label" for="no_invoice">Nomor Invoice</label>
        <input id="no_invoice" type="number" class="form-control @error('no_invoice') is-invalid @enderror" name="no_invoice"
        value="{{ old('no_invoice') }}"
        required autocomplete="no_invoice">

        @error('no_invoice')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group mb-3">
        <label class="form-label" for="balance_category_id">Kategori</label>
        <select name="balance_category_id" id="balance_category_id" class="form-control">
            @foreach ($categories as $category => $value)
                <option value={{ $value }}>{{ $category }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group mb-3">
        <label class="form-label" for="debit_credit">Debet/Kredit</label>
        <select name="debit_credit" id="debit_credit" class="form-control">
            <option value=0>Debet</option>
            <option value=1>Kredit</option>
        </select>
    </div>

    <div class="form-group mb-3">
        <label class="form-label" for="total_amount">Jumlah Dana (Rp)</label>
        <input id="total_amount" type="number" class="form-control @error('total_amount') is-invalid @enderror" name="total_amount"
        value="{{ old('total_amount') }}"
        required autocomplete="total_amount">

        @error('total_amount')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
@endif

<div class="row">
    <div class="col-md-6">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
