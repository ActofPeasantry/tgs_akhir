@extends('layouts/main')

@section('title')
    <title>Profil User</title>
@endsection

@section('page_name')
    <h1>Profil User</h1>
@endsection

@section('breadcrumb')
    {{-- Custom helpers, cek app/Helpers/helpers.php dan composer.json di bagian file jalankan composer dump-autoload utk memakainya --}}
    {!!
        breadcrumb([
            'Pendaftaran Santri' => route('santri.index'),
            'Profil Useran' => 'Profil User'
        ])
    !!}
@endsection

@section('content')
<div class="col-md-10">
    <div class="card card-primary">
        <div class="card-header">
            <h5 class="card-title" >Data User</h5>
        </div>
        <div class="card-body">
            <div class="container-fluid">
                <div class="form-group col-mb-3">
                    <label class="form-label" for="santri_name">Nama User</label>
                    <p>{{ $user->name }}</p>
                </div>

                <div class="form-group col-mb-3">
                    <label class="form-label" for="birth_place">Email</label>
                    <p>{{ $user->email }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('child-scripts')
    <script>
        $(function () {
            bsCustomFileInput.init();
        });
    </script>
@endpush
