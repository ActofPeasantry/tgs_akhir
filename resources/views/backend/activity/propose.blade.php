@extends('layouts/main')

@section('title')
    <title>SMKK | Mengajukan Kegiatan Masjid</title>
@endsection

@section('page_name')
    <h1>Mengajukan Kegiatan Masjid</h1>
@endsection

@section('breadcrumb')
    {{-- Custom helpers, cek app/Helpers/helpers.php dan composer.json di bagian file jalankan composer dump-autoload utk memakainya --}}
    {!!
        breadcrumb([
            'Mengajukan Kegiatan Masjid' => 'Mengajukan Kegiatan Masjid'
        ])
    !!}
@endsection

@section('content')
    <!-- Main content -->
    <div class="card card-primary">
        <div class="card-header">
            <h5 class="card-title">Daftar Kegiatan</h5>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <a type="button" class="btn btn-success btn-sm" href="{{ route("activity.create") }}"> <i class="fa fa-plus"></i> Ajukan Kegiatan</a>
            <table id="example1" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                <thead>
                    <tr role="row">
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">Nama Kegiatan</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Kategori Kegiatan</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Tanggal Mulai</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Tanggal Selesai</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Status</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($activities as $activity)
                        <tr class="">
                            <td class="dtr-control sorting_1 text-center" tabindex="0">
                                {{ $activity->activity_name }} <br>
                            </td>
                            <td class="dtr-control sorting_1 text-center">{{ $activity->activityCategory->category_name }}</td>
                            <td class="dtr-control sorting_1 text-center">{{ $activity->schedule_start }}</td>
                            <td class="dtr-control sorting_1 text-center">{{ $activity->schedule_end }}</td>
                            <td class="dtr-control sorting_1 text-center">{{ SubmissionStatus($activity->submission_status) }}</td>
                            <td class="text-center">
                                <a class='btn btn-primary' href="{{route('activity.show', [$activity->id])}}">Detail</a>
                                <a class='btn btn-warning' href="{{route('activity.edit', [$activity->id])}}">Edit</a>
                                <form action="{{route('activity.destroy', [$activity->id])}}" method="post" style="display: inline">
                                    {{method_field('DELETE')}}
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
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
