@extends('layouts/main')

@section('title')
    <title>SMKK | Debet&Kredit</title>
@endsection

@section('page_name')
    <h1>Aset Masjid</h1>
@endsection

@section('breadcrumb')
    {{-- Custom helpers, cek app/Helpers/helpers.php dan composer.json di bagian file jalankan composer dump-autoload utk memakainya --}}
    {!!
        breadcrumb([
            'Aset Masjid' => route('asset.index'),
            'Detail Aset' => 'Detail Aset'
        ])
    !!}
@endsection

@section('content')
    <div class="col-md-10">
        <div class="card card-success">
            <div class="card-header">
                <h5 class="card-title">Tambah Data</h5>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="container-fluid">
                    <form action="{{ route("asset_detail.store") }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        @include('backend.include.asset_details_form')
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-11">
        <div class="card card-primary">
            <div class="card-header">
                <h5 class="card-title">Detail Aset</h5>
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
                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">ID Aset</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Tgl Pengadaan Aset</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Foto Aset</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Kualitas Aset</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Harga Aset (Rp)</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Status</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($as_details as $as_detail)
                            <tr class="">
                                <td class="dtr-control sorting_1 text-center" tabindex="0">
                                    {{ $as_detail->id }} <br>
                                </td>
                                <td class="dtr-control sorting_1 text-center" tabindex="0">
                                    {{ $as_detail->procurement_date->translatedFormat('d F Y') }}
                                </td>
                                @if ($as_detail->photo == null)
                                    <td class="dtr-control sorting_1 text-center">Tidak ada Foto</td>
                                @else
                                    <td class="dtr-control sorting_1 text-center">
                                        <img src="{{ $as_detail->photo }}" alt="" width="200" height="200">
                                    </td>
                                @endif
                                <td class="dtr-control sorting_1 text-center">{{ $as_detail->qualityText($as_detail->quality) }}</td>
                                <td class="dtr-control sorting_1 text-center">{{ balanceFormat($as_detail->budget) }}</td>
                                <td class="dtr-control sorting_1 text-center" tabindex="0">
                                    {{ submissionStatus($as_detail->submission_status) }}
                                </td>
                                <td class="text-center">
                                    {{-- <a class='btn btn-primary' href="{{route('asset_detail.show', [$as_detail->id])}}">Detail</a> --}}
                                    <a class='btn btn-warning' href="{{route('asset_detail.edit', [$as_detail->id])}}">Edit</a>
                                    <form action="{{route('asset_detail.destroy', [$as_detail->id])}}" method="post" style="display: inline">
                                        {{method_field('DELETE')}}
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        {{-- <tr><th rowspan="1" colspan="1">Rendering engine</th><th rowspan="1" colspan="1">Browser</th><th rowspan="1" colspan="1">Platform(s)</th><th rowspan="1" colspan="1">Engine version</th><th rowspan="1" colspan="1">CSS grade</th></tr> --}}
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('child-scripts')
    <script type="text/javascript">
        $(function () {
            $('#dtp_procurement_date').datetimepicker({format:'DD-MM-YYYY', locale:'id'});
        });
    </script>

    <script>
        $(function(){
            $('#example1').DataTable({
                "paging": true,
                "pageLength": 10,
                "lengthChange": false,
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
        $(function () {
            bsCustomFileInput.init();
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
