@extends('layouts.backend.app')
@section('title', 'Rank')

@section('content')

<div class="main-content-inner">
    <div class="page-content">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-12">
                <div class="widget-box">
                    <div class="widget-header header-color">
                        <h4 class="widget-title">Rank Update</h4>
                    </div>
                    <div class="widget-body">
                        <div class="widget-main">
                            <div class="row">
                                <div class="col-xs-12">
                                    <!-- PAGE CONTENT BEGINS -->
                                    <form method="POST" action="{{ route('rank.update', $rank_edit->id) }}" class="form-horizontal" enctype='multipart/form-data'>
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="name" class="col-md-3 control-label">Rank Name</label>
                                            <div class="col-md-5">
                                                <input class="form-control " placeholder="Rank Name" value="{{ $rank_edit->name }}" name="name" type="text" id="name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Image</label>
                                            <div class="col-md-5">
                                                <input class="form-control" type="file"  name="image" id="image" value="{{ $rank_edit->image }}">
                                                <img src="{{ asset($rank_edit->image) }}" height="50">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="target" class="col-md-3 control-label">Target</label>
                                            <div class="col-md-5">
                                                <input class="form-control" value="{{ $rank_edit->target }}" name="target" type="number" id="target">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="reward" class="col-md-3 control-label">Reward</label>
                                            <div class="col-md-5">
                                                <input class="form-control" value="{{ $rank_edit->reward }}" name="reward" type="number" id="reward">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="status" class="col-md-3 control-label">Status</label>
                                            <div class="col-md-5">
                                                <select class="form-control" id="status" name="status">
                                                    <option value="1" {{$rank_edit->status == '1' ? 'selected' : '' }}>Active</option>
                                                    <option value="2" {{$rank_edit->status == '2' ? 'selected' : '' }}>Inactive</option>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.page-header -->
    </div><!-- /.page-content -->
</div>




@endsection
