@extends('layouts/main')

@section('title')
    <title>SMKK | Debet&Kredit</title>
@endsection

@section('page_name')
    <h1>Debet & Kredit</h1>
@endsection

@section('breadcrumb')
    {{-- Custom helpers, cek app/Helpers/helpers.php dan composer.json di bagian file jalankan composer dump-autoload utk memakainya --}}
    {!!
        breadcrumb([
            'Debet & Kredit' => 'Debet & Kredit'
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
                        <h5 class="col-2 mt-1">Pilih Data</h5>
                        <div class="col-4 ">
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Bulan</span>
                                </div>
                                <select class="custom-select" name="month[]" id="month">
                                    @foreach ( monthNameArray() as $value => $month)
                                        <option value="{{ $value }}">{{ $month }}</option>
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
                                    @foreach ($years as $value)
                                        <option value="{{ $value }}">{{ $value }}</option>
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
                            <h3 class="m-b-10 text-success"><b>{{ $sum_debit }}</b></h3>
                            <p class="text-uppercase m-b-5 font-13 font-600">Total Debet</p>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-4">
                        <div class="m-t-20 m-b-20">
                           <h3 class="m-b-10 text-danger"><b>{{ $sum_credit }}</b></h3>
                            <p class="text-uppercase m-b-5 font-13 font-600">Total Kredit</p>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-4">
                        <div class="m-t-20 m-b-20">
                            <h3 class="m-b-10 text-primary"><b>{{ $total_sum }}</b></h3>
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
            <table id="example1" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                <thead>
                    <tr role="row">
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">Tgl Input</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">No. Invoice</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Keterangan</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Kategori</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Tanggal Diterima</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Debet (Rp)</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">kredit (Rp)</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Saldo (Rp)</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($balances as $balance)
                        <tr class="">
                            <td class="dtr-control sorting_1 text-center" tabindex="0">
                                {{ $balance->created_at->format('d F Y') }} <br>
                                {{ $balance->created_at->format('H:i:s') }}
                            </td>
                            <td>{{ $balance->no_invoice }}</td>
                            <td>{{ $balance->description }}</td>
                            <td>{{ $balance->BalanceCategories->category_name }}</td>
                            <td>{{ $balance->date_received->format('d F Y') }}</td>
                            @if ($balance->debit_credit == 0)
                                <td>{{ $balance->total_amount }}</td>
                                <td>0</td>
                                <td>{{ $balance->total_amount }}</td>
                            @else
                                <td>0</td>
                                <td>{{ $balance->total_amount }}</td>
                                <td>-{{ $balance->total_amount }}</td>
                            @endif
                            <td class="text-center">
                                <a class='btn btn-warning' href="{{route('balance.edit', [$balance->id])}}">Edit</a>
                                <form action="{{route('balance.destroy', [$balance->id])}}" method="post" style="display: inline">
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
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
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
@endpush
