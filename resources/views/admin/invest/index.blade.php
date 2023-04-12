@extends('layouts.backend.app')
@section('title', 'Invest')
@push('css')
    <link rel="stylesheet" href="{{ asset('assets\css\customisedButton.css') }}" />
@endpush
@section('content')
    <style>
        /* CSS */
        .button-88-active {
            display: flex;
            align-items: center;
            font-family: inherit;
            padding: 0.6em 1.3em 0.6em 1.0em;
            color: white;
            background: #ad5389;
            background: linear-gradient(0deg, rgba(20,167,62,1) 0%, rgba(102,247,113,1) 100%);
            border: none;
            box-shadow: 0 0.7em 1.5em -0.5em #14a73e98;
            letter-spacing: 0.05em;
            border-radius: 20em;
            cursor: pointer;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
        }

        .button-88-active:hover {
            box-shadow: 0 0.5em 1.5em -0.5em #14a73e98;
            cursor: not-allowed;
        }

        .button-88-active:active {
            box-shadow: 0 0.3em 1em -0.5em #14a73e98;
        }


        .button-88-inactive {
            display: flex;
            align-items: center;
            font-family: inherit;
            padding: 0.6em 1.3em 0.6em 1.0em;
            color: #4c4c4c;
            background: #ad5389;
            background: linear-gradient(0deg, rgb(194, 194, 194) 0%, rgb(236, 236, 236) 100%);
            border: none;
            box-shadow: 0 0.7em 1.5em -0.5em rgba(205, 201, 201, 0.6);
            letter-spacing: 0.05em;
            border-radius: 20em;
            cursor: pointer;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
        }

        .button-88-inactive:hover {
            box-shadow: 0 0.5em 1.5em -0.5em rgba(213, 213, 213, 0.6);
        }

        .button-88-inactive:active {
            box-shadow: 0 0.3em 1em -0.5em rgba(116, 116, 116, 0.6);
        }
    </style>

    <div class="main-content-inner">
        <div class="page-content">
            <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="#">Home</a>
                    </li>
                    <li>Investor</li>
                </ul><!-- /.breadcrumb -->
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <h3 class="header smaller lighter blue">Invest List
                    </h3>

                    <div class="table-header">

                    </div>

                    <!-- div.table-responsive -->

                    <!-- div.dataTables_borderWrap -->
                    <div>
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>ReferID </th>
                                <th>Invest Package</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Payment By</th>
                                <th>Approval</th>
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
                                    <td>
                                        @if($investor->payment_image || $investor->transaction_id)
                                            <button class="btn btn-success" style="border: none !important; border-radius: 20em !important;"
                                                    id="paymentView"
                                                    data-name="{{ $investor->name }}"
                                                    data-image="{{ $investor->payment_image }}"
                                                    data-transaction="{{ $investor->transaction_id }}"
                                                    onclick="viewPayment(this)">bkash</button>
                                        @else
                                            <button class="btn btn-warning" style="border: none !important; border-radius: 20em !important;">Wallet</button>
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
                                            </div>
                                            <!-- Modal work end-->
                                    </td>
                                    <td>
                                        <div class="hidden-sm hidden-xs action-buttons">
                                            <button data-id="{{$investor->id}}"
                                            @if($investor->approval == 1) onclick="disableButton(this)"
                                            @else
                                                @if(!isset($nextNotApproval))
                                                    onclick="approvalChange(this)"
                                                @else
                                                    onclick="disableButton(this)"
                                                @endif
                                            @endif
                                            id="approval"
                                            type="checkbox" {{ status($investor->approval) }}
                                            class="@if($investor->approval == 1) button-88-active @else button-88-inactive @endif"
                                                    role="button"> @if($investor->approval == 1) Approved @else @if(!isset($nextNotApproval)) Not Approved @php $nextNotApproval = 1;  @endphp @else <span style="opacity: 50%; cursor: not-allowed;">Not Approved</span> @endif @endif </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
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
            function approvalChange(element) {
                let investor_id = $(element).attr("data-id");
                let post_url = "/investApprovalChange";
                let allData = {"ID": investor_id}
                axios.post(post_url, allData).then(
                    function (response) {
                        window.location.reload();
                    }
                ).catch(
                    function (error) {
                        window.location.reload();
                    }
                )
            }
        </script>
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
