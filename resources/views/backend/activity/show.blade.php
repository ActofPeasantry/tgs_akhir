@extends('layouts/main')

@section('title')
    <title>Detail Aktivitas</title>
@endsection

@section('page_name')
    <h1>Detail Aktivitas</h1>
@endsection

@section('breadcrumb')
    {{-- Custom helpers, cek app/Helpers/helpers.php dan composer.json di bagian file jalankan composer dump-autoload utk memakainya --}}
    {!!
        breadcrumb([
            'Mengajukan Kegiatan' => route('activity.propose'),
            'Detail Aktivitas' => 'Detail Aktivitas'
        ])
    !!}
@endsection

@section('content')
<div class="col-md-10">
    <div class="card card-primary">
        <div class="card-header">
            <h5 class="card-title" >Detail Data</h5>
        </div>
        <div class="card-body">
            <div class="container-fluid">
                <div class="form-group col-mb-3">
                    <label class="form-label" for="activity_name">Nama Aktivitas</label>
                    <p>{{ $activity->activity_name }}</p>
                </div>

                <div class="form-group col-mb-3">
                    <label class="form-label" for="description">Deskripsi</label>
                    <p>{{ $activity->description }}</p>
                </div>

                <div class="form-group col-mb-3">
                    <label class="form-label" for="activity_categories_id">Kategori</label>
                    <p>{{ $activity->ActivityCategory->category_name }}</p>
                </div>

                <div class="form-group col-mb-3">
                    <label class="form-label" for="schedule_start">Tanggal Mulai</label>
                    <p>{{ $activity->schedule_start }}</p>
                </div>

                <div class="form-group col-mb-3">
                    <label class="form-label" for="schedule_end">Tanggal Selesai</label>
                    <p>{{ $activity->schedule_end }}</p>
                </div>

                <div class="form-group col-mb-3">
                    <label class="form-label" for="status">Status Kegiatan</label>
                    <p>{{ activityStatus($activity->status) }}</p>
                </div>

                <div class="form-group col-mb-3">
                    <label class="form-label" for="status">Status Pengajuan</label>
                    <p>{{ submissionStatus($activity->submission_status) }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('child-scripts')
    <script>
        $(function () {
            bsCustomFileInput.init();
        });
    </script>
@endpush
