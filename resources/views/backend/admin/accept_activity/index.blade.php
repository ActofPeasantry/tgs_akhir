@extends('layouts/main')

@section('title')
    <title>SMKK | Debet&Kredit</title>
@endsection

@section('page_name')
    <h1>Menyetujui Kegiatan Masjid</h1>
@endsection

@section('breadcrumb')
    {{-- Custom helpers, cek app/Helpers/helpers.php dan composer.json di bagian file jalankan composer dump-autoload utk memakainya --}}
    {!!
        breadcrumb([
            'Menyetujui Kegiatan Masjid' => 'Menyetujui Kegiatan Masjid'
        ])
    !!}
@endsection

@section('content')
<form action="{{route('admin.accept_activity.accept_checked')}}" method="post" style="display: inline">
    @csrf {{ method_field('PATCH') }}
    <div class="card card-primary">
        <div class="card-header">
            <h5 class="card-title">Daftar Kegiatan</h5>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                <thead>
                    <tr role="row">
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">Nama Kegiatan</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Kategori Kegiatan</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Tanggal Mulai</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Tanggal Selesai</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Nama Pengaju</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Status</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($x_activities as $activity)
                        <tr class="">

                            <td class="dtr-control sorting_1" tabindex="0">
                                <div class="icheck-primary d-inline ml-2">
                                    <input class="activity_check" type="checkbox" id="activity_id{{ $activity->id }}" name="activity_id[]" value="{{ $activity->id }}">
                                    <label for="submission_status">{{ $activity->activity_name }}</label>
                                </div>
                            </td>
                            <td class="dtr-control sorting_1 text-center">{{ $activity->activityCategory->category_name }}</td>
                            <td class="dtr-control sorting_1 text-center">
                                {{ $activity->schedule_start->translatedFormat('d F Y') }}<br>
                                {{ $activity->schedule_start->format('H:i') }}
                            </td>
                            <td class="dtr-control sorting_1 text-center">
                                {{ $activity->schedule_end->translatedFormat('d F Y') }} <br>
                                {{ $activity->schedule_end->translatedFormat('H:i') }}
                            </td>
                            <td class="dtr-control sorting_1 text-center">{{ $activity->users->name }}</td>
                            <td class="dtr-control sorting_1 text-center">{{ submissionStatus($activity->submission_status) }}</td>
                            <td class="text-center">
                                <a class='btn btn-primary' href="{{route('admin.accept_activity.show', [$activity->id])}}">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                </tfoot>
              </table>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-2 mt-1 ml-1">
                    <input type="checkbox" id="all_activity" name="all_activity">
                    <label for="all_activity">Ceklis Seluruh Data</label>
                </div>
                <div class="col-8">
                    <button id="accept_checked" name="accept_checked" value="1" onclick="return confirm('Apakah anda yakin?')" class="btn btn-success check_all_button" type="submit" disabled>Terima data diceklis</button>
                    <button id="accept_checked" name="accept_checked" value="2" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger check_all_button" type="submit" disabled>Tolak data diceklis</button>
                </div>
            </div>
        </div>
    </div>
</form>

<div class="card card-success">
    <div class="card-header">
        <h5 class="card-title">Aset yang Sudah Diproses</h5>
        <div class="card-tools">
            <button id="card-collapse" type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example1_info">
            <thead>
                <tr role="row">
                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">Nama Kegiatan</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Kategori Kegiatan</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Tanggal Mulai</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Tanggal Selesai</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Nama Pengaju</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($y_activities as $activity)
                    <tr class="">
                        <td class="dtr-control sorting_1" tabindex="0">
                            <div class="icheck-primary d-inline ml-2">
                                <label for="submission_status">{{ $activity->activity_name }}</label>
                            </div>
                        </td>
                        <td class="dtr-control sorting_1 text-center">{{ $activity->activityCategory->category_name }}</td>
                        <td class="dtr-control sorting_1 text-center">{{ $activity->schedule_start }}</td>
                        <td class="dtr-control sorting_1 text-center">{{ $activity->schedule_end }}</td>
                        <td class="dtr-control sorting_1 text-center">{{ $activity->users->name }}</td>
                        <td class="dtr-control sorting_1 text-center">{{ submissionStatus($activity->submission_status) }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
            </tfoot>
          </table>
    </div>
</div>
@endsection

@push('child-scripts')
<script>
    $(function(){
        $('#example1').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>

<script>
    // Toggle collapse
    $('#card-collapse').CardWidget('toggle');

    // Check if any data are checked, return bool
    function anyTrue(nodeList) {
        for (var i = 0; i < nodeList.length; i++) {
            if (nodeList[i].checked === true) return true;
        }
        return false;
    }
    // Check if all data are checked, return bool
    function allTrue(nodeList) {
        for (var i = 0; i < nodeList.length; i++) {
            if (nodeList[i].checked === false) return false;
        }
        return true;
    }
    // alert(allTrue($('.activity_check')));

    function unlockButton(){
        $('.check_all_button').prop('disabled', true);
        if (anyTrue( $('.activity_check') )) {
            $('.check_all_button').prop('disabled', false);
        }
    }

    function checkedAllActivity(){
        $('#all_activity').prop('checked', false);
        if (allTrue( $('.activity_check') )) {
            $('#all_activity').prop('checked', true);
        }
    }

    $('.activity_check').click(function(event){
        unlockButton(); checkedAllActivity();
    });

    $('#all_activity').change(function() {
        // alert( this.value );
        if(this.checked) {
            $('.activity_check').prop('checked', true);
        }
        else{
            $('.activity_check').prop('checked', false);
        }
        $('.activity_check').click(unlockButton());
    });
</script>
    @include('backend.include.alert.toastr')
    @include('backend.include.alert.swalert')
@endpush
