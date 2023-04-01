@extends('layouts.backend.app')
@section('title', 'Deposits Package')

@section('content')

    <div class="main-content-inner">
        <div class="page-content">

            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-12">
                    <div class="widget-box">
                        <div class="widget-header header-color">
                            <h4 class="widget-title">Edit Configuration</h4>
                        </div>
                        <div class="widget-body">
                            <div class="widget-main">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <!-- PAGE CONTENT BEGINS -->
                                        <form method="POST" action="{{ route('configuration.update', $configuraton_all->id) }}" class="form-horizontal" >
                                            @csrf
                                            @method('PUT')

                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <label for="project_name" class="col-md-4 control-label">Image</label>
                                                        <div class="col-md-8">
                                                            <label class="ace-file-input ace-file-multiple"><input multiple="" type="file" id="id-input-file-3"><span class="ace-file-container" data-title="Drop files here or click to choose"><span class="ace-file-name" data-title="No File ..."><i class=" ace-icon ace-icon fa fa-cloud-upload"></i></span></span><a class="remove" href="#"><i class=" ace-icon fa fa-times"></i></a></label>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="project_name" class="col-md-4 control-label">Projcet
                                                        Name</label>
                                                    <div class="col-md-8">
                                                        <input class="form-control "
                                                            value="{{ $configuraton_all->project_name }}" name="project_name"
                                                            type="text" id="project_name">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email" class="col-md-4 control-label">Email</label>
                                                    <div class="col-md-8">
                                                        <input class="form-control" value="{{ $configuraton_all->email }}"
                                                            name="email" type="text" id="email">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="phone" class="col-md-4 control-label">Phone</label>
                                                    <div class="col-md-8">
                                                        <input class="form-control" value="{{ $configuraton_all->phone }}"
                                                            name="phone" type="number" id="phone">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="address" class="col-md-4 control-label">Address</label>
                                                    <div class="col-md-8">
                                                        <input class="form-control" value="{{ $configuraton_all->address }}"
                                                            name="address" type="text" id="address">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="withdraw_charge" class="col-md-4 control-label">Withdraw
                                                        Charge</label>
                                                    <div class="col-md-8">
                                                        <input class="form-control" type="text" name="withdraw_charge"
                                                            id="withdraw_charge"
                                                            value="{{ $configuraton_all->withdraw_charge }}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="balance_transfer_charge" class="col-md-4 control-label">Balance
                                                        Transfer Charge</label>
                                                    <div class="col-md-8">
                                                        <input class="form-control" type="text"
                                                            name="balance_transfer_charge" id="balance_transfer_charge"
                                                            value="{{ $configuraton_all->balance_transfer_charge }}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="withdrow_limitation" class="col-md-4 control-label">Balance
                                                        Transfer Charge</label>
                                                    <div class="col-md-8">
                                                        <input class="form-control" type="text" name="withdrow_limitation"
                                                            id="withdrow_limitation"
                                                            value="{{ $configuraton_all->withdrow_limitation }}">
                                                    </div>
                                                </div>
    
                                                <div class="form-group">
                                                    <div class="col-md-9 col-md-offset-3">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <label for="project_name" class="col-md-4 control-label">Image</label>
                                                        <div class="col-md-8">
                                                            <label class="ace-file-input ace-file-multiple"><input multiple="" type="file" id="id-input-file-3"><span class="ace-file-container" data-title="Drop files here or click to choose"><span class="ace-file-name" data-title="No File ..."><i class=" ace-icon ace-icon fa fa-cloud-upload"></i></span></span><a class="remove" href="#"><i class=" ace-icon fa fa-times"></i></a></label>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="project_name" class="col-md-4 control-label">Projcet
                                                        Name</label>
                                                    <div class="col-md-8">
                                                        <input class="form-control "
                                                            value="{{ $configuraton_all->project_name }}" name="project_name"
                                                            type="text" id="project_name">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email" class="col-md-4 control-label">Email</label>
                                                    <div class="col-md-8">
                                                        <input class="form-control" value="{{ $configuraton_all->email }}"
                                                            name="email" type="text" id="email">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="phone" class="col-md-4 control-label">Phone</label>
                                                    <div class="col-md-8">
                                                        <input class="form-control" value="{{ $configuraton_all->phone }}"
                                                            name="phone" type="number" id="phone">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="address" class="col-md-4 control-label">Address</label>
                                                    <div class="col-md-8">
                                                        <input class="form-control" value="{{ $configuraton_all->address }}"
                                                            name="address" type="text" id="address">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="withdraw_charge" class="col-md-4 control-label">Withdraw
                                                        Charge</label>
                                                    <div class="col-md-8">
                                                        <input class="form-control" type="text" name="withdraw_charge"
                                                            id="withdraw_charge"
                                                            value="{{ $configuraton_all->withdraw_charge }}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="balance_transfer_charge" class="col-md-4 control-label">Balance
                                                        Transfer Charge</label>
                                                    <div class="col-md-8">
                                                        <input class="form-control" type="text"
                                                            name="balance_transfer_charge" id="balance_transfer_charge"
                                                            value="{{ $configuraton_all->balance_transfer_charge }}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="withdrow_limitation" class="col-md-4 control-label">Balance
                                                        Transfer Charge</label>
                                                    <div class="col-md-8">
                                                        <input class="form-control" type="text" name="withdrow_limitation"
                                                            id="withdrow_limitation"
                                                            value="{{ $configuraton_all->withdrow_limitation }}">
                                                    </div>
                                                </div>
    
                                                <div class="form-group">
                                                    <div class="col-md-9 col-md-offset-3">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </div>
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
