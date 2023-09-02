@extends('layouts/main')

@section('title')
    <title>SMKK | Kegiatan Masjid</title>
@endsection

@section('page_name')
    <h1>Kegiatan Masjid</h1>
@endsection

@section('breadcrumb')
    {{-- Custom helpers, cek app/Helpers/helpers.php dan composer.json di bagian file jalankan composer dump-autoload utk memakainya --}}
    {!!
        breadcrumb([
            'Kegiatan Masjid' => 'Kegiatan Masjid'
        ])
    !!}
@endsection

@section('content')
    <div class="card">
        <div class="card-box">
            <form action="{{ route("activity.search") }}" method="POST">
            @csrf
            <div class="text-center mt-5">
                <div class="form-group">
                    <div class="row">
                        <h5 class="col-2 mt-1">Pilih Data</h5>
                        <div class="col-4 ">
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Bulan</span>
                                </div>
                                <select class="custom-select" name="month[]" id="month">
                                    @foreach ( monthNameArray() as $value => $month_name)
                                        <option value="{{ $value }}" {{ $month == $value ? 'selected' : ''}} >{{ $month_name }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Tahun</span>
                                </div>
                                <select class="custom-select" name="year[]" id="year">
                                    @foreach ($years as $year_list => $value)
                                        <option value="{{ $value }}" {{ $value == $year ? 'selected' : ''}} >{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="input-group">
                                <button id="search_button" name="search_button" class="btn btn-primary btn-sm waves-effect waves-light btn">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>

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
            <table id="example1" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                <thead>
                    <tr role="row">
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">Nama Kegiatan</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Kategori Kegiatan</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Tanggal Mulai</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Tanggal Selesai</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Status Kegiatan</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($activities as $activity)
                        @if ($activity->submission_status == 1)
                            <tr class="">
                                <td class="dtr-control sorting_1 text-center" tabindex="0">
                                    {{ $activity->activity_name }} <br>
                                </td>
                                <td class="dtr-control sorting_1 text-center">{{ $activity->activityCategory->category_name }}</td>
                                <td class="dtr-control sorting_1 text-center">
                                    {{ $activity->schedule_start->translatedFormat('d F Y') }} <br>
                                    {{ $activity->schedule_start->format('H:i') }}
                                </td>
                                <td class="dtr-control sorting_1 text-center">
                                    {{ $activity->schedule_end->translatedFormat('d F Y') }} <br>
                                    {{ $activity->schedule_end->translatedFormat('H:i') }}
                                </td>
                                <td class="dtr-control sorting_1 text-center">
                                    {{ activityStatus($activity->status) }}
                                </td>
                                <td class="text-center">
                                    <a class='btn btn-primary' href="{{route('activity.show', [$activity->id])}}">Detail</a>
                                    <a class='btn btn-warning' href="{{route('activity.edit', [$activity->id])}}">Edit</a>
                                    {{-- <a class='btn btn-danger' href="{{route('activity.cancel', [$activity->id])}}">Batalkan</a> --}}
                                    <form action="{{route('activity.cancel', [$activity->id])}}" method="post" style="display: inline">
                                        {{method_field('PATCH')}}
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button class="btn btn-danger show_confirm" data-toggle="tooltip">Batalkan</button>
                                    </form>
                                </td>
                            </tr>
                        @endif
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
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
                "order": [2,'desc']
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
    <script>
        function search(){
            var month = $('#month').val();
            var year = $('#year').val();
            $.ajax({
                type: "Get",
                url: "{{ url('activity/search') }}",
                data: "month" +month
            })
        }
    </script>
    @include('backend.include.alert.toastr')
    @include('backend.include.alert.swalert')
@endpush
