@extends('layouts.backend.app')
@section('title', 'Red-USD')

@section('content')

<div class="main-content-inner">
    <div class="page-content">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-12">
                <div class="widget-box">
                    <div class="widget-header header-color">
                        <h4 class="widget-title">Create Investor</h4>

                        <span class="widget-toolbar">
                            <a class="header-text" href="{{ route('investors.index') }}">
                                <i class="ace-icon glyphicon glyphicon-list"></i>
                                <strong>Investors List</strong>
                            </a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <div class="widget-main">
                            <div class="row">
                                <div class="col-xs-12">
                                    <form method="POST" action="{{ route('investors.store') }}" class="form-horizontal" enctype="multipart/form-data" >
                                        @csrf
                                        <div class="form-group">
                                            <label for="invest_package" class="col-md-3 control-label">Refer ID</label>
                                            <div class="col-md-5">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="ace-icon fa fa-check" id="checkMark"></i>
                                                    </span>

                                                    <input type="text" name="refer_by" id="refer_by" value="" class="form-control search-query" placeholder="Search Refer ID">
                                                    <span class="input-group-btn">
                                                        <button type="button" onclick="searchReferId()" class="btn btn-purple btn-sm">
                                                            <span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
                                                            Search
                                                        </button>
                                                    </span>
                                                </div>
                                                <span id="invalidReferMsg" style="color: red;"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="invest_package" class="col-md-3 control-label">Invest Package</label>
                                            <div class="col-md-5">
                                                <select class="form-control" name="deposit_plan" required>
                                                    <option value="">-Select-</option>
                                                    @foreach($deposit_plans as $deposit_plan)
                                                    <option value="{{ $deposit_plan->id }}">{{ $deposit_plan->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="col-md-3 control-label">Name</label>
                                            <div class="col-md-5">
                                                <input class="form-control " placeholder="Name" required="required" name="name" type="text" id="name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="col-md-3 control-label">Email</label>
                                            <div class="col-md-5">
                                                <input class="form-control" placeholder="Email" name="email" type="email" id="email" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="phone" class="col-md-3 control-label">Phone</label>
                                            <div class="col-md-5">
                                                <input class="form-control" placeholder="+88 123-456-7890" name="phone" type="tel" id="phone" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="col-md-3 control-label">Password</label>
                                            <div class="col-md-5">
                                                <input class="form-control" placeholder="Password" name="password" type="password" id="password"  required autocomplete="new-password">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="status" class="col-md-3 control-label">Payment Method</label>
                                            <div class="col-md-5">
                                                <div class="radio">
                                                    <label>
                                                        <input name="form-field-radio" type="radio" class="ace" onchange="payment1()"/>
                                                        <span class="lbl"> bKash</span>
                                                    </label>
                                                    <label>
                                                        <input name="form-field-radio" type="radio" class="ace" onchange="wallet()" checked/>
                                                        <span class="lbl"> Wallet</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="paymentMethod" style="display: none;">
                                        <div class="form-group" id="transactionId">
                                            <label for="transaction_id" class="col-md-3 control-label">Transaction No.</label>
                                            <div class="col-md-5">
                                                <input class="form-control" name="transaction_id" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group" id="paymentAttachment">
                                            <label for="paymentAttachment" class="col-md-3 control-label">Payment Attachment</label>
                                            <div class="col-md-3">
                                                <input class="form-control" name="payment_image" type="file">
                                            </div>
                                        </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-9 col-md-offset-3">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                      </form>
                                </div><!-- /.span -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.page-content -->
</div>

    <script>
        function searchReferId() {
                let refer_by = document.getElementById('refer_by').value;
                let url = "/referCheck";
                let allData = {Refer_by:refer_by};
                axios.post(url, allData).then(
                    function (response) {
                        if (response.data.id){
                            document.getElementById('invalidReferMsg').innerHTML = "" ;
                            document.getElementById('checkMark').style.color = "#00BE67" ;
                        }
                        else{
                            document.getElementById('checkMark').style.color = "" ;
                            document.getElementById('invalidReferMsg').innerHTML = "Refer-id invalid" ;
                        }

                    }
                ).catch(
                    function (error) {
                        alert('Error try again!')
                    }
                )
        }


        function payment1() {
            document.getElementById('paymentMethod').style.display = 'inline';
        }
        function wallet() {
            document.getElementById('paymentMethod').style.display = 'none';
            //document.getElementById('payment_image').src = '-';
        }
    </script>
@endsection
