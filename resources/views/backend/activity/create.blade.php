@extends('layouts/main')

@section('title')
    <title>SMKK | Debet&Kredit</title>
@endsection

@section('page_name')
    <h1>Tambah Kegiatan</h1>
@endsection

@section('breadcrumb')
    {{-- Custom helpers, cek app/Helpers/helpers.php dan composer.json di bagian file jalankan composer dump-autoload utk memakainya --}}
    {!!
        breadcrumb([
            'Mengajukan Kegiatan Masjid' => route('activity.propose'),
            'Tambah Kegiatan' => 'Tambah Kegiatan'
        ])
    !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="card card-primary">
                <div class="card-header">
                    <h5 class="card-title" >Tambah Data</h5>
                </div>
                <div class="card-body">
                    <div class="container-fluid">
                        <form action="{{ route("activity.store") }}" method="POST">
                        @csrf
                            @include('backend.include.activity_form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="row">
        <div class="col-12">
          <a href="#" class="btn btn-secondary">Cancel</a>
          <input type="submit" value="Create new Project" class="btn btn-success float-right">
        </div>
    </div>
    <br> --}}
@endsection

@push('child-scripts')

    <script>
        $(document).ready(function(){
            $(":input").inputmask();
        });
    </script>

    <script type="text/javascript">
        $(function () {
            $('#dtp_schedule-start').datetimepicker({
                format:'DD-MM-YYYY HH:mm',
                locale:'id',
                icons: {
                    time: "far fa-clock"
                }
            });
            $('#dtp_schedule-end').datetimepicker({
                useCurrent: false,
                format:'DD-MM-YYYY HH:mm',
                locale:'id',
                icons: {
                    time: "far fa-clock"
                }
            });

            $("#dtp_schedule-start").on("change.datetimepicker", function (e) {
                $('#dtp_schedule-end').datetimepicker('minDate', e.date);
            });
            $("#dtp_schedule-end").on("change.datetimepicker", function (e) {
                $('#dtp_schedule-start').datetimepicker('maxDate', e.date);
            });
        });
    </script>
@endpush
