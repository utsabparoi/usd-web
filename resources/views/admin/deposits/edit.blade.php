@extends('layouts.backend.app')
@section('title', 'Deposits Package')

@section('content')

<div class="main-content-inner">
    <div class="page-content">

        <div class="page-header">
            <h1>
                Tables
                <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    Update Deposits Package
                </small>
            </h1>
        </div><!-- /.page-header -->

        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <form method="POST" action="{{ route('deposits.update', $deposit_edit->id) }}" class="form-horizontal" >
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name" class="col-md-3 control-label">Name</label>
                        <div class="col-md-5">
                            <input class="form-control " value="{{ $deposit_edit->name }}" name="name" type="text" id="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="package_price" class="col-md-3 control-label">Package Price $</label>
                        <div class="col-md-5">
                            <input class="form-control" value="{{ $deposit_edit->package_price }}" name="package_price" type="text" id="package_price">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="deposit_amount" class="col-md-3 control-label">Deposit Amount</label>
                        <div class="col-md-5">
                            <input class="form-control" value="{{ $deposit_edit->deposit_amount }}" name="deposit_amount" type="text" id="deposit_amount">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="monthly_profit" class="col-md-3 control-label">Monthly Profit</label>
                        <div class="col-md-5">
                            <input class="form-control" value="{{ $deposit_edit->monthly_profit }}" name="monthly_profit" type="text" id="monthly_profit">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status" class="col-md-3 control-label">Status</label>
                        <div class="col-md-5">
                            <select class="form-control" id="status" name="status">
                                <option value="1" {{ $deposit_edit->status == '1' ? 'selected' : '' }}>Active</option>
                                <option value="2" {{ $deposit_edit->status == '2' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                  </form>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
</div>




@endsection
