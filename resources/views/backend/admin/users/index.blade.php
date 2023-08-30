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
   <div class="card card-primary">
        <div class="card-header">
            <h5 class="card-title">Daftar Pengguna</h5>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                <thead>
                    <tr role="row">
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" aria-sort="ascending">#id</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Username</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Email</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Role</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <a type="button" class="btn btn-success btn-sm" href="{{ route("admin.user.create") }}"> <i class="fa fa-plus"></i> Tambah Pengguna</a> <br>
                    @foreach ($users as $user)
                        <tr class="">
                            <td>{{ $user->id}}</td>
                            <td>{{ $user->name}}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                            @foreach ( $user->userRoles as $userRoles)
                                @if ($userRoles->role_id ==  config('constants.user_role.admin'))
                                    <span class="badge badge-primary">{{$user->callRoleName($userRoles->role_id)}}</span>
                                @elseif ($userRoles->role_id ==  config('constants.user_role.pengurus'))
                                    <span class="badge badge-info">{{$user->callRoleName($userRoles->role_id)}}</span>
                                @elseif ($userRoles->role_id ==  config('constants.user_role.jamaah'))
                                    <span class="badge badge-success">{{$user->callRoleName($userRoles->role_id)}}</span>
                                @elseif ($userRoles->role_id ==  config('constants.user_role.bendahara'))
                                    <span class="badge badge-warning">{{$user->callRoleName($userRoles->role_id)}}</span>
                                @endif
                            @endforeach
                            </td>
                            <td class="text-center">
                                <a class='btn btn-warning' href="{{route('admin.user.edit', [$user->id])}}">Edit</a>
                                <form action="{{ route('admin.user.destroy', [$user->id]) }}" method="post" style="display: inline">
                                    {{method_field('DELETE')}}
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button class="btn btn-danger show_confirm" data-toggle="tooltip">Delete</button>
                                    {{-- <button onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger" type="submit">Delete</button> --}}
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    {{-- <tr><th rowspan="1" colspan="1">Rendering engine</th><th rowspan="1" colspan="1">Browser</th><th rowspan="1" colspan="1">Platform(s)</th><th rowspan="1" colspan="1">Engine version</th><th rowspan="1" colspan="1">CSS grade</th></tr> --}}
                </tfoot>
              </table>
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
     @include('backend.include.alert.toastr')
     @include('backend.include.alert.swalert')
@endpush
