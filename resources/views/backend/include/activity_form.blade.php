@if (isset($activity->id))
    <div class="form-group col-mb-3">
        <label class="form-label" for="activity_name">Nama Aktivitas</label>
        <input id="activity_name" type="text" class="form-control @error('name') is-invalid @enderror" name="activity_name"
        value="{{ old('activity_name', $activity->activity_name)}}"
        required autocomplete="activity_name">

        @error('activity_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group col-mb-3">
        <label class="form-label" for="description">Deskripsi</label>
        <textarea id="description" name="description" class="form-control" rows="4" >{{ old('description', $activity)}}</textarea>

        @error('description')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group col-mb-3">
        <label class="form-label" for="penceramah_name">Nama Penceramah (Opsional)</label>
        <input id="penceramah_name" type="text" class="form-control @error('penceramah_name') is-invalid @enderror" name="penceramah_name"
        value="{{ old('penceramah_name', $activity) }}"
        autocomplete="penceramah_name">

        @error('penceramah_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group col-mb-3">
        <label class="form-label" for="penceramah_telp">Nomor Telepon Penceramah (Opsional)</label>
        <input id="penceramah_telp" name="penceramah_telp" type="text" class="form-control" value="{{ old('penceramah_telp', $activity->penceramah_telp) }}" data-inputmask="'mask': ['9999-9999-99999', '+999 9999 99999']" inputmode="text" placeholder="____-____-_____ ">
    </div>

    <div class="form-group mb-3">
        <label class="form-label" for="activity_categories_id">Kategori</label>
        <select name="activity_categories_id" id="activity_categories_id" class="form-control">
            @foreach ($categories as $category => $value)
            <option value="{{ $value }}" {{ old('activity_categories_id', $activity) === $value ? "selected" : ""}}>{{ $category }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group mb-3">
        <label class="form-label" for="schedule_start">Tanggal Mulai</label>
        <input id="schedule_start" type="datetime-local" class="form-control @error('schedule_start') is-invalid @enderror" name="schedule_start"
        value="{{ old('schedule_start', $activity) }}"
        required autocomplete="schedule_start">

        @error('schedule_start')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group mb-3">
        <label class="form-label" for="schedule_end">Tanggal Selesai</label>
        <input id="schedule_end" type="datetime-local" class="form-control @error('schedule_end') is-invalid @enderror" name="schedule_end"
        value="{{ old('schedule_end', $activity) }}"
        required autocomplete="schedule_end">

        @error('schedule_end')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group mb-3">
        <label class="form-label" for="status">Status</label>
        <select name="status" id="status" class="form-control">
            <option value=1 {{ old('status', $activity->status) == config('constants.activity_status.not_yet') ? "selected" : ''}}>Belum Berjalan</option>
            <option value=2 {{ old('status', $activity->status) == config('constants.activity_status.cancelled') ? "selected" : ''}}>Sudah Berjalan</option>
        </select>
    </div>

    <input type="hidden"  id="user_id" name="user_id" value="{{ auth()->user()->id }}">
@else
    <div class="form-group col-mb-3">
        <label class="form-label" for="activity_name">Nama Aktivitas</label>
        <input id="activity_name" type="text" class="form-control @error('activity_name') is-invalid @enderror" name="activity_name"
        value="{{ old('activity_name') }}"
        required autocomplete="activity_name">

        @error('activity_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group col-mb-3">
        <label class="form-label" for="penceramah_name">Nama Penceramah (Opsional)</label>
        <input id="penceramah_name" type="text" class="form-control @error('penceramah_name') is-invalid @enderror" name="penceramah_name"
        value="{{ old('penceramah_name') }}"
        autocomplete="penceramah_name">

        @error('penceramah_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group col-mb-3">
        <label class="form-label" for="penceramah_telp">Nomor Telepon Penceramah (Opsional)</label>
        <input id="penceramah_telp" name="penceramah_telp" type="text" class="form-control" data-inputmask="'mask': ['9999-9999-99999', '+999 9999 99999']" inputmode="text" placeholder="____-____-_____ ">
    </div>



    <div class="form-group col-mb-3">
        <label class="form-label" for="description">Deskripsi</label>
        <textarea id="description" name="description" class="form-control" rows="4">{{ old('description')}}</textarea>

        @error('description')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group mb-3">
        <label class="form-label" for="activity_categories_id">Kategori</label>
        <select name="activity_categories_id" id="activity_categories_id" class="form-control">
            @foreach ($categories as $category => $value)
                <option value={{ $value }}>{{ $category }}</option>
            @endforeach
        </select>
    </div>

    {{-- <div class="form-group mb-3">
        <label class="form-label" for="schedule_start">Tanggal Mulai</label>
        <input id="schedule_start" type="datetime-local" class="form-control @error('schedule_start') is-invalid @enderror" name="schedule_start"
        value="{{ old('schedule_start') }}"
        required autocomplete="schedule_start">

        @error('schedule_start')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div> --}}
    <div class="form-group mb-3">
        <label class="form-label" for="date_received">Tanggal Mulai</label>
        <div class="input-group date" id="dtp_schedule-start" data-target-input="nearest">
            <input name="schedule_start" type="text" class="form-control datetimepicker-input" data-target="#dtp_schedule-start" required />
            <div class="input-group-append" data-target="#dtp_schedule-start" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
            </div>
        </div>
    </div>

    {{-- <div class="form-group mb-3">
        <label class="form-label" for="schedule_end">Tanggal Selesai</label>
        <input id="schedule_end" type="datetime-local" class="form-control @error('schedule_end') is-invalid @enderror" name="schedule_end"
        value="{{ old('schedule_end') }}"
        required autocomplete="schedule_end">

        @error('schedule_end')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div> --}}
    <div class="form-group mb-3">
        <label class="form-label" for="date_received">Tanggal Selesai</label>
        <div class="input-group date" id="dtp_schedule-end" data-target-input="nearest">
            <input name="schedule_end" type="text" class="form-control datetimepicker-input" data-target="#dtp_schedule-end" required />
            <div class="input-group-append" data-target="#dtp_schedule-end" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
            </div>
        </div>
    </div>

    <input type="hidden"  id="status" name="status" value="{{ config('constants.activity_status.not_yet') }}">
    <input type="hidden"  id="user_id" name="user_id" value="{{ auth()->user()->id }}">

    {{-- <div class="form-group mb-3">
        <label class="form-label" for="status">Status</label>
        <select name="status" id="status" class="form-control">
            <option value=1>On Hold</option>
            <option value=2>Cancelled</option>
            <option value=3>Success</option>
        </select>
    </div> --}}
@endif

<div class="row">
    <div class="col-md-6">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
