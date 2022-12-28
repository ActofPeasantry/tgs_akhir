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
            'Santri' => route('santri.index'),
            'Ubah Data' => 'Ubah Data'
        ])
    !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="card card-primary">
                <div class="card-header">
                    <h5 class="card-title" >Ubah Data</h5>
                </div>
                <div class="card-body">
                    <div class="container-fluid">
                        <form action="{{ route("santri.update",[$santri->id]) }}" method="POST">
                        @csrf
                        @method('PATCH')
                            @include('backend.include.santri_form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="row">
        <div class="col-12">
          <a href="#" class="btn btn-secondary">Cancel</a>
          <input type="submit" value="Create new Project" class="btn btn-success float-right">
        </div>
    </div>
    <br> --}}
@endsection

@push('child-scripts')
    <script>
        $(document).ready(function(){
            $(":input").inputmask();
        });
    </script>
    <script>
        $(function () {
            bsCustomFileInput.init();
        });
    </script>
@endpush
