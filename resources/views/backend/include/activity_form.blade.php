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
            <option value=1 {{ old('status', $activity->status) == 1 ? "selected" : ''}}>On Hold</option>
            <option value=2 {{ old('status', $activity->status) == 2 ? "selected" : ''}}>Cancelled</option>
            <option value=3 {{ old('status', $activity->status) == 3 ? "selected" : ''}}>Success</option>
        </select>
    </div>
@else
    <div class="form-group col-mb-3">
        <label class="form-label" for="activity_name">Nama Aktivitas</label>
        <input id="activity_name" type="text" class="form-control @error('name') is-invalid @enderror" name="activity_name"
        value="{{ old('activity_name') }}"
        required autocomplete="activity_name">

        @error('activity_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
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

    <div class="form-group mb-3">
        <label class="form-label" for="schedule_start">Tanggal Mulai</label>
        <input id="schedule_start" type="datetime-local" class="form-control @error('schedule_start') is-invalid @enderror" name="schedule_start"
        value="{{ old('schedule_start') }}"
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
        value="{{ old('schedule_end') }}"
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
            <option value=1>On Hold</option>
            <option value=2>Cancelled</option>
            <option value=3>Success</option>
        </select>
    </div>
@endif

<div class="row">
    <div class="col-md-6">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
