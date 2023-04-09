@extends('layouts.backend.app')
@section('title', 'Wallet List')

@section('content')

    <div class="main-content-inner">
        <div class="page-content">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-12">
                    <div class="widget-box">
                        <div class="widget-header header-color">
                            <h4 class="widget-title">Wallet List</h4>
                        </div>
                        <div class="widget-body">
                            <div class="widget-main">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <table id="simple-table" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th width="10%" class="text-center">SL</th>
                                                    <th>User Name</th>
                                                    <th>Wallet Type</th>
                                                    <th>Balance</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @forelse ($wallets as $item)
                                                    <tr>
                                                        <td class="text-center">{{ $loop->iteration }}</td>
                                                        <td>{{ $item->user->name }}</td>
                                                        <td>{{ $item->walletType->name }}</td>
                                                        <td>{{ $item->balance }}</td>
                                                        <td class="text-center">
                                                            <button
                                                                style="width: 70px; height: 25px; background-color: #00BE67; color: white; border: none; border-radius: 5px;"
                                                                onmouseover="this.style.backgroundColor='#009e53'"
                                                                onmouseout="this.style.backgroundColor='#00BE67'"
                                                                data-toggle="modal" data-target="#myModal">View
                                                            </button>
                                                            <!-- The Modal -->
                                                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content modal-info">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                                                    aria-hidden="true">&times;</span></button>
                                                                        </div>
                                                                        <div class="modal-body modal-spa">
                                                                            <div class="col-md-5 span-2">
                                                                                <div class="item">
                                                                                    <h2>Balance {{$item->balance}}</h2>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-7 span-1 ">
                                                                                <h3>{{ $item->user->name }}</h3>
                                                                                {{-- </p>
                                                                                <div class="price_single">
                                                                                    <span class="reducedfrom "><del>{{ $item->retail_price }}tk</del>{{ $item->cost_price }}tk</span>

                                                                                    <div class="clearfix"></div>
                                                                                </div>
                                                                                <h4 class="quick">Quick Overview:</h4>
                                                                                <p class="quick_desc">{{ $item->description }}</p> --}}
                                                                            </div>
                                                                            <div class="clearfix"> </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Call button work end-->
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
