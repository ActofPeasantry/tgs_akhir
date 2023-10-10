@extends('layouts/main')

@section('title')
    <title>SMKK | Lihat Periode Santri</title>
@endsection

@section('page_name')
    <h1>Lihat Periode Santri</h1>
@endsection

@section('breadcrumb')
    {{-- Custom helpers, cek app/Helpers/helpers.php dan composer.json di bagian file jalankan composer dump-autoload utk memakainya --}}
    {!!
        breadcrumb([
            'Lihat Periode Pendaftaran' => 'Lihat Periode Pendaftaran'
        ])
    !!}
@endsection

@section('content')
   <div class="card card-primary">
        <div class="card-header">
            <h5 class="card-title">Lihat Periode Santri</h5>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <a type="button" class="btn btn-success btn-sm" href="{{ route("tpq_period.create") }}"> <i class="fa fa-plus"></i> Tambah Periode</a>
            <table id="example1" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                <thead>
                    <tr role="row">
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">Nama Periode</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Tanggal Mulai</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Tanggal Selesai</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($periods as $period)
                        <tr class="">
                            <td class="dtr-control sorting_1 text-center" tabindex="0">{{ $period->name }}</td>
                            <td class="dtr-control sorting_1 text-center">{{ $period->start_date->translatedFormat('d F Y') }}</td>
                            <td class="dtr-control sorting_1 text-center">{{ $period->end_date->translatedFormat('d F Y') }}</td>
                            <td class="text-center">
                                <a class='btn btn-warning' href="{{route('tpq_period.edit', [$period->id])}}">Edit</a>
                                <form action="{{route('tpq_period.destroy', [$period->id])}}" method="post" style="display: inline">
                                    {{method_field('DELETE')}}
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button class="btn btn-danger show_confirm" data-toggle="tooltip">Delete</button>
                                    {{-- <button onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger" type="submit">Delete</button> --}}
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
     @include('backend.include.alert.toastr')
     @include('backend.include.alert.swalert')
@endpush
