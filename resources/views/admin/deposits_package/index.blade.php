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
                                                <td>
                                                    <div class="hidden-sm hidden-xs action-buttons">
                                                        <a class="green" href="{{ route('deposits.edit', $item->id) }}">
                                                            <button class="btn btn-xs btn-success">
                                                                <i class="ace-icon fa fa-pencil bigger-120"></i>
                                                            </button>
                                                        </a>
                                                        <a class="red" href="{{ route('deposits.destroy', $item->id ) }}
                                                            " onclick="event.preventDefault();
                                                            document.getElementById('delete-form').submit();
                                                            ">
                                                            <button class="btn btn-xs btn-danger">
                                                            <i class="fa fa-trash bigger-130"></i>
                                                            </button>
                                                        </a>
                                                         <form id="delete-form" action="{{ route('deposits.destroy', $item->id ) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </div>
                                                    <div class="hidden-md hidden-lg">
                                                        <div class="inline pos-rel">
                                                            <button class="btn btn-minier btn-yellow dropdown-toggle"
                                                                data-toggle="dropdown" data-position="auto">
                                                                <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                                                            </button>
                                                            <ul
                                                                class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                                                <li>
                                                                    <a href="#" class="tooltip-info" data-rel="tooltip"
                                                                        title="View">
                                                                        <span class="blue">
                                                                            <i class="ace-icon fa fa-search-plus bigger-120"></i>
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" class="tooltip-success" data-rel="tooltip"
                                                                        title="Edit">
                                                                        <span class="green">
                                                                            <i
                                                                                class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" class="tooltip-error" data-rel="tooltip"
                                                                        title="Delete">
                                                                        <span class="red">
                                                                            <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
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
