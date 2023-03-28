@extends('layouts.backend.app')
@section('title', 'Deposits')

@section('content')

<div class="main-content-inner">
    <div class="page-content">

        <div class="page-header">
            <h1>
                Tables
                <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    Add Deposits
                </small>
            </h1>
        </div><!-- /.page-header -->

        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <form method="POST" action="" class="form-horizontal" >
                    @csrf
                    <div class="form-group">
                        <label for="name" class="col-md-3 control-label">Name</label>
                        <div class="col-md-5">
                            <input class="form-control " placeholder="Name" required="required" name="name" type="text" id="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="package_price" class="col-md-3 control-label">Package Price $</label>
                        <div class="col-md-5">
                            <input class="form-control" placeholder="Package Price $" name="package_price" type="number" id="package_price">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="value" class="col-md-3 control-label">Value</label>
                        <div class="col-md-5">
                            <input class="form-control" placeholder="Value" name="value" type="number" id="value">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="reference_percent" class="col-md-3 control-label">Reference %</label>
                        <div class="col-md-5">
                            <input class="form-control" placeholder="Reference %" name="reference_percent" type="number" id="reference_percent">
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
