@extends('layouts.app')
@section('title','Bank')
@section('style')
    <style>
        table.table-bordered.dataTable th, table.table-bordered.dataTable td {
            text-align: center;
            vertical-align: middle;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <a href="{{ route('bank.add') }}" class="btn btn-primary bg-gradient-primary">Add Bank</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive-sm">
                        <table id="table" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>SN</th>
                                <th data-orderable="false">Bank Name</th>
                                <th data-orderable="false">Status</th>
                                <th data-orderable="false">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($banks as $bank)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $bank->name }}</td>
                                    <td>
                                        @if ($bank->status == 1)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-success btn-sm btn-edit" href="{{ route('bank.edit', ['bank' => $bank->id]) }}"><i class="fa fa-edit"></i></a>
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
    <script>
        $(function () {
            $('#table').DataTable();
        })
    </script>
@endsection
