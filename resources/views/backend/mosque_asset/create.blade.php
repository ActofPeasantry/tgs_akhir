@extends('layouts/main')

@section('title')
    <title>SMKK | Debet&Kredit</title>
@endsection

@section('page_name')
    <h1>Tambah Aset Masjid</h1>
@endsection

@section('breadcrumb')
    {{-- Custom helpers, cek app/Helpers/helpers.php dan composer.json di bagian file jalankan composer dump-autoload utk memakainya --}}
    {!!
        breadcrumb([
            'Mengajukan Aset' => route('asset.propose'),
            'Tambah Aset' => 'Tambah Aset'
        ])
    !!}
@endsection

@section('content')
    <div class="col-md-10">
        <div class="card card-primary">
            <div class="card-header">
                <h5 class="card-title">Tambah Data</h5>
            </div>
            <div class="card-body">
                <div class="container-fluid">
                    <form action="{{ route("asset.store") }}" method="POST">
                    @csrf
                        @include('backend.include.asset_form')
                    </form>
                </div>
            </div>
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
