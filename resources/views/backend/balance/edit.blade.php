@extends('layouts/main')

@section('title')
    <title>SMKK | Laporan Keuangan</title>
@endsection

@section('page_name')
    <h1>Laporan Keuangan</h1>
@endsection

@section('breadcrumb')
    {{-- Custom helpers, cek app/Helpers/helpers.php dan composer.json di bagian file jalankan composer dump-autoload utk memakainya --}}
    {!!
        breadcrumb([
            'Laporan Keuangan' => 'Laporan Keuangan'
        ])
    !!}
@endsection

@section('content')
   <div class="card card-primary">
        <div class="card-header">
            <h5 class="card-title">Ubah Data</h5>
        </div>
        <div class="card-body">
            <div class="container-fluid">
                <form method="POST" action="{{ route('balance.update', $balance->id) }}">
                @csrf
                @method("PATCH")
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
    <script>
        // Jquery Dependency

        $("#total_amount").on({
            focus: function () {
                formatCurrency($(this));
                $('#hidden_total_amount').val($('#total_amount').val().replace(/\D/g, ""));
                console.log($('#total_amount').val().replace(/\D/g, ""));
            }
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
