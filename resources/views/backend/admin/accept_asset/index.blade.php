@extends('layouts/main')

@section('title')
    <title>SMKK | Aset Masjid</title>
@endsection

@section('page_name')
    <h1>Menyetujui Aset Masjid</h1>
@endsection

@section('breadcrumb')
    {{-- Custom helpers, cek app/Helpers/helpers.php dan composer.json di bagian file jalankan composer dump-autoload utk memakainya --}}
    {!!
        breadcrumb([
            'Menyetujui Aset Masjid' => 'Menyetujui Aset Masjid'
        ])
    !!}
@endsection

@section('content')
<form action="{{route('admin.accept_asset.accept_checked')}}" method="post" style="display: inline">
    @csrf {{ method_field('PATCH') }}
    <div class="card card-primary">
        <div class="card-header">
            <h5 class="card-title">Daftar Aset</h5>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                <thead>
                    <tr role="row">
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">Nama Aset</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Kategori Aset</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Jumlah Aset</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Nama Pengaju</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Status</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($x_assets as $asset)
                        <tr class="">
                            <td class="dtr-control sorting_1" tabindex="0">
                                <div class="icheck-primary d-inline ml-2">
                                    <input class="asset_check" type="checkbox" id="asset_id{{ $asset->id }}" name="asset_id[]" value="{{ $asset->id }}">
                                    <label for="submission_status">{{ $asset->asset_name }}</label>
                                </div>
                            </td>
                            <td class="dtr-control sorting_1 text-center">{{ $asset->AssetCategory->category_name }}</td>
                            <td class="dtr-control sorting_1 text-center">{{ $asset->totalAsset($asset->id) }}</td>
                            <td class="dtr-control sorting_1 text-center">{{ $asset->users->name }}</td>
                            <td class="dtr-control sorting_1 text-center">{{ submissionStatus($asset->submission_status) }}</td>
                            <td class="text-center">
                                <a class='btn btn-primary' href="{{route('admin.accept_asset.show', [$asset->id])}}">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    {{-- <tr><th rowspan="1" colspan="1">Rendering engine</th><th rowspan="1" colspan="1">Browser</th><th rowspan="1" colspan="1">Platform(s)</th><th rowspan="1" colspan="1">Engine version</th><th rowspan="1" colspan="1">CSS grade</th></tr> --}}
                </tfoot>
              </table>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-2 mt-1 ml-1">
                    <input type="checkbox" id="all_asset" name="all_asset">
                    <label for="all_asset">Ceklis Seluruh Data</label>
                </div>
                <div class="col-8">
                    <button id="accept_button" class="btn btn-success check_all_button show_accept" type="submit" disabled>Terima data diceklis</button>
                    <button id="deny_button" class="btn btn-danger check_all_button show_deny" type="submit" disabled>Tolak data diceklis</button>
                    <input type="hidden" id="accept_checked" name="accept_checked" value="">
                </div>
            </div>
        </div>
    </div>
</form>

<div class="card card-success">
    <div class="card-header">
        <h5 class="card-title">Data yang Sudah Diproses</h5>
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
                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">Nama Aset</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Kategori Aset</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Jumlah Aset</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Nama Pengaju</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($y_assets as $asset)
                    <tr class="">
                        <td class="dtr-control sorting_1" tabindex="0">
                            <div class="icheck-primary d-inline ml-2">
                                <label for="submission_status">{{ $asset->asset_name }}</label>
                            </div>
                        </td>
                        <td class="dtr-control sorting_1 text-center">{{ $asset->AssetCategory->category_name }}</td>
                        <td class="dtr-control sorting_1 text-center">{{ $asset->totalAsset($asset->id) }}</td>
                        <td class="dtr-control sorting_1 text-center">{{ $asset->users->name }}</td>
                        <td class="dtr-control sorting_1 text-center">{{ submissionStatus($asset->submission_status) }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                {{-- <tr><th rowspan="1" colspan="1">Rendering engine</th><th rowspan="1" colspan="1">Browser</th><th rowspan="1" colspan="1">Platform(s)</th><th rowspan="1" colspan="1">Engine version</th><th rowspan="1" colspan="1">CSS grade</th></tr> --}}
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
        $('.show_accept').click(function() {
            $('#accept_checked').val(1);
        })
        $('.show_deny').click(function() {
            $('#accept_checked').val(2);
        })
    </script>

    <script>
        // Toggle collapse
        $('#card-collapse').CardWidget('toggle');

        function anyTrue(nodeList) {
            for (var i = 0; i < nodeList.length; i++) {
                if (nodeList[i].checked === true) return true;
            }
            return false;
        }
        function allTrue(nodeList) {
            for (var i = 0; i < nodeList.length; i++) {
                if (nodeList[i].checked === false) return false;
            }
            return true;
        }
        // alert(allTrue($('.asset_check')));

        function unlockButton(){
            $('.check_all_button').prop('disabled', true);
            if (anyTrue( $('.asset_check') )) {
                $('.check_all_button').prop('disabled', false);
            }
        }

        function checkedAllAsset(){
            $('#all_asset').prop('checked', false);
            if (allTrue( $('.asset_check') )) {
                $('#all_asset').prop('checked', true);
            }
        }

        $('.asset_check').click(function(event){
            unlockButton(); checkedAllAsset();
        });

        $('#all_asset').change(function() {
            // alert( this.value );
            if(this.checked) {
                $('.asset_check').prop('checked', true);
            }
            else{
                $('.asset_check').prop('checked', false);
            }
            $('.asset_check').click(unlockButton());
        });
    </script>
     @include('backend.include.alert.toastr')
     @include('backend.include.alert.swalert')
@endpush
