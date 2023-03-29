@extends('layouts.backend.app')
@section('title', 'Red-USD')

@section('content')

<div class="main-content-inner">
    <div class="page-content">

        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Home</a>
                </li>
                <li>Add Investor</li>
            </ul><!-- /.breadcrumb -->
        </div>

        <div class="row">
            <div class="col-xs-12">
                <h3 class="header smaller lighter blue">Add New Investor
                </h3>
                <!-- PAGE CONTENT BEGINS -->
                <form method="POST" action="{{ route('investors.store') }}" class="form-horizontal" >
                    @csrf
                    <div class="form-group">
                        <label for="invest_package" class="col-md-3 control-label">Refer ID</label>
                        <div class="col-md-5">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="ace-icon fa fa-check"></i>
                                </span>

                                <input type="text" name="refer_by" class="form-control search-query" placeholder="Search Refer ID">
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
                        <label for="email" class="col-md-3 control-label">Email</label>
                        <div class="col-md-5">
                            <input class="form-control" placeholder="Email" name="email" type="email" id="email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="col-md-3 control-label">Phone</label>
                        <div class="col-md-5">
                            <input class="form-control" placeholder="+88 123-456-7890" name="phone" type="tel" id="phone" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-md-3 control-label">Password</label>
                        <div class="col-md-5">
                            <input class="form-control" placeholder="Password" name="password" type="password" id="password"  required autocomplete="new-password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status" class="col-md-3 control-label">Status</label>
                        <div class="col-md-5">
                                <div class="input-group">
                                    <label style="margin: 5px 0 0 0">
                                        <input name="status"
                                               class="ace ace-switch ace-switch-6"
                                               type="checkbox" checked>
                                        <span class="lbl"></span>
                                    </label>
                                </div>
                        </div>
                    </div>
                    <div>
                        <input type="text" name="type" value="2" hidden>
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
