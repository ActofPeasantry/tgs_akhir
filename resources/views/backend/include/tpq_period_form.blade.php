@if (isset($tpqPeriod->id))
    <div class="form-group col-mb-3">
        <label class="form-label" for="tpq_period_name">Nama Kategori</label>
        <input id="tpq_period_name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
        value="{{ old('name', $tpqPeriod->name) }}"
        required>

        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group mb-3">
        <label class="form-label" for="date_received">Tanggal Mulai</label>
        <div class="input-group date" id="dtp_schedule-start" data-target-input="nearest">
            <input name="start_date" type="text" class="form-control datetimepicker-input @error('start_date') is-invalid @enderror" data-target="#dtp_schedule-start" required />
            <div class="input-group-append" data-target="#dtp_schedule-start" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
            </div>
        </div>
        @error('start_date')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group mb-3">
        <label class="form-label" for="date_received">Tanggal Selesai</label>
        <div class="input-group date" id="dtp_schedule-end" data-target-input="nearest">
            <input name="end_date" type="text" class="form-control datetimepicker-input @error('end_date') is-invalid @enderror" data-target="#dtp_schedule-end" required />
            <div class="input-group-append" data-target="#dtp_schedule-end" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
            </div>
        </div>

        @error('end_date')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

@else
    <div class="form-group col-mb-3">
        <label class="form-label" for="tpq_period_name">Nama Kategori</label>
        <input id="tpq_period_name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
        value="{{ old('name') }}"
        required>

        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group mb-3">
        <label class="form-label" for="date_received">Tanggal Mulai</label>
        <div class="input-group date" id="dtp_schedule-start" data-target-input="nearest">
            <input name="start_date" type="text" class="form-control datetimepicker-input" data-target="#dtp_schedule-start" required />
            <div class="input-group-append" data-target="#dtp_schedule-start" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
            </div>
        </div>
    </div>

    <div class="form-group mb-3">
        <label class="form-label" for="date_received">Tanggal Selesai</label>
        <div class="input-group date" id="dtp_schedule-end" data-target-input="nearest">
            <input name="end_date" type="text" class="form-control datetimepicker-input" data-target="#dtp_schedule-end" required />
            <div class="input-group-append" data-target="#dtp_schedule-end" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
            </div>
        </div>
    </div>
@endif

<div class="row">
    <div class="col-md-6">
        <button type="submit" class="btn btn-primary toastrDefaultSuccess">Submit</button>
    </div>
</div>
