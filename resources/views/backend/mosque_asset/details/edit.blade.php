@extends('layouts/main')

@section('title')
    <title>SMKK | Debet&Kredit</title>
@endsection

@section('page_name')
    <h1>Aset Masjid</h1>
@endsection

@section('breadcrumb')
    {{-- Custom helpers, cek app/Helpers/helpers.php dan composer.json di bagian file jalankan composer dump-autoload utk memakainya --}}
    {!!
        breadcrumb([
            'Aset Masjid' => route('asset.index'),
            'Detail Aset' => route('asset.show', $as_detail->asset_id),
            'Ubah Aset' => 'Detail Aset'
        ])
    !!}
@endsection

@section('content')
<div class="card card-primary col-md-10">
    <div class="card-header">
        <h5 class="card-title">Ubah Data</h5>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <form action="{{ route("asset_detail.update", $as_detail->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PATCH")
                @include('backend.include.asset_details_form')
            </form>
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
