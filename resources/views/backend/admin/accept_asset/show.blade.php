@extends('layouts/main')

@section('title')
    <title>SMKK | Debet&Kredit</title>
@endsection

@section('page_name')
    <h1>Detail Aset Masjid</h1>
@endsection

@section('breadcrumb')
    {{-- Custom helpers, cek app/Helpers/helpers.php dan composer.json di bagian file jalankan composer dump-autoload utk memakainya --}}
    {!!
        breadcrumb([
            'Menyetujui Aset Masjid' => route('admin.accept_asset.index'),
            'Detail Aset' => 'Detail Aset'
        ])
    !!}
@endsection

@section('content')
    <div class="col-md-10">
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
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Foto Aset</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Kualitas Aset</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($as_details as $as_detail)
                            <tr class="">
                                <td class="dtr-control sorting_1 text-center" tabindex="0">
                                    {{ $as_detail->id }} <br>
                                </td>
                                @if ($as_detail->photo == null)
                                    <td class="dtr-control sorting_1 text-center">Tidak ada Foto</td>
                                @else
                                    <td class="dtr-control sorting_1 text-center">
                                        <img src="{{ $as_detail->photo }}" alt="Girl in a jacket" width="200" height="200">
                                    </td>
                                @endif
                                <td class="dtr-control sorting_1 text-center">{{ $as_detail->qualityText($as_detail->quality) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        {{-- <tr><th rowspan="1" colspan="1">Rendering engine</th><th rowspan="1" colspan="1">Browser</th><th rowspan="1" colspan="1">Platform(s)</th><th rowspan="1" colspan="1">Engine version</th><th rowspan="1" colspan="1">CSS grade</th></tr> --}}
                    </tfoot>
                </table>
            </div>
            <div class="card-footer">
                <form action="{{route('admin.accept_asset.accept', [$asset->id])}}" method="post" style="display: inline">
                    @csrf {{method_field('PATCH')}}
                    <button onclick="return confirm('Apakah anda yakin?')" class="btn btn-success" type="submit">Terima</button>
                </form>
                <form action="{{route('admin.accept_asset.deny', [$asset->id])}}" method="post" style="display: inline">
                    @csrf {{method_field('PATCH')}}
                    <button onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger" type="submit">Tolak</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('child-scripts')
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
            });
        });
    </script>

    <script>
        $(function () {
            bsCustomFileInput.init();
        });
    </script>
@endpush
