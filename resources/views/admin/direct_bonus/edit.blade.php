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
                    Update Direct Bonus
                </small>
            </h1>
        </div><!-- /.page-header -->

        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <form method="POST" action="{{ route('directbonus.update', $directbonus_edit->id) }}" class="form-horizontal" >
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="generation" class="col-md-3 control-label">Generation</label>
                        <div class="col-md-5">
                            <input class="form-control " value="{{ $directbonus_edit->generation }}" name="generation" type="text" id="generation">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="percentage" class="col-md-3 control-label">Percentage</label>
                        <div class="col-md-5">
                            <input class="form-control" value="{{ $directbonus_edit->percentage }}" name="percentage" type="text" id="percentage">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status" class="col-md-3 control-label">Status</label>
                        <div class="col-md-5">
                            <select class="form-control" id="status" name="status">
                                <option value="1" {{ $directbonus_edit->status == '1' ? 'selected' : '' }}>Active</option>
                                <option value="2" {{ $directbonus_edit->status == '2' ? 'selected' : '' }}>Inactive</option>
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
