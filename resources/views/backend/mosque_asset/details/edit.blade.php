@extends('layouts/main')

@section('title')
    <title>SMKK | Debet&Kredit</title>
@endsection

@section('page_name')
    <h1>Ubah Detail Aset Masjid</h1>
@endsection

@section('breadcrumb')
    {{-- Custom helpers, cek app/Helpers/helpers.php dan composer.json di bagian file jalankan composer dump-autoload utk memakainya --}}
    {!!
        breadcrumb([
            'Lihat Aset Masjid' => route('asset.index'),
            'Detail Aset' => route('asset.show', $as_detail->asset_id),
            'Ubah Detail Aset' => 'Ubah Detail Aset'
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
                <form action="{{ route("asset_detail.update", $as_detail->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PATCH")
                    @include('backend.include.asset_details_form')
                </form>
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

    <script type="text/javascript">
        $(function () {
            $('#dtp_procurement_date').datetimepicker({format:'DD-MM-YYYY', locale:'id'});
        });
    </script>

    <script>
        // Jquery Dependency
        $(document).ready(function() {
            formatCurrency($('#budget'));
            $('#hidden_total_amount').val($('#budget').val().replace(/\D/g, ""));
            console.log($('#budget').val().replace(/\D/g, ""));
        });

        $("#budget").on({
            keyup: function () {
                formatCurrency($(this));
                $('#hidden_total_amount').val($('#budget').val().replace(/\D/g, ""));
                console.log($('#budget').val().replace(/\D/g, ""));
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

     @include('backend.include.alert.toastr')
@endpush
