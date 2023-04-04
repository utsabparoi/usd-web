@extends('layouts.backend.app')
@section('title', 'Direct Bonus')

@section('content')

<div class="main-content-inner">
    <div class="page-content">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-12">
                <div class="widget-box">
                    <div class="widget-header header-color">
                        <h4 class="widget-title">Create Direct Bonus</h4>
                    </div>
                    <div class="widget-body">
                        <div class="widget-main">
                            <div class="row">
                                <div class="col-xs-12">
                                    <form method="POST" action="{{ route('directbonus.store') }}" class="form-horizontal" >
                                        @csrf
                                        <div class="form-group">
                                            <label for="generation" class="col-md-3 control-label">Generation</label>
                                            <div class="col-md-5">
                                                <input class="form-control" type="text" placeholder="Generation" name="generation" id="generation" value="{{ old('generation') }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="percentage" class="col-md-3 control-label">Percentage (%)</label>
                                            <div class="col-md-5">
                                                <input class="form-control" type="decimal" placeholder="Percentage %" name="percentage" id="percentage" value="{{ old('percentage') }}">
                                            </div>
                                        </div>
                                        <div class="form-group hidden">
                                            <label for="status" class="col-md-3 control-label">Status</label>
                                            <div class="col-md-5">
                                                <select class="form-control" id="status" name="status">
                                                    <option value="1" selected="selected">Active</option>
                                                    <option value="2">Inactive</option>
                                                </select>
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
