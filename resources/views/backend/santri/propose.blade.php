@extends('layouts/main')

@section('title')
    <title>SMKK | Pendaftaran Santri</title>
@endsection

@section('page_name')
    <h1>Pendaftaran Santri</h1>
@endsection

@section('breadcrumb')
    {{-- Custom helpers, cek app/Helpers/helpers.php dan composer.json di bagian file jalankan composer dump-autoload utk memakainya --}}
    {!!
        breadcrumb([
            'Pendaftaran Santri' => 'Pendaftaran Santri'
        ])
    !!}
@endsection

@section('content')
   <div class="card card-primary">
        <div class="card-header">
            <h5 class="card-title">Pendaftaran Santri</h5>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <a type="button" class="btn btn-success btn-sm" href="{{ route("santri.create") }}"> <i class="fa fa-plus"></i> Ajukan Santri</a>
            <table id="example1" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                <thead>
                    <tr role="row">
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">Nama Santri</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Sekolah</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Kelas</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Jenis Kelamin</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Biaya Pendaftaran (Rp)</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Status</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($santries as $santri)
                        <tr class="">
                            <td class="dtr-control sorting_1 text-center" tabindex="0">{{ $santri->santri_name }}</td>
                            <td class="dtr-control sorting_1 text-center">{{ $santri->school_name }}</td>
                            <td class="dtr-control sorting_1 text-center">{{ $santri->school_grade }}</td>
                            <td class="dtr-control sorting_1 text-center">{{ genderStatus($santri->sex) }}</td>
                            <td class="dtr-control sorting_1 text-center">
                                {{ balanceFormat($santri->regist_fee)}}
                            </td>
                            <td class="dtr-control sorting_1 text-center">{{ submissionStatus($santri->submission_status) }}</td>
                            <td class="text-center">
                                <a class='btn btn-primary' href="{{route('santri.show', [$santri->id])}}">Detail</a>
                                <a class='btn btn-warning' href="{{route('santri.edit', [$santri->id])}}">Edit</a>
                                <form action="{{route('santri.destroy', [$santri->id])}}" method="post" style="display: inline">
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
