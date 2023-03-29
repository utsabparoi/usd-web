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
                    Add Deposits Package
                </small>
            </h1>
        </div><!-- /.page-header -->

        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <form method="POST" action="{{ route('deposits.store') }}" class="form-horizontal" >
                    @csrf
                    <div class="form-group">
                        <label for="name" class="col-md-3 control-label">Name</label>
                        <div class="col-md-5">
                            <input class="form-control" type="text" placeholder="Name" name="name" id="name" value="{{ old('name') }}" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="package_price" class="col-md-3 control-label">Package Price $</label>
                        <div class="col-md-5">
                            <input class="form-control" type="text" placeholder="Package Price $" name="package_price" id="package_price" value="{{ old('package_price') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="deposit_amount" class="col-md-3 control-label">Deposit Amount</label>
                        <div class="col-md-5">
                            <input class="form-control" type="text" placeholder="Deposit Amount" name="deposit_amount" id="deposit_amount" value="{{ old('deposit_amount') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="monthly_profit" class="col-md-3 control-label">Monthly Profit</label>
                        <div class="col-md-5">
                            <input class="form-control" type="text" placeholder="Monthly Profit" name="monthly_profit" id="monthly_profit" value="{{ old('monthly_profit') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status" class="col-md-3 control-label">Status</label>
                        <div class="col-md-5">
                            <select class="form-control" id="status" name="status"><option value="1" selected="selected">Active</option><option value="2">Inactive</option></select>
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
