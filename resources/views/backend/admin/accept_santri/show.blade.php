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
                    <p>{{ $santri->santri_name }}</p>
                </div>

                <div class="form-group col-mb-3">
                    <label class="form-label" for="birth_place">Tempat / Tanggal Lahir</label>
                    <p>{{ $santri->birth_place }}, {{ $santri->birth_date }}</p>
                </div>

                <div class="form-group col-mb-3">
                    <label class="form-label" for="sex">Jenis Kelamin</label>
                    <p>{{ genderStatus($santri->sex) }}</p>
                </div>

                <div class="form-group col-mb-3">
                    <label class="form-label" for="telp_number">Nomor Telepon</label>
                    <p>{{ splitPhoneNumber($santri->telp_number) }}</p>
                </div>

                <div class="form-group col-mb-3">
                    <label class="form-label" for="address">Alamat</label>
                    <p>{{ $santri->address }}</p>
                </div>

                {{-- <h4>Nama Orang Tua</h4> --}}

                <div class="form-group col-mb-3">
                    <div class="row">
                        <div class="col-2">
                            <label class="form-label" for="father_name">Nama Ayah</label>
                            <p>{{ $santri->father_name }}</p>
                        </div>
                        <div class="col-2">
                            <label class="form-label" for="mother_name">Nama Ibu</label>
                            <p>{{ $santri->mother_name }}</p>
                        </div>
                    </div>
                </div>

                <div class="form-group col-mb-3">
                    <div class="row">
                        <div class="col-2">
                            <label class="form-label" for="school_name">Nama Sekolah</label>
                            <p>{{ $santri->school_name }}</p>
                        </div>
                        <div class="col-2">
                            <label class="form-label" for="school_grade">Kelas</label>
                            <p>{{ $santri->school_grade }}</p>
                        </div>
                    </div>
                </div>

                <div class="form-group col-mb-3">
                    <label class="form-label" for="photo">Foto Santri</label> <br>
                    <img src="{{ $santri->photo }}" alt="">
                </div>

                <div class="form-group col-mb-3">
                    <label class="form-label" for="submission_status">Status</label>
                    <p>{{ submissionStatus($santri->submission_status) }}</p>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <form action="{{route('admin.accept_santri.accept', [$santri->id])}}" method="post" style="display: inline">
                @csrf {{method_field('PATCH')}}
                <button onclick="return confirm('Apakah anda yakin?')" class="btn btn-success" type="submit">Terima</button>
            </form>
            <form action="{{route('admin.accept_santri.deny', [$santri->id])}}" method="post" style="display: inline">
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
