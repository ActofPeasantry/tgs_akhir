@extends('layouts/main')

@section('title')
    <title>SMKK | Debet&Kredit</title>
@endsection

@section('page_name')
    <h1>Ubah Santri</h1>
@endsection

@section('breadcrumb')
    {{-- Custom helpers, cek app/Helpers/helpers.php dan composer.json di bagian file jalankan composer dump-autoload utk memakainya --}}
    {!!
        breadcrumb([
            'Pendaftaran Santri' => route('santri.index'),
            'Ubah Data Santri' => 'Ubah Data Santri'
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
                        <form action="{{ route("santri.update",[$santri->id]) }}" method="POST" enctype="multipart/form-data">
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
        // $("#telp_number").on({
        //     keyup: function () {
        //         $('#hidden_telp_number').val($('#telp_number').val().replace(/\D/g, ""));
        //         console.log($('#telp_number').val().replace(/\D/g, ""));
        //     }
        // });
    </script>
    <script>
        $(function () {
            bsCustomFileInput.init();
        });
    </script>
@endpush
