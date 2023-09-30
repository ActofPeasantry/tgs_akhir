@extends('layouts/main')

@section('title')
    <title>SMKK | Debet&Kredit</title>
@endsection

@section('page_name')
    <h1>Daftar Santri</h1>
@endsection

@section('breadcrumb')
    {{-- Custom helpers, cek app/Helpers/helpers.php dan composer.json di bagian file jalankan composer dump-autoload utk memakainya --}}
    {!!
        breadcrumb([
            'Pendaftaran Santri' => route('santri.index'),
            'Daftar Santri' => 'Daftar Santri'
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
                        <form action="{{ route("santri.store") }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            @include('backend.include.santri_form')
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
    <script>
        $(function () {
            bsCustomFileInput.init();
        });
    </script>

    {{-- <script>
        // Jquery Dependency
        $(document).ready(function() {
            formatCurrency($('#regist_fee'));
            $('#hidden_total_amount').val($('#regist_fee').val().replace(/\D/g, ""));
            console.log($('#regist_fee').val().replace(/\D/g, ""));
        });

        $("#regist_fee").on({
            keyup: function () {
                formatCurrency($(this));
                $('#hidden_total_amount').val($('#regist_fee').val().replace(/\D/g, ""));
                console.log($('#regist_fee').val().replace(/\D/g, ""));
            }
        });

        function formatNumber(n) {
            // format number 1000000 to 1,234,567
            return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        function formatCurrency(input) {
            // get input value
            var input_val = input.val();
            // don't validate empty input
            if (input_val === "") {
                return;
            }

            // no decimal entered
            // remove all non-digits
            input_val = formatNumber(input_val);
            input_val = "Rp " + input_val;

            // send updated string to input
            input.val(input_val);
        }
    </script> --}}
@endpush
