@extends('layouts.backend.app')
@section('title', 'Direct Bonus')

@section('content')

<div class="main-content-inner">
    <div class="page-content">

        <div class="page-header">
            <h1>
                Tables
                <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    Add Direct Bonus
                </small>
            </h1>
        </div><!-- /.page-header -->

        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <form method="POST" action="{{ route('directbonus.store') }}" class="form-horizontal" >
                    @csrf
                    <div class="form-group">
                        <label for="generation" class="col-md-3 control-label">Generation</label>
                        <div class="col-md-5">
                            <input class="form-control" type="text" placeholder="Generation" name="generation" id="generation" value="{{ old('generation') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="percentage" class="col-md-3 control-label">Percentage</label>
                        <div class="col-md-5">
                            <input class="form-control" type="text" placeholder="Percentage %" name="percentage" id="percentage" value="{{ old('percentage') }}">
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
