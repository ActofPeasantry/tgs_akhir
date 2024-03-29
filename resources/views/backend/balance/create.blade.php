@extends('layouts/main')

@section('title')
    <title>SMKK | Laporan Keuangan</title>
@endsection

@section('page_name')
    <h1>Tambah Laporan Keuangan</h1>
@endsection

@section('breadcrumb')
    {{-- Custom helpers, cek app/Helpers/helpers.php dan composer.json di bagian file jalankan composer dump-autoload utk memakainya --}}
    {!!
        breadcrumb([
            'Lihat Laporan Keuangan' => route('balance.index'),
            'Tambah Laporan Keuangan' => 'Tambah Laporan Keuangan'
        ])
    !!}
@endsection

@section('content')
   <div class="card card-primary">
        <div class="card-header">
            <h5 class="card-title">Tambah Data</h5>
        </div>
        <div class="card-body">
            <div class="container-fluid">
                <form action="{{ route("balance.store") }}" method="POST">
                @csrf
                    @include('backend.include.balance_form')
                </form>
            </div>
        </div>
    </div>
@endsection

@push('child-scripts')
    <script type="text/javascript">
        $(function () {
            $('#dtp_date_received').datetimepicker({format:'DD-MM-YYYY', locale:'id'});
        });
    </script>
    {{-- <script type="text/javascript">
        $("#total_amount").keyup(function(){
            return $("#total_amount").val().toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
            console.log($('#total_amount').val().toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
        })
    </script> --}}
    <script>
        // Jquery Dependency
        $(document).ready(function() {
            formatCurrency($('#total_amount'));
            $('#hidden_total_amount').val($('#total_amount').val().replace(/\D/g, ""));
            console.log($('#total_amount').val().replace(/\D/g, ""));
        });

        $("#total_amount").on({
            keyup: function () {
                formatCurrency($(this));
                $('#hidden_total_amount').val($('#total_amount').val().replace(/\D/g, ""));
                console.log($('#total_amount').val().replace(/\D/g, ""));
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
    </script>
@endpush
