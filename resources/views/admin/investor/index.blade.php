@extends('layouts.backend.app')
@section('title', 'Investor Information')

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
                <h3 class="header smaller lighter blue">All Investor Information
                </h3>
                <div class="clearfix">
                    <div class="pull-right tableTools-container">
                        <a href="{{ route('investors.create') }}">
                            <button class="btn btn-white btn-default btn-round">
                                <i class="ace-icon glyphicon glyphicon-plus"></i>
                                Add New investor
                            </button>
                        </a>
                    </div>
                </div>

                <div class="table-header">

                </div>

                <!-- div.table-responsive -->

                <!-- div.dataTables_borderWrap -->
                <div>
                    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>ReferID </th>
                                <th>Invest Package</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Payment By</th>
                                <th>Status</th>
                                <th>Action</th>
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
                                        <label>
                                            <input name="switch-field-1" class="ace ace-switch ace-switch-6" type="checkbox" />
                                            <span class="lbl"></span>
                                        </label>
                                </td>
                                <td>
                                    <div class="hidden-sm hidden-xs action-buttons">
                                        <button class="btn btn-xs btn-success">
                                            <i class="ace-icon fa fa-pencil bigger-120"></i>
                                        </button>
                                        <button class="btn btn-xs btn-danger">
                                            <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                        </button>

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
<!-- inline scripts related to this page -->
<script type="text/javascript">

    var myTable =
        $('#dynamic-table')
        //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
        .DataTable({
            bAutoWidth: false,

            "aaSorting": [],

            select: {
                style: 'multi'
            }
        });

    $.fn.dataTable.Buttons.defaults.dom.container.className =
        'dt-buttons btn-overlap btn-group btn-overlap';

    new $.fn.dataTable.Buttons(myTable, {
        buttons: [{
                "extend": "colvis",
                "text": "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Show/hide columns</span>",
                "className": "btn btn-white btn-primary btn-bold",
                columns: ':not(:first):not(:last)'
            },
            {
                "extend": "copy",
                "text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copy to clipboard</span>",
                "className": "btn btn-white btn-primary btn-bold"
            },
            {
                "extend": "csv",
                "text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Export to CSV</span>",
                "className": "btn btn-white btn-primary btn-bold"
            },
            {
                "extend": "excel",
                "text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
                "className": "btn btn-white btn-primary btn-bold"
            },
            {
                "extend": "pdf",
                "text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
                "className": "btn btn-white btn-primary btn-bold"
            },
            {
                "extend": "print",
                "text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
                "className": "btn btn-white btn-primary btn-bold",
                autoPrint: true,
                message: 'This print was produced using SMART SOFTWARE'
            }
        ]
    });
    myTable.buttons().container().appendTo($('.tableTools-container'));

    //style the message box
    var defaultCopyAction = myTable.button(1).action();
    myTable.button(1).action(function(e, dt, button, config) {
        defaultCopyAction(e, dt, button, config);
        $('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
    });

    var defaultColvisAction = myTable.button(0).action();
    myTable.button(0).action(function(e, dt, button, config) {

        defaultColvisAction(e, dt, button, config);

        if ($('.dt-button-collection > .dropdown-menu').length == 0) {
            $('.dt-button-collection')
                .wrapInner(
                    '<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
                .find('a').attr('href', '#').wrap("<li />")
        }
        $('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
    });

    ////

    setTimeout(function() {
        $($('.tableTools-container')).find('a.dt-button').each(function() {
            var div = $(this).find(' > div').first();
            if (div.length == 1) div.tooltip({
                container: 'body',
                title: div.parent().text()
            });
            else $(this).tooltip({
                container: 'body',
                title: $(this).text()
            });
        });
    }, 500);

    myTable.on('select', function(e, dt, type, index) {
        if (type === 'row') {
            $(myTable.row(index).node()).find('input:checkbox').prop('checked', true);
        }
    });
    myTable.on('deselect', function(e, dt, type, index) {
        if (type === 'row') {
            $(myTable.row(index).node()).find('input:checkbox').prop('checked', false);
        }
    });

    /////////////////////////////////
    //table checkboxes
    $('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);

    //select/deselect all rows according to table header checkbox
    $('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]')
        .eq(0).on('click', function() {
            var th_checked = this.checked; //checkbox inside "TH" table header

            $('#dynamic-table').find('tbody > tr').each(function() {
                var row = this;
                if (th_checked) myTable.row(row).select();
                else myTable.row(row).deselect();
            });
        });

    //select/deselect a row when the checkbox is checked/unchecked
    $('#dynamic-table').on('click', 'td input[type=checkbox]', function() {
        var row = $(this).closest('tr').get(0);
        if (this.checked) myTable.row(row).deselect();
        else myTable.row(row).select();
    });

    $(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
        e.stopImmediatePropagation();
        e.stopPropagation();
        e.preventDefault();
    });

    //And for the first simple table, which doesn't have TableTools or dataTables
    //select/deselect all rows according to table header checkbox
    var active_class = 'active';
    $('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function() {
        var th_checked = this.checked; //checkbox inside "TH" table header

        $(this).closest('table').find('tbody > tr').each(function() {
            var row = this;
            if (th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0)
                .prop('checked', true);
            else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop(
                'checked', false);
        });
    });

    //select/deselect a row when the checkbox is checked/unchecked
    $('#simple-table').on('click', 'td input[type=checkbox]', function() {
        var $row = $(this).closest('tr');
        if ($row.is('.detail-row ')) return;
        if (this.checked) $row.addClass(active_class);
        else $row.removeClass(active_class);
    });

    /********************************/
    //add tooltip for small view action buttons in dropdown menu
    // $('[data-rel="tooltip"]').tooltip({
    //     placement: tooltip_placement
    // });

    //tooltip placement on right or left
    function tooltip_placement(context, source) {
        var $source = $(source);
        var $parent = $source.closest('table')
        var off1 = $parent.offset();
        var w1 = $parent.width();

        var off2 = $source.offset();
        //var w2 = $source.width();

        if (parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2)) return 'right';
        return 'left';
    }

    /***************/
    $('.show-details-btn').on('click', function(e) {
        e.preventDefault();
        $(this).closest('tr').next().toggleClass('open');
        $(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass(
            'fa-angle-double-up');
    });
    /***************/
</script>





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
@endpush
@endsection
