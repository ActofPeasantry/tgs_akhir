@extends('layouts/main')

@section('title')
    <title>SMKK | Debet&Kredit</title>
@endsection

@section('page_name')
    <h1>Kategori Kegiatan Masjid</h1>
@endsection

@section('breadcrumb')
    {{-- Custom helpers, cek app/Helpers/helpers.php dan composer.json di bagian file jalankan composer dump-autoload utk memakainya --}}
    {!!
        breadcrumb([
            'Kategori Kegiatan Masjid' => ' Kategori Kegiatan Masjid'
        ])
    !!}
@endsection

@section('content')
   <div class="card card-primary">
        <div class="card-header">
            <h5 class="card-title">Daftar kategori</h5>
        </div>
        <div class="card-body">
            <a type="button" class="btn btn-success btn-sm" href="{{ route("activity_categories.create") }}"> <i class="fa fa-plus"></i> Tambah Kategori</a>
            <table id="example1" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                <thead>
                    <tr role="row">
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">Nama Kategori</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ac_categories as $ac_category)
                        <tr class="">
                            <td>{{ $ac_category->category_name }}</td>
                            <td class="text-center">
                                <a class='btn btn-warning' href="{{route('activity_categories.edit', [$ac_category->id])}}">Edit</a>
                                <form action="{{route('activity_categories.destroy', [$ac_category->id])}}" method="post" style="display: inline">
                                    {{method_field('DELETE')}}
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button class="btn btn-danger show_confirm_category" data-toggle="tooltip">Delete</button>
                                    {{-- <button onclick="return confirm('Menghapus kategori akan menghapus data kegiatan pada kategori tersebut. Apakah anda yakin?')" class="btn btn-danger" type="submit">Delete</button> --}}
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
    @include('backend.include.alert.toastr')
    @include('backend.include.alert.swalert')
@endpush
