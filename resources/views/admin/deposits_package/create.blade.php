@extends('layouts.backend.app')
@section('title', 'Deposits Package')

@section('content')
<div class="main-content-inner">
    <div class="page-content">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-12">
                <div class="widget-box">
                    <div class="widget-header header-color">
                        <h4 class="widget-title">Create Deposits Package</h4>
                    </div>
                    <div class="widget-body">
                        <div class="widget-main">
                            <div class="row">
                                <div class="col-xs-12">
                                    <!-- PAGE CONTENT BEGINS -->
                                    <form method="POST" action="{{ route('deposits.store') }}" class="form-horizontal" enctype="multipart/form-data" >
                                        @csrf
                                        <div class="form-group">
                                            <label for="name" class="col-md-3 control-label">Name</label>
                                            <div class="col-md-5">
                                                <input class="form-control" type="text" placeholder="Name" name="name" id="name" value="{{ old('name') }}" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="package_price" class="col-md-3 control-label">Package Price ($)</label>
                                            <div class="col-md-5">
                                                <input class="form-control" type="number" placeholder="Package Price" name="package_price" id="package_price" value="{{ old('package_price') }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="deposit_amount" class="col-md-3 control-label">Deposit Amount ($)</label>
                                            <div class="col-md-5">
                                                <input class="form-control" type="number" placeholder="Deposit Amount" name="deposit_amount"  id="deposit_amount" value="{{ old('deposit_amount') }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="monthly_profit" class="col-md-3 control-label">Monthly Profit ($)</label>
                                            <div class="col-md-5">
                                                <input class="form-control" type="number" placeholder="Monthly Profit" name="monthly_profit" id="monthly_profit" value="{{ old('monthly_profit') }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="total_payable" class="col-md-3 control-label">Total Payable ($)</label>
                                            <div class="col-md-5">
                                                <input class="form-control" type="number" placeholder="Total Payable" name="total_payable" id="total_payable" value="{{ old('total_payable') }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="distribute_amount" class="col-md-3 control-label">Distribute Amount ($)</label>
                                            <div class="col-md-5">
                                                <input class="form-control" type="number" placeholder="Distribute Amount" name="distribute_amount" id="distribute_amount" value="{{ old('distribute_amount') }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="image" class="col-md-3 control-label">Image</label>
                                            <div class="col-md-5">
                                                <input class="form-control" type="file" placeholder="Image" name="image" id="image" value="{{ old('image') }}">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.page-content -->
</div>

@endsection
