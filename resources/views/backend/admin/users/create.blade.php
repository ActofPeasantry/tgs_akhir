@extends('layouts/main')

@section('title')
    <title>SMKK | Pengelolaan Pengguna</title>
@endsection

@section('page_name')
    <h1>Kelola pengguna</h1>
@endsection

@section('breadcrumb')
    {{-- Custom helpers, cek app/Helpers/helpers.php dan composer.json di bagian file jalankan composer dump-autoload utk memakainya --}}
    {!!
        breadcrumb([
            'Kelola pengguna' => 'Kelola pengguna'
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
                 <form action="{{ route("admin.user.store") }}" method="POST">
                 @csrf
                     @include('backend.include.user_form')
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
