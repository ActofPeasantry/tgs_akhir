@extends('layouts/main')

@section('title')
    <title>Detail Pendaftar</title>
@endsection

@section('page_name')
    <h1>Detail Pendaftar</h1>
@endsection

@section('breadcrumb')
    {{-- Custom helpers, cek app/Helpers/helpers.php dan composer.json di bagian file jalankan composer dump-autoload utk memakainya --}}
    {!!
        breadcrumb([
            'Menerima Santri' => route('admin.accept_santri.index'),
            'Detail Pendaftaran' => 'Detail Pendaftar'
        ])
    !!}
@endsection

@section('content')
<div class="col-md-10">
    <div class="card card-primary">
        <div class="card-header">
            <h5 class="card-title" >Ubah Data</h5>
        </div>
        <div class="card-body">
            <div class="container-fluid">
                <div class="form-group col-mb-3">
                    <label class="form-label" for="santri_name">Nama Santri</label>
                    <p>{{ $regist->santris->santri_name }}</p>
                </div>

                <div class="form-group col-mb-3">
                    <label class="form-label" for="birth_place">Tempat / Tanggal Lahir</label>
                    <p>{{ $regist->santris->birth_place }}, {{ $regist->Santris->birth_date->translatedFormat('d F Y')}}</p>
                </div>

                <div class="form-group col-mb-3">
                    <label class="form-label" for="sex">Jenis Kelamin</label>
                    <p>{{ genderStatus($regist->Santris->sex) }}</p>
                </div>

                <div class="form-group col-mb-3">
                    <label class="form-label" for="telp_number">Nomor Telepon</label>
                    <p>{{ $regist->Santris->telp_number }}</p>
                </div>

                <div class="form-group col-mb-3">
                    <label class="form-label" for="address">Alamat</label>
                    <p>{{ $regist->Santris->address }}</p>
                </div>

                <div class="form-group col-mb-3">
                    <div class="row">
                        <div class="col-2">
                            <label class="form-label" for="father_name">Nama Ayah</label>
                            <p>{{ $regist->Santris->father_name }}</p>
                        </div>
                        <div class="col-2">
                            <label class="form-label" for="mother_name">Nama Ibu</label>
                            <p>{{ $regist->Santris->mother_name }}</p>
                        </div>
                    </div>
                </div>

                <div class="form-group col-mb-3">
                    <div class="row">
                        <div class="col-2">
                            <label class="form-label" for="school_name">Nama Sekolah</label>
                            <p>{{ $regist->Santris->school_name }}</p>
                        </div>
                        <div class="col-2">
                            <label class="form-label" for="school_grade">Kelas</label>
                            <p>{{ $regist->Santris->school_grade }}</p>
                        </div>
                    </div>
                </div>

                <div class="form-group col-mb-3">
                    <label class="form-label" for="photo">Foto Santri</label> <br>
                    @if ($regist->Santris->photo == null)
                        <p>Tidak Ada Foto</p>
                    @else
                        <img src="{{ $regist->Santris->photo }}" alt="" width="100px" height="100px">
                    @endif
                </div>

                <div class="form-group col-mb-3">
                    <label class="form-label" for="submission_status">Status</label>
                    <p>{{ submissionStatus($regist->santris->submission_status) }}</p>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <form action="{{route('admin.accept_santri.accept', [$regist->id])}}" method="post" style="display: inline">
                @csrf {{method_field('PATCH')}}
                <button onclick="return confirm('Apakah anda yakin?')" class="btn btn-success" type="submit">Terima</button>
            </form>
            <form action="{{route('admin.accept_santri.deny', [$regist->id])}}" method="post" style="display: inline">
                @csrf {{method_field('PATCH')}}
                <button onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger" type="submit">Tolak</button>
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
