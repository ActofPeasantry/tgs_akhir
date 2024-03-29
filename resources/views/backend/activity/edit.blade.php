@extends('layouts/main')

@section('title')
    <title>SMKK | Debet&Kredit</title>
@endsection

@section('page_name')
    <h1>Ubah Kegiatan</h1>
@endsection

@section('breadcrumb')
    {{-- Custom helpers, cek app/Helpers/helpers.php dan composer.json di bagian file jalankan composer dump-autoload utk memakainya --}}
    {!!
        breadcrumb([
            'Mengajukan Kegiatan Masjid' => route('activity.propose'),
            'Ubah Kegiatan' => 'Ubah Kegiatan'
        ])
    !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="card card-primary">
                <div class="card-header">
                    <h5 class="card-title" >Ubah Data</h5>
                </div>
                <div class="card-body">
                    <div class="container-fluid">
                        <form action="{{ route("activity.update", $activity->id) }}" method="POST">
                        @csrf
                        @method("PATCH")
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
        });
    </script>
@endpush
