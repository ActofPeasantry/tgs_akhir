@extends('layouts/main')

@section('title')
    <title>SMKK | Debet&Kredit</title>
@endsection

@section('page_name')
    <h1>Kategori Aktivitas</h1>
@endsection

@section('breadcrumb')
    {{-- Custom helpers, cek app/Helpers/helpers.php dan composer.json di bagian file jalankan composer dump-autoload utk memakainya --}}
    {!!
        breadcrumb([
            'Aktivitas' => 'Aktivitas'
        ])
    !!}
@endsection

@section('content')
   <div class="card col-md-10">
        <div class="card-header">
            <h5 class="card-title">Ubah Data</h5>
        </div>
        <div class="card-body">
            <div class="container-fluid">
                <form method="POST" action="{{ route('activity_categories.update', $ac_category->id) }}">
                @csrf
                @method("PATCH")
                    @include('backend.include.activity_categories_form')
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
