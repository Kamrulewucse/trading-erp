@extends('layouts.app')

@section('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('themes/backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('title')
    Users
@endsection

@section('content')
    @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ Session::get('message') }}
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <a href="{{ route('user.add') }}" class="btn btn-primary bg-gradient-primary">Add User</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive-sm">
                    <table id="table" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>SN</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Warehouse Name</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->warehouse->name ?? 'Super Admin' }}</td>
                                <td>
                                    @if($user->role == 1)
                                          Super Admin
                                    @elseif($user->role == 2)
                                        Warehouse
                                    @else
                                    @endif
                                </td>
{{--                                <td>--}}
{{--                                    @if($user->company_type == 1)--}}
{{--                                        Kent Company--}}
{{--                                    @elseif($user->company_type == 2)--}}
{{--                                    Care Company--}}
{{--                                    @else--}}
{{--                                    @endif--}}
{{--                                </td>--}}
                                <td>
                                    <a class="btn btn-info btn-sm" href="{{ route('user.edit', ['user' => $user->id]) }}">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- DataTables -->
    <script src="{{ asset('themes/backend/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('themes/backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

    <script>
        $(function () {
            $('#table').DataTable();
        })
    </script>
@endsection
