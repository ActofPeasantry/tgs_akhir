@extends('layouts/main')

@section('title')
    <title>SMKK | Laporan Keuangan</title>
@endsection

@section('page_name')
    <h1>Ubah Kategori Laporan Keuangan</h1>
@endsection

@section('breadcrumb')
    {{-- Custom helpers, cek app/Helpers/helpers.php dan composer.json di bagian file jalankan composer dump-autoload utk memakainya --}}
    {!!
        breadcrumb([
            'Kategori Laporan Keuangan' => route('balance_categories.index'),
            'Ubah Kategori Laporan Keuangan' => 'Ubah Kategori Laporan Keuangan'
        ])
    !!}
@endsection

@section('content')
<div class="col-md-10">
    <div class="card card-primary">
         <div class="card-header">
             <h5 class="card-title">Ubah Data</h5>
         </div>
         <div class="card-body">
             <div class="container-fluid">
                 <form method="POST" action="{{ route('balance_categories.update', $b_category->id) }}">
                 @csrf
                 @method("PATCH")
                     @include('backend.include.balance_categories_form')
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
