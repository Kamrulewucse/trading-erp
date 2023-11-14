@extends('layouts.app')
@section('title','Bank Account')
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
                    <a href="{{ route('bank_account.add') }}" class="btn btn-primary bg-gradient-primary">Add Bank Account</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive-sm">
                        <table id="table" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>SN</th>
                                <th>Account Name</th>
                                <th>Account No.</th>
                                <th>Bank</th>
                                <th>Branch</th>
                                <th>Code</th>
                                <th>Description</th>
                                <th>Opening Balance</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($accounts as $account)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $account->account_name }}</td>
                                    <td>{{ $account->account_no }}</td>
                                    <td>{{ $account->bank->name }}</td>
                                    <td>{{ $account->branch->name }}</td>
                                    <td>{{ $account->account_code }}</td>
                                    <td>{{ $account->description }}</td>
                                    <td>৳{{ number_format($account->opening_balance, 2) }}</td>
                                    <td>
                                        @if ($account->status == 1)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-success btn-sm btn-edit" href="{{ route('bank_account.edit', ['account' => $account->id]) }}"><i class="fa fa-edit"></i></a>
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
