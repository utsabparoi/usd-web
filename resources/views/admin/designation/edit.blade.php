@extends('layouts.backend.app')
@section('title', 'Designation')

@section('content')

<div class="main-content-inner">
    <div class="page-content">

        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-12">
                <div class="widget-box">
                    <div class="widget-header header-color">
                        <h4 class="widget-title">Designation Update</h4>
                    </div>
                    <div class="widget-body">
                        <div class="widget-main">
                            <div class="row">
                                <div class="col-xs-12">
                                    <!-- PAGE CONTENT BEGINS -->
                                    <form method="POST" action="{{ route('designations.update', $designation->id) }}" class="form-horizontal" >
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="name" class="col-md-3 control-label">Name</label>
                                            <div class="col-md-5">
                                                <input class="form-control " value="{{ $designation->name }}" name="name" type="text" id="name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="code" class="col-md-3 control-label">Code</label>
                                            <div class="col-md-5">
                                                <input class="form-control" value="{{ $designation->code }}" name="code" type="text" id="code">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="status" class="col-md-3 control-label">Status</label>
                                            <div class="col-md-5">
                                                <select class="form-control" id="status" name="status">
                                                    <option value="1" {{ $designation->status == '1' ? 'selected' : '' }}>Active</option>
                                                    <option value="2" {{ $designation->status == '2' ? 'selected' : '' }}>Inactive</option>
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
        </div>
        {{-- <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

            </div><!-- /.col -->
        </div><!-- /.row --> --}}
    </div><!-- /.page-content -->
</div>




@endsection
