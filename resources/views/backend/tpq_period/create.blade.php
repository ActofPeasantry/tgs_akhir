@extends('layouts/main')

@section('title')
    <title>SMKK | Debet&Kredit</title>
@endsection

@section('page_name')
    <h1>Tambah Periode</h1>
@endsection

@section('breadcrumb')
    {{-- Custom helpers, cek app/Helpers/helpers.php dan composer.json di bagian file jalankan composer dump-autoload utk memakainya --}}
    {!!
        breadcrumb([
            'Lihat Periode Pendaftaran' => route('tpq_period.index'),
            'Tambah Periode Pendaftaran' => 'Tambah Periode Pendaftaran'
        ])
    !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                    <h5 class="card-title" >Tambah Data</h5>
                </div>
                <div class="card-body">
                    <div class="container-fluid">
                        <form action="{{ route("tpq_period.store") }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            @include('backend.include.tpq_period_form')
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

        // $("#telp_number").on({
        //     keyup: function () {
        //         $('#hidden_telp_number').val($('#telp_number').val().replace(/\D/g, ""));
        //         console.log($('#telp_number').val().replace(/\D/g, ""));
        //     }
        // });
    </script>

    <script type="text/javascript">
        $(function () {
            $('#dtp_schedule-start').datetimepicker({
                format:'DD-MM-YYYY',
                locale:'id',
                icons: {
                    time: "far fa-clock"
                }
            });
            $('#dtp_schedule-end').datetimepicker({
                useCurrent: false,
                format:'DD-MM-YYYY',
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

    <script>
        $(function () {
            bsCustomFileInput.init();
        });
    </script>
@endpush
