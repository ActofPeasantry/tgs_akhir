@extends('layouts/main')

@section('title')
    <title>SMKK | Menerima Santri</title>
@endsection

@section('page_name')
    <h1>Menerima Santri</h1>
@endsection

@section('breadcrumb')
    {{-- Custom helpers, cek app/Helpers/helpers.php dan composer.json di bagian file jalankan composer dump-autoload utk memakainya --}}
    {!!
        breadcrumb([
            'Menerima Santri' => 'Menerima Santri'
        ])
    !!}
@endsection

@section('content')
<form action="{{route('admin.accept_santri.accept_checked')}}" method="post" style="display: inline">
    @csrf {{ method_field('PATCH') }}
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
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">Nama Santri</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Sekolah</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Kelas</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Jenis Kelamin</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Nama Pengaju</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Status</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <div id="santri_checkbox_list">
                        @foreach ($x_santries as $santri)
                            <tr class="">
                                <td class="dtr-control sorting_1" tabindex="0">
                                    <div class="icheck-primary d-inline ml-2">
                                        <input class="santri_check" type="checkbox" id="santri_id_{{ $santri->id }}" name="santri_id[]" value="{{ $santri->id }}">
                                        <label for="submission_status">
                                            {{ $santri->santri_name }}
                                        </label>
                                    </div>
                                </td>
                                <td class="dtr-control sorting_1 text-center">{{ $santri->school_name }}</td>
                                <td class="dtr-control sorting_1 text-center">{{ $santri->school_grade }}</td>
                                <td class="dtr-control sorting_1 text-center">{{ genderStatus($santri->sex) }}</td>
                                <td class="dtr-control sorting_1 text-center">{{ $santri->users->name }}</td>
                                <td class="dtr-control sorting_1 text-center">{{ submissionStatus($santri->submission_status) }}</td>
                                <td class="text-center">
                                    <a class='btn btn-primary' href="{{route('admin.accept_santri.show', [$santri->id])}}">Detail</a>
                                    {{-- <a class='btn btn-success' href="{{route('admin.accept_santri.accept', [$santri->id])}}">Edit</a> --}}
                                </td>
                            </tr>
                        @endforeach
                    </div>
                </tbody>
                <tfoot>
                    {{-- <tr><th rowspan="1" colspan="1">Rendering engine</th><th rowspan="1" colspan="1">Browser</th><th rowspan="1" colspan="1">Platform(s)</th><th rowspan="1" colspan="1">Engine version</th><th rowspan="1" colspan="1">CSS grade</th></tr> --}}
                </tfoot>
            </table>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-2 mt-1 ml-1">
                    <input type="checkbox" id="all_santri" name="all_santri">
                    <label for="all_santri">Ceklis Seluruh Data</label>
                </div>
                <div class="col-8">
                    <button id="accept_checked" name="accept_checked" value="1" onclick="return confirm('Apakah anda yakin?')" class="btn btn-success check_all_button" type="submit" disabled>Terima data diceklis</button>
                    <button id="accept_checked" name="accept_checked" value="2" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger check_all_button" type="submit" disabled>Tolak data diceklis</button>
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
                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">Nama Santri</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Sekolah</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Kelas</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Jenis Kelamin</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Nama Pengaju</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Status</th>
                </tr>
            </thead>
            <tbody>
                <div id="santri_checkbox_list">
                    @foreach ($y_santries as $santri)
                        <tr class="">
                            <td class="dtr-control sorting_1" tabindex="0">
                                <div class="icheck-primary d-inline ml-2">
                                    <label for="submission_status">
                                        {{ $santri->santri_name }}
                                    </label>
                                </div>
                            </td>
                            <td class="dtr-control sorting_1 text-center">{{ $santri->school_name }}</td>
                            <td class="dtr-control sorting_1 text-center">{{ $santri->school_grade }}</td>
                            <td class="dtr-control sorting_1 text-center">{{ genderStatus($santri->sex) }}</td>
                            <td class="dtr-control sorting_1 text-center">{{ $santri->users->name }}</td>
                            <td class="dtr-control sorting_1 text-center">{{ submissionStatus($santri->submission_status) }}</td>

                        </tr>
                    @endforeach
                </div>
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
        // alert(allTrue($('.santri_check')));

        function unlockButton(){
            $('.check_all_button').prop('disabled', true);
            if (anyTrue( $('.santri_check') )) {
                $('.check_all_button').prop('disabled', false);
            }
        }

        function checkedAllSantri(){
            $('#all_santri').prop('checked', false);
            if (allTrue( $('.santri_check') )) {
                $('#all_santri').prop('checked', true);
            }
        }

        $('.santri_check').click(function(event){
            unlockButton(); checkedAllSantri();
        });

        $('#all_santri').change(function() {
            // alert( this.value );
            if(this.checked) {
                $('.santri_check').prop('checked', true);
            }
            else{
                $('.santri_check').prop('checked', false);
            }
            $('.santri_check').click(unlockButton());
        });
    </script>
     @include('backend.include.alert.toastr')
@endpush
