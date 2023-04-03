@extends('layouts.backend.app')
@section('title', 'Direct Bonus Information')

@section('content')

    <div class="main-content-inner">
        <div class="page-content">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-12">
                    <div class="widget-box">
                        <div class="widget-header header-color">
                            <h4 class="widget-title">Direct Bonus Information</h4>

                            <span class="widget-toolbar">
                                <a class="header-text" href="{{ route('directbonus.create') }}">
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
                                                    <th>SL</th>
                                                    <th>Generation</th>
                                                    <th>Percentage %</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($directbonus_info as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $item->generation }}</td>
                                                        <td>{{ $item->percentage }}%</td>
                                                        <td>
                                                            <label>
                                                                <input name="switch-field-1"
                                                                    class="ace ace-switch ace-switch-6" type="checkbox"
                                                                    {{ status($item->status) }} />
                                                                <span class="lbl"></span>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <div class="hidden-sm hidden-xs action-buttons">
                                                                <a class="green"
                                                                    href="{{ route('directbonus.edit', $item->id) }}">
                                                                    <button class="btn btn-xs btn-success">
                                                                        <i class="ace-icon fa fa-pencil bigger-120"></i>
                                                                    </button>
                                                                </a>
                                                                <a class="red"
                                                                    href="{{ route('directbonus.destroy', $item->id) }}
                                                            "
                                                                    onclick="event.preventDefault();
                                                            document.getElementById('delete-form').submit();
                                                            ">
                                                                    <button class="btn btn-xs btn-danger">
                                                                        <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                                                    </button>
                                                                </a>
                                                                <form id="delete-form"
                                                                    action="{{ route('directbonus.destroy', $item->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                </form>
                                                            </div>
                                                            <div class="hidden-md hidden-lg">
                                                                <div class="inline pos-rel">
                                                                    <button
                                                                        class="btn btn-minier btn-yellow dropdown-toggle"
                                                                        data-toggle="dropdown" data-position="auto">
                                                                        <i
                                                                            class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                                                                    </button>
                                                                    <ul
                                                                        class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                                                        <li>
                                                                            <a href="#" class="tooltip-info"
                                                                                data-rel="tooltip" title="View">
                                                                                <span class="blue">
                                                                                    <i
                                                                                        class="ace-icon fa fa-search-plus bigger-120"></i>
                                                                                </span>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="tooltip-success"
                                                                                data-rel="tooltip" title="Edit">
                                                                                <span class="green">
                                                                                    <i
                                                                                        class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                                                                </span>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="tooltip-error"
                                                                                data-rel="tooltip" title="Delete">
                                                                                <span class="red">
                                                                                    <i class="fa fa-trash"></i>
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

    @push('js')
        <!-- page specific plugin scripts -->
    @endpush
@endsection
