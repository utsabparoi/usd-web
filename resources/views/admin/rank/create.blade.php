@extends('layouts.backend.app')
@section('title', 'Rank')

@section('content')
<div class="main-content-inner">
    <div class="page-content">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-12">
                <div class="widget-box">
                    <div class="widget-header header-color">
                        <h4 class="widget-title">Create Rank</h4>
                    </div>
                    <div class="widget-body">
                        <div class="widget-main">
                            <div class="row">
                                <div class="col-xs-12">
                                    <form method="POST" action="{{ route('rank.store') }}" class="form-horizontal" enctype='multipart/form-data'>
                                        @csrf
                                        <div class="form-group">
                                            <label for="name" class="col-md-3 control-label">Rank Name</label>
                                            <div class="col-md-5">
                                                <input class="form-control" placeholder="Rank Name" required="required" name="name" type="text" id="name" value="{{ old('percentage') }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Image</label>
                                            <div class="col-md-5">
                                                <input class="form-control" type="file"  name="image" id="image">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="target" class="col-md-3 control-label">Target</label>
                                            <div class="col-md-5">
                                                <input class="form-control" type="number" placeholder="Target" name="target" id="target" value="{{ old('percentage') }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="reward" class="col-md-3 control-label">Reward</label>
                                            <div class="col-md-5">
                                                <input class="form-control" type="number" placeholder="Reward" name="reward" id="reward" value="{{ old('percentage') }}">
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
                                </div><!-- /.span -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.page-content -->
</div>




@endsection
