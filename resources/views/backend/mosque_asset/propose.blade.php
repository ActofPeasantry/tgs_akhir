@extends('layouts/main')

@section('title')
    <title>SMKK | Mengajukan Aset</title>
@endsection

@section('page_name')
    <h1>Mengajukan Aset Masjid</h1>
@endsection

@section('breadcrumb')
    {{-- Custom helpers, cek app/Helpers/helpers.php dan composer.json di bagian file jalankan composer dump-autoload utk memakainya --}}
    {!!
        breadcrumb([
            'Mengajukan Aset' => 'Mengajukan Aset'
        ])
    !!}
@endsection

@section('content')
   <div class="card card-primary">
        <div class="card-header">
            <h5 class="card-title">Daftar Aset</h5>
        </div>
        <div class="card-body">
            <a type="button" class="btn btn-success btn-sm" href="{{ route("asset.create") }}"> <i class="fa fa-plus"></i> Ajukan Aset</a>
            <table id="example1" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                <thead>
                    <tr role="row">
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">Nama Aset</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Kategori Aset</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Jumlah Aset</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Status Aset</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($assets as $asset)
                        <tr class="">
                            <td class="dtr-control sorting_1 text-center" tabindex="0">
                                {{ $asset->asset_name }} <br>
                            </td>
                            <td class="dtr-control sorting_1 text-center">{{ $asset->AssetCategory->category_name }}</td>
                            <td class="dtr-control sorting_1 text-center">{{ $asset->totalAsset($asset->id) }}</td>
                            <td class="dtr-control sorting_1 text-center">{{ submissionStatus($asset->submission_status) }}</td>

                            <td class="text-center">
                                <a class='btn btn-primary' href="{{route('asset.show', [$asset->id])}}">Detail</a>
                                <a class='btn btn-warning' href="{{route('asset.edit', [$asset->id])}}">Edit</a>
                                <form action="{{route('asset.destroy', [$asset->id])}}" method="post" style="display: inline">
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
@endsection

@push('child-scripts')
    <script>
        $(function(){
            $('#example1').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endpush
