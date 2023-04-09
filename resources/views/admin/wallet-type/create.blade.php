@extends('layouts.backend.app')
@section('title', 'Wallet Type')

@section('content')

<div class="main-content-inner">
    <div class="page-content">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-12">
                <div class="widget-box">
                    <div class="widget-header header-color">
                        <h4 class="widget-title">Create Wallet Type</h4>
                    </div>
                    <div class="widget-body">
                        <div class="widget-main">
                            <div class="row">
                                <div class="col-xs-12">
                                    <form method="POST" action="{{ route('wallet_types.store') }}" class="form-horizontal" >
                                        @csrf
                                        <div class="form-group">
                                            <label for="generation" class="col-md-3 control-label">Name</label>
                                            <div class="col-md-5">
                                                <input class="form-control" type="text" placeholder="Wallet Name" name="name" id="name" value="{{ old('name') }}">
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
