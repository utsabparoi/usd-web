@extends('layouts.backend.app')
@section('title', 'Wallet Type')

@section('content')

    <div class="main-content-inner">
        <div class="page-content">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-12">
                    <div class="widget-box">
                        <div class="widget-header header-color">
                            <h4 class="widget-title">Wallet Types</h4>

                            <span class="widget-toolbar">
                                <a class="header-text" href="{{ route('wallet_types.create') }}">
                                    <i class="ace-icon glyphicon glyphicon-plus"></i>
                                    <strong>Add New</strong>
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
                                                    <th width="10%" class="text-center">SL</th>
                                                    <th>Name</th>
                                                    <th width="30%" class="text-center">Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @forelse ($wallet_types as $item)
                                                    <tr>
                                                        <td class="text-center">{{ $loop->iteration }}</td>
                                                        <td>{{ $item->name }}</td>
                                                        <td class="text-center">
                                                            <div class="btn-group btn-corner  action-span ">
                                                                <a class="green"
                                                                    href="{{ route('wallet_types.edit', $item->id) }}">
                                                                    <button class="btn btn-xs btn-success bs-tooltip">
                                                                        <i class="fa fa-pencil"></i>
                                                                    </button>
                                                                </a>
                                                                <a class="red"
                                                                    href="{{ route('wallet_types.destroy', $item->id) }}
                                                            "
                                                                    onclick="event.preventDefault();
                                                            document.getElementById('delete-form').submit();
                                                            ">
                                                                    <button class="btn btn-xs btn-danger bs-tooltip">
                                                                        <i class="fa fa-trash"></i>
                                                                    </button>
                                                                </a>
                                                                <form id="delete-form"
                                                                    action="{{ route('wallet_types.destroy', $item->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                </form>
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
                                    </div><!-- /.span -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div><!-- /.page-content -->
    </div>

    @push('js')
        <!-- page specific plugin scripts -->
    @endpush
@endsection
