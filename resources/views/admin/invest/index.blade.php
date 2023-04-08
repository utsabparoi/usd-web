@extends('layouts.backend.app')
@section('title', 'Invest')

@section('content')

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
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $investor->refer_by }}</td>
                                    <td> {{ \App\Models\Admin\UserDeposit::where('user_id', $investor->id)->first()->name }} </td>
                                    <td>{{ $investor->name }}</td>
                                    <td>{{ $investor->mobile }}</td>
                                    <td>
                                        @if($investor->payment_image)
                                            <button class="btn btn-success" style="border: none !important;"
                                                    id="paymentView"
                                                    data-id="{{ $investor->id }}"
                                                    data-name="{{ $investor->name }}"
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
                                                    <div class="campName" id="campName">Payment Information</div>
                                                </div>
                                                <br>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-10">
                                                            <table id="storeList">

                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="modal-footer">
                                                    <div align="center">
                                                        Payment
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal work end-->
                                    </td>
                                    <td>
                                        <div class="hidden-sm hidden-xs action-buttons">
                                            <label>
                                                <input name="switch-field-1" data-id="{{$investor->id}}"
                                                       onclick="approvalChange(this)" id="approval"
                                                       class="ace ace-switch ace-switch-6"
                                                       type="checkbox" {{ status($investor->approval) }}/>
                                                <span class="lbl"></span>
                                            </label>
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
            function viewPayment(element) {
                // Get the modal
                var modal = document.getElementById("myModal");

                // Get the button that opens the modal
                var callButton = document.getElementById("paymentView");

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                // When the user clicks the button, open the modal
                /*callButton.onclick = function() {
                    modal.style.display = "block";
                }*/
                modal.style.display = "block";

                // When the user clicks on <span> (x), close the modal
                span.onclick = function() {
                    modal.style.display = "none";
                }

                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                }

                // let camp_id = $(element).attr("data-id");
                // let camp_name = $(element).attr("data-name");
                // document.getElementById('campName').innerHTML = camp_name;
                //
                // let url = "/camp_store";
                // let allData = {
                //     CampId: camp_id
                // };
                //
                // axios.post(url, allData).then(
                //     function(response) {
                //         var responseData = response.data;
                //         var serialNumber = 1;
                //         $('#storeList').empty();
                //         $('#storeList').append("" +
                //             "<tr>\n" +
                //             "                                                                                    <th width=\"5%\">SL</th>\n" +
                //             "                                                                                    <th width=\"40%\">Store</th>\n" +
                //             "                                                                                    <th width=\"40%\">Store Man</th>\n" +
                //             "                                                                                </tr>");
                //         for (let i = 0; i < responseData.length; i++) {
                //             $('#storeList').append("" +
                //                 "<tr align=\"left\">\n" +
                //                 "                                                                                    <td>" +
                //                 serialNumber + "</td>\n" +
                //                 "                                                                                    <td>" +
                //                 responseData[i].name + "</td>\n" +
                //                 "                                                                                    <td>" +
                //                 response.data[i].store_man + "</td>\n" +
                //                 "                                                                                </tr>");
                //             serialNumber++;
                //         }
                //     }
                // ).catch(
                //     function(error) {
                //         alert("Error...try again");
                //     }
                // )
            }

        </script>
        <script>
            function approvalChange(element) {
                let investor_id = $(element).attr("data-id");
                let post_url = "/investApprovalChange";
                let allData = {"ID": investor_id}
                axios.post(post_url, allData).then(
                    function (response) {
                    }
                ).catch(
                    function (error) {
                    }
                )

            }
        </script>
    @endpush
@endsection
