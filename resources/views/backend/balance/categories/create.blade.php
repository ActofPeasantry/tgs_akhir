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
   <div class="card col-md-10">
        <div class="card-header">
            <h5 class="card-title">Tambah Data</h5>
        </div>
        <div class="card-body">
            <div class="container-fluid">
                <form action="{{ route("balance_categories.store") }}" method="POST">
                @csrf
                    @include('backend.include.balance_categories_form')
                </form>
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
