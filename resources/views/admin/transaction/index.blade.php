@extends('layouts.backend.app')
@section('title', 'Transactions')

@section('content')

<div class="main-content-inner">
    <div class="page-content">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-12">
                <div class="widget-box">
                    <div class="widget-header header-color">
                        <h4 class="widget-title">Transaction Infos</h4>

                        {{-- <span class="widget-toolbar">
                            <a class="header-text" href="{{ route('deposits.create') }}">
                                <i class="ace-icon glyphicon glyphicon-plus"></i>
                                <strong>Add New Deposit</strong>
                            </a>
                        </span> --}}
                    </div>
                    <div class="widget-body">
                        <div class="widget-main">
                            <div class="row">
                                <div class="col-xs-12">

                                    <table id="simple-table" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>User</th>
                                                <th>Source Type</th>
                                                <th>Source Id</th>
                                                <th>Amount</th>
                                                <th>Balance Type</th>
                                                <th>Date</th>
                                                <th>Wallet Type</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($transactions as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->user_id }}</td>
                                                    <td>{{ $item->source_type }}$</td>
                                                    <td>{{ $item->source_id }}$</td>
                                                    <td>{{ floatval($item->amount) }}$</td>
                                                    <td>{{ $item->balance_type }}$</td>
                                                    <td>{{ $item->date }}$</td>
                                                    <td>{{ $item->wallet_id }}$</td>
                                                    <td><span class="label label-md label-primary">{{ $item->status == '1'? 'Active' : 'Inactive' }}</span>
                                                    </td>
                                                    <td class="text-center">
                                                        <!---------------  EDIT---------------->
                                                        <div class="btn-group btn-corner  action-span ">

                                                            <a href="{{ route('transaction.edit', $item->id) }}"
                                                                role="button" class="btn btn-xs btn-success bs-tooltip"
                                                                title="Edit">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <button type="button"
                                                                onclick="delete_item(`{{ route('transaction.destroy', $item->id) }}`)"
                                                                class="btn btn-xs btn-danger bs-tooltip" title="Delete">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="30" class="text-center text-danger py-3"
                                                        style="background: #eaf4fa80 !important; font-size: 18px">
                                                        <strong>No records found!</strong>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    {{-- @include('layouts.backend.partial._paginate', ['data' => $transactions]) --}}
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
