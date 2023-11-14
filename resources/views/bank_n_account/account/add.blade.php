@extends('layouts.app')
@section('title','Bank Account Add')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Bank Account Information</h3>
                </div>
                <form action="{{ route('bank_account.add') }}" class="form-horizontal" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row {{ $errors->has('name') ? 'has-error' :'' }}">
                            <label for="name" class="col-sm-2 col-form-label">Bank <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select class="form-control select2" style="width: 100%;" name="bank" id="bank">
                                    <option value="">Select Bank</option>
                                    @foreach($banks as $bank)
                                        <option value="{{$bank->id}}" {{ old('bank') == $bank->id ? 'selected' : '' }}>{{$bank->name}}</option>
                                    @endforeach
                                </select>

                                @error('bank')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('branch') ? 'has-error' :'' }}">
                            <label for="branch" class="col-sm-2 col-form-label">Branch <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select class="form-control select2" name="branch" id="branch">
                                    <option value="">Select Branch</option>
                                </select>

                                @error('branch')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('account_name') ? 'has-error' :'' }}">
                            <label for="account_name" class="col-sm-2 col-form-label">Account Name <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" value="{{ old('account_name') }}" name="account_name" class="form-control" id="account_name" placeholder="Enter Account Name">

                                @error('account_name')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('account_no') ? 'has-error' :'' }}">
                            <label for="account_no" class="col-sm-2 col-form-label">Account No <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" value="{{ old('account_no') }}" name="account_no" class="form-control" id="account_no" placeholder="Enter Account No">

                                @error('account_no')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('account_code') ? 'has-error' :'' }}">
                            <label for="account_code" class="col-sm-2 col-form-label">Account Code</label>
                            <div class="col-sm-10">
                                <input type="text" value="{{ old('account_code') }}" name="account_code" class="form-control" id="account_code" placeholder="Enter Code">

                                @error('account_code')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('description') ? 'has-error' :'' }}">
                            <label for="description" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <input type="text" value="{{ old('description') }}" name="description" class="form-control" id="description" placeholder="Enter Description">

                                @error('description')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('opening_balance') ? 'has-error' :'' }}">
                            <label for="opening_balance" class="col-sm-2 col-form-label">Opening Balance <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" value="{{ old('opening_balance',0) }}" name="opening_balance" class="form-control" id="opening_balance" placeholder="Enter Opening Balance">

                                @error('opening_balance')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('status') ? 'has-error' :'' }}">
                            <label for="status" class="col-sm-2 col-form-label">Status<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <div class="radio" style="display: inline">
                                    <label class="col-form-label">
                                        <input checked type="radio" name="status" value="1" {{ old('status') == '1' ? 'checked' : '' }}>
                                        Active
                                    </label>
                                </div>

                                <div class="radio" style="display: inline">
                                    <label class="col-form-label">
                                        <input type="radio" name="status" value="0" {{ old('status') == '0' ? 'checked' : '' }}>
                                        Inactive
                                    </label>
                                </div>
                                @error('status')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{ route('bank_account') }}" class="btn btn-default float-right">Cancel</a>
                    </div>
                </form>
            </div>

        </div>

    </div>
@endsection
@section('script')
    <script>
        $(function () {
            var branchSelected = '{{ old('branch') }}';

            $('#bank').change(function () {
                var bankId = $(this).val();

                $('#branch').html('<option value="">Select Branch</option>');

                if (bankId != '') {
                    $.ajax({
                        method: "GET",
                        url: "{{ route('bank_account.get_branch') }}",
                        data: { bankId: bankId }
                    }).done(function( data ) {
                        $.each(data, function( index, item ) {
                            if (branchSelected == item.id)
                                $('#branch').append('<option value="'+item.id+'" selected>'+item.name+'</option>');
                            else
                                $('#branch').append('<option value="'+item.id+'">'+item.name+'</option>');
                        });
                    });
                }
            });

            $('#bank').trigger('change');
        });
    </script>
@endsection

