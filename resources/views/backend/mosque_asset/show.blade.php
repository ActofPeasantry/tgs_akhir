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
<div class="card col-md-10">
    <div class="card-header">
        <h5>Tambah Data</h5>
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

   <div class="card col-md-10">
        <div class="card-header">
            <h5>Detail Aset</h5>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                <thead>
                    <tr role="row">
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">ID Aset</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Foto Aset</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Kualitas Aset</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Opsi</th>
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

                            <td class="text-center">
                                <a class='btn btn-primary' href="{{route('asset_detail.show', [$as_detail->id])}}">Detail</a>
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
