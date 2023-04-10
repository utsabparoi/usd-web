@extends('layouts.backend.app')
@section('title', 'Deposits Information')

@section('content')

<div class="main-content-inner">
    <div class="page-content">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-12">
                <div class="widget-box">
                    <div class="widget-header header-color">
                        <h4 class="widget-title">Deposit Packages Information</h4>

                        <span class="widget-toolbar">
                            <a class="header-text" href="{{ route('deposits.create') }}">
                                <i class="ace-icon glyphicon glyphicon-plus"></i>
                                <strong>Add New Deposit</strong>
                            </a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <div class="widget-main">
                            <div class="row">
                                <div class="col-xs-12">

                                    <table id="simple-table" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Name</th>
                                                <th>image</th>
                                                <th>Package Price($)</th>
                                                <th>Deposit Amount($)</th>
                                                <th>Monthly Profit($)</th>
                                                <th>Total Payable($)</th>
                                                <th>Distribute Amount($)</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                         <tbody>
                                            @foreach ($deposits_info as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td><img src="{{ asset($item->image) }}" height="50px">
                                                </td>
                                                <td>{{ $item->package_price }}$</td>
                                                <td>{{ $item->deposit_amount }}$</td>
                                                <td>{{ $item->monthly_profit }}$</td>
                                                <td>{{ $item->total_payable }}$</td>
                                                <td>{{ $item->distribute_amount }}$</td>
                                                <td><span class="label label-md label-primary">{{ $item->status == '1'? 'Active' : 'Inactive' }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <!---------------  EDIT---------------->
                                                    <div class="btn-group btn-corner  action-span ">

                                                        <a href="{{ route('deposits.edit', $item->id) }}"
                                                            role="button" class="btn btn-xs btn-success bs-tooltip"
                                                            title="Edit">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <button type="button"
                                                            onclick="delete_item(`{{ route('deposits.destroy', $item->id) }}`)"
                                                            class="btn btn-xs btn-danger bs-tooltip" title="Delete">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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
