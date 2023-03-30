@extends('layouts.backend.app')
@section('title', 'Deposits Package')

@section('content')

<div class="main-content-inner">
    <div class="page-content">

        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-12">
                <div class="widget-box">
                    <div class="widget-header header-color">
                        <h4 class="widget-title">Deposits Package Update</h4>
                    </div>
                    <div class="widget-body">
                        <div class="widget-main">
                            <div class="row">
                                <div class="col-xs-12">
                                    <!-- PAGE CONTENT BEGINS -->
                                    <form method="POST" action="{{ route('deposits.update', $deposit_edit->id) }}" class="form-horizontal" >
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="name" class="col-md-3 control-label">Name</label>
                                            <div class="col-md-5">
                                                <input class="form-control " value="{{ $deposit_edit->name }}" name="name" type="text" id="name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="package_price" class="col-md-3 control-label">Package Price ($)</label>
                                            <div class="col-md-5">
                                                <input class="form-control" value="{{ $deposit_edit->package_price }}" name="package_price" type="text" id="package_price">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="deposit_amount" class="col-md-3 control-label">Deposit Amount ($)</label>
                                            <div class="col-md-5">
                                                <input class="form-control" value="{{ $deposit_edit->deposit_amount }}" name="deposit_amount" type="text" id="deposit_amount">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="monthly_profit" class="col-md-3 control-label">Monthly Profit ($)</label>
                                            <div class="col-md-5">
                                                <input class="form-control" value="{{ $deposit_edit->monthly_profit }}" name="monthly_profit" type="text" id="monthly_profit">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="total_payable" class="col-md-3 control-label">Total Payable ($)</label>
                                            <div class="col-md-5">
                                                <input class="form-control" type="number" name="total_payable" id="total_payable" value="{{ $deposit_edit->total_payable }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="distribute_amount" class="col-md-3 control-label">Distribute Amount ($)</label>
                                            <div class="col-md-5">
                                                <input class="form-control" type="number" name="distribute_amount" id="distribute_amount" value="{{ $deposit_edit->distribute_amount }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="image" class="col-md-3 control-label">Image</label>
                                            <div class="col-md-5">
                                                <input class="form-control" type="file"  name="image" id="image" value="{{ $deposit_edit->image }}">
                                                <img src="{{ asset($deposit_edit->image) }}" height="50">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="status" class="col-md-3 control-label">Status</label>
                                            <div class="col-md-5">
                                                <select class="form-control" id="status" name="status">
                                                    <option value="1" {{ $deposit_edit->status == '1' ? 'selected' : '' }}>Active</option>
                                                    <option value="2" {{ $deposit_edit->status == '2' ? 'selected' : '' }}>Inactive</option>
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
