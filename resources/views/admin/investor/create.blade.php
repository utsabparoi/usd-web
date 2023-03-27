@extends('layouts.backend.app')
@section('title', 'Investor')

@section('content')

<div class="main-content-inner">
    <div class="page-content">

        <div class="page-header">
            <h1>
                Tables
                <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    Add Investor
                </small>
            </h1>
        </div><!-- /.page-header -->

        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <form method="POST" action="" class="form-horizontal" >
                    @csrf
                    <div class="form-group">
                        <label for="invest_package" class="col-md-3 control-label">Refer ID</label>
                        <div class="col-md-5">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="ace-icon fa fa-check"></i>
                                </span>
        
                                <input type="text" name="refer_id" class="form-control search-query" placeholder="Search Refer ID">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-purple btn-sm">
                                        <span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
                                        Search
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="invest_package" class="col-md-3 control-label">Invest Package</label>
                        <div class="col-md-5">
                            <input class="form-control " placeholder="Invest Package" required="required" name="invest_package" type="text" id="invest_package">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-md-3 control-label">Name</label>
                        <div class="col-md-5">
                            <input class="form-control " placeholder="Name" required="required" name="name" type="text" id="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="col-md-3 control-label">Phone Number</label>
                        <div class="col-md-5">
                            <input class="form-control" placeholder="Phone Number" name="phone" type="number" id="phone">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-md-3 control-label">Password</label>
                        <div class="col-md-5">
                            <input class="form-control" placeholder="Password" name="password" type="password" id="password">
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
