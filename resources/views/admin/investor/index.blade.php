@extends('layouts.backend.app')
@section('title', 'Investor Information')
@push('css')
    <link rel="stylesheet" href="{{ asset('assets\css\customisedButton.css') }}" />
@endpush
@section('content')

    <div class="main-content-inner">
        <div class="page-content">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-12">
                    <div class="widget-box">
                        <div class="widget-header header-color">
                            <h4 class="widget-title">Investor Information</h4>

                        <span class="widget-toolbar">
                            <a class="header-text" href="{{ route('investors.create') }}">
                                <i class="ace-icon glyphicon glyphicon-plus"></i>
                                <strong>Add New Investor</strong>
                            </a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <div class="widget-main">
                            <div class="row">
                                <div class="col-xs-12">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th> SL </th>
                                                <th> Refer By </th>
                                                <th> Invest Package </th>
                                                <th> Name </th>
                                                <th> Phone </th>
                                                <th> Income Balance($) </th>
                                                <th> Invest Balance ($)</th>
                                                <th> Payment By </th>
                                                <th> Status </th>
                                            </tr>
                                        </thead>
                                         <tbody>
                                         @foreach($investors as $investor)
                                            <tr>
                                                <td> {{ $loop->iteration }} </td>
                                                <td> {{ $investor->refer_by }} </td>
                                                <td> {{ \App\Models\Admin\UserDeposit::where('user_id', $investor->id)->first()->name }} </td>
                                                <td> {{ $investor->name }} </td>
                                                <td> {{ $investor->mobile }} </td>
                                                <td> 0 </td>
                                                <td> 0 </td>
                                                <td>
                                                    @if($investor->payment_image || $investor->transaction_id)
                                                        <button class="btn btn-success" style="border: none !important;"
                                                                id="paymentView"
                                                                data-name="{{ $investor->name }}"
                                                                data-image="{{ $investor->payment_image }}"
                                                                data-transaction="{{ $investor->transaction_id }}"
                                                                onclick="viewPayment(this)">bkash</button>
                                                    @else
                                                        <button class="btn btn-warning" style="border: none !important;">Wallet</button>
                                                    @endif
                                                    <!-- The Modal -->
                                                        <div id="myModal" class="modal">
                                                            <!-- Modal content -->
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <span class="close">&times;</span>
                                                                    <div class="campName text-center">Payment Information</div>
                                                                </div>
                                                                <br>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-10">
                                                                            <div align="center">
                                                                            <table>
                                                                                <tbody>
                                                                                <tr class="text-center"><td><img src="{{ asset($investor->payment_image) }}" width="330" height="auto" id="paymentImage"></td></tr>
                                                                                <tr class="text-center"><td><span id="campName" style="font-size: 20px; color: #656565; font-family: 'Droid Sans';">{{ $investor->name }}</span></td></tr>
                                                                                <tr class="text-center"><td style="font-size: 18px; color: #656565; font-family: Bahnschrift;">Transaction ID: <span id="transactionId">{{ $investor->transaction_id }}</span></td></tr>
                                                                                </tbody>
                                                                            </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                            </div>
                                                            <!-- Modal work end-->
                                                        </td>
                                                        <td>
                                                            <label>
                                                                <input name="switch-field-1"
                                                                    class="ace ace-switch ace-switch-6" type="checkbox"
                                                                    {{ status($investor->status) }} />
                                                                <span class="lbl"></span>
                                                            </label>
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

        <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.dataTables.bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('assets/js/buttons.flash.min.js') }}"></script>
        <script src="{{ asset('assets/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('assets/js/buttons.print.min.js') }}"></script>
        <script src="{{ asset('assets/js/buttons.colVis.min.js') }}"></script>
        <script src="{{ asset('assets/js/dataTables.select.min.js') }}"></script>

<script>
    function viewPayment(element) {
        var modal = document.getElementById("myModal");
        var callButton = document.getElementById("paymentView");
        var span = document.getElementsByClassName("close")[0];
        modal.style.display = "block";
        span.onclick = function() {
            modal.style.display = "none";
        }
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
        let investor_name = $(element).attr("data-name");
        let payment_image = $(element).attr("data-image");
        let payment_transaction = $(element).attr("data-transaction");
        document.getElementById('campName').innerHTML = investor_name;
        document.getElementById('paymentImage').src = payment_image;
        document.getElementById('transactionId').innerHTML = payment_transaction;
    }
</script>
@endpush
@endsection
