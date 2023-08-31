@extends('layouts/main')

@section('title')
    <title>SMKK | Laporan Keuangan</title>
@endsection

@section('page_name')
    <h1>Laporan Keuangan</h1>
@endsection

@section('breadcrumb')
    {{-- Custom helpers, cek app/Helpers/helpers.php dan composer.json di bagian file jalankan composer dump-autoload utk memakainya --}}
    {!!
        breadcrumb([
            'Lihat Laporan Keuangan' => 'Lihat Laporan Keuangan',
        ])
    !!}
@endsection

@section('content')
    <div class="card">
        <div class="card-box">
            <form action="{{ route("balance.search") }}" method="POST">
            @csrf
            <div class="text-center mt-5">
                <div class="form-group">
                    <div class="row">
                        <h5 class="col-1 mt-1 ml-3">Pilih Data</h5>
                        <div class="col-3">
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Kategori Keuangan</span>
                                </div>
                                <select class="custom-select" name="category[]" id="category">
                                    @foreach ( $categories as $category => $value)
                                        <option value="{{ $value }}" {{ $category == $value ? 'selected' : ''}} >{{ $category }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
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
                        <div class="col-3">
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

        <div class="card-body">
            <div class="text-center">
                <div class="row">
                    <div class="col-xs-6 col-sm-4">
                        <div class="m-t-20 m-b-20">
                            <h3 class="m-b-10 text-success"><b>{{ balanceFormat($sum_debit) }}</b></h3>
                            <p class="text-uppercase m-b-5 font-13 font-600">Total Debet</p>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-4">
                        <div class="m-t-20 m-b-20">
                           <h3 class="m-b-10 text-danger"><b>{{ balanceFormat($sum_credit) }}</b></h3>
                            <p class="text-uppercase m-b-5 font-13 font-600">Total Kredit</p>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-4">
                        <div class="m-t-20 m-b-20">
                            <h3 class="m-b-10 text-primary"><b>{{ balanceFormat($total_sum) }}</b></h3>
                            <p class="text-uppercase m-b-5 font-13 font-600">Sisa Saldo</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   <div class="card card-primary">
        <div class="card-header">
            <h5 class="card-title">Daftar Pembukuan</h5>
        </div>
        <div class="card-body">
            <a type="button" class="btn btn-success btn-sm" href="{{ route("balance.create") }}"> <i class="fa fa-plus"></i> Tambah Laporan Keuangan</a>
            <table id="example1" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                <thead>
                    <tr role="row">
                        <th  tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >Tgl Input</th>
                        <th  tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >Deskripsi</th>
                        <th  tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >Kategori</th>
                        <th  tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >No. Invoice</th>
                        <th  tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >Tanggal Diterima</th>
                        <th  tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >Debet</th>
                        <th  tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >kredit</th>
                        <th  tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >Saldo</th>
                        <th  tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($balances as $balance)
                        <tr class="">
                            <td>
                                {{ $balance->created_at->translatedFormat('d F Y') }} <br>
                                {{ $balance->created_at->format('H:i:s') }}
                            </td>
                            <td>{{ $balance->description }}</td>
                            <td>{{ $balance->BalanceCategories->category_name }}</td>
                            <td>{{ $balance->no_invoice }}</td>
                            <td>{{ $balance->date_received->translatedFormat('d F Y') }}</td>
                            @if ($balance->BalanceCategories->debit_credit == 0)
                                <td>{{ balanceFormat($balance->total_amount) }}</td>
                                <td>0</td>
                                <td> - {{ balanceFormat($balance->total_amount) }}</td>
                                @else
                                <td>0</td>
                                <td>{{ balanceFormat($balance->total_amount) }}</td>
                                <td>{{ balanceFormat($balance->total_amount) }}</td>
                            @endif
                            <td class="text-center">
                                <a class='btn btn-warning' href="{{route('balance.edit', [$balance->id])}}">Edit</a>
                                <form action="{{route('balance.destroy', [$balance->id])}}" method="post" style="display: inline">
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
                "searching": true,
                "ordering": false,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
                "bSort": false
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
    <script>
        function search(){
            var month = $('#month').val();
            var year = $('#year').val();
            $.ajax({
                type: "Get",
                url: "{{ url('balance/search') }}",
                data: "month" +month
            })
        }
    </script>
    @include('backend.include.alert.toastr')
    @include('backend.include.alert.swalert')
@endpush
