@extends('layouts.app')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Allotment</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('allotment.index') }}">Allotments</a></li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <!--
                                <section>
                                    @if (count($errors) > 0)
                                        <div class="alert alert-danger">
                                            <strong>Opps!</strong> Something went wrong, please check below errors.<br><br>
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </section>  
                                -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Allotment Form</h3>
                        </div>
                        {!! Form::open(['route' => 'allotment.store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'allotment_form_validate']) !!}
                        <div class="card-body row">
                            <div class="card card-primary" style="width: 100%;">
                                <div class="card-header">
                                    <h3 class="card-title">Inventory Detail</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-md-4">
                                            <label for="category">Category:</label><br>
                                            <select onChange="change_category(this.value)" id="category" name="category"
                                                class="select2 @error('category') is-invalid @enderror">
                                                <option {{ 1 == old('category') ? 'selected' : '' }} value="1">Unit
                                                </option>
                                                <option {{ 2 == old('category') ? 'selected' : '' }} value="2">File
                                                </option>
                                            </select>
                                            @error('category')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <label for="type">Type:</label><br>
                                            <select id="type" name="type"
                                                class="select2 @error('type') is-invalid @enderror">
                                                <option value="">Select Type </option>
                                                <option {{ 1 == old('type') ? 'selected' : '' }} value="1">Residential
                                                </option>
                                                <option {{ 2 == old('type') ? 'selected' : '' }} value="2">Commercial
                                                </option>
                                            </select>
                                            @error('type')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <label for="project_id">Project:</label><br>
                                            <select onChange="sector(this.value)" id="project_id" name="project_id"
                                                class="select2 @error('project_id') is-invalid @enderror">
                                                <option value="">Select Project</option>
                                                @foreach ($project as $cou)
                                                    <option {{ $cou->id == old('project_id') ? 'selected' : '' }}
                                                        value="{{ $cou->id }}">
                                                        {{ $cou->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('project_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <label for="sector_id">Sector:</label><br>
                                            <select onChange="street(this.value)" id="sector_id" name="sector_id"
                                                class="select2 @error('sector_id') is-invalid @enderror">
                                                <option value="">Select Sector</option>
                                            </select>
                                            @error('sector_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <label for="street_id">Street:</label><br>
                                            <select id="street_id" name="street_id"
                                                class="select2 @error('street_id') is-invalid @enderror">
                                                <option value="">Select Street</option>
                                            </select>
                                            @error('street_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <label for="size_id">Size:</label><br>
                                            <select id="size_id" name="size_id" onChange="unit()"
                                                class="select2 @error('size_id') is-invalid @enderror">
                                                <option value="">Select Size</option>
                                                @foreach ($size as $cou)
                                                    <option {{ $cou->id == old('size_id') ? 'selected' : '' }}
                                                        value="{{ $cou->id }}">
                                                        {{ $cou->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('size_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-md-4" id="unit_id_div">
                                            <label for="unit_id">Unit:</label><br>
                                            <select onChange="msno()" id="unit_id" name="unit_id"
                                                class="select2 @error('unit_id') is-invalid @enderror">
                                                <option value="">Select Unit</option>
                                            </select>
                                            @error('unit_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-md-4" id="file_no_div" style="display:none;">
                                            <label for="file_no">File #:</label>
                                            <input id="file_no" type="text" onBlur="msno()"
                                                class="form-control @error('file_no') is-invalid @enderror" name="file_no"
                                                value="{{ old('file_no') }}" autocomplete="file_no" autofocus
                                                placeholder="File #">
                                            @error('file_no')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <label for="allotment_no">Membership #:</label>
                                            <input id="allotment_no" type="text" readonly
                                                class="form-control @error('allotment_no') is-invalid @enderror"
                                                name="allotment_no" value="{{ old('allotment_no') }}"
                                                autocomplete="allotment_no" autofocus placeholder="Membership #">
                                            @error('allotment_no')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label for="allotment_date">Allotment Date:</label>
                                            <input id="allotment_date" type="date" value="{{ date('d/M/Y') }}"
                                                class="form-control @error('plan_date') is-invalid @enderror"
                                                name="allotment_date" value="{{ old('allotment_date') }}"
                                                autocomplete="allotment_date" autofocus placeholder="Net Price">
                                            @error('allotment_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <label for="remarks">Remarks:</label>
                                            <input id="remarks" type="text" 
                                                class="form-control @error('remarks') is-invalid @enderror"
                                                name="remarks" value="{{ old('remarks') }}"
                                                autocomplete="remarks" autofocus placeholder="Remarks">
                                            @error('remarks')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card card-primary" style="width: 100%;">
                                <div class="card-header">
                                    <h3 class="card-title">Inventory Price Detail</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-md-4">
                                            <label for="unit_price">Unit Price:</label>
                                            <input id="unit_price" type="text" value="0" onBlur="calculate_net_price()"
                                                class="form-control @error('unit_price') is-invalid @enderror"
                                                name="unit_price" value="{{ old('unit_price') }}"
                                                autocomplete="unit_price" autofocus placeholder="Unit Price">
                                            @error('unit_price')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <label for="features">Features:</label><br>
                                            <select id="features" name="features" multiple
                                                class="select2 @error('features') is-invalid @enderror">
                                                <option {{ 1 == old('features') ? 'selected' : '' }} value="1">Corner
                                                </option>
                                                <option {{ 2 == old('features') ? 'selected' : '' }} value="2">Main Road
                                                </option>
                                            </select>
                                            @error('features')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <label for="extra_charges">Extra Charges:</label>
                                            <input id="extra_charges" type="text" value="0" onBlur="calculate_net_price()"
                                                class="form-control @error('extra_charges') is-invalid @enderror"
                                                name="extra_charges" value="{{ old('extra_charges') }}"
                                                autocomplete="extra_charges" autofocus placeholder="Extra Charges">
                                            @error('extra_charges')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <label for="discount">Discount:</label>
                                            <input id="discount" type="text" value="0" onBlur="calculate_net_price()"
                                                class="form-control @error('extra_charges') is-invalid @enderror"
                                                name="discount" value="{{ old('discount') }}" autocomplete="discount"
                                                autofocus placeholder="Discount">
                                            @error('discount')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <label for="net_price">Net Price:</label>
                                            <input id="net_price" type="text" readonly value="0"
                                                class="form-control @error('net_price') is-invalid @enderror"
                                                name="net_price" value="{{ old('net_price') }}" autocomplete="net_price"
                                                autofocus placeholder="Net Price">
                                            @error('net_price')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                            </div>


                            <div class="card card-primary" style="width: 100%;">
                                <div class="card-header">
                                    <h3 class="card-title">Member Detail</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-md-4">
                                            <label for="member_id">Member CNIC:</label>
                                            <input id="member_id" type="text" onBlur="member_search(this.value)"
                                                class="form-control @error('member_id') is-invalid @enderror"
                                                name="member_id" value="{{ old('member_id') }}" autocomplete="member_id"
                                                autofocus placeholder="Member CNIC">
                                            @error('member_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <label for="member_name">Member Name:</label>
                                            <input id="member_name" type="text" readonly class="form-control"
                                                name="member_name" autocomplete="member_name" autofocus
                                                placeholder="Member Name">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="member_sodowo">SO/DO/WO:</label>
                                            <input id="member_sodowo" type="text" readonly class="form-control"
                                                name="member_sodowo" autocomplete="member_sodowo" autofocus
                                                placeholder="SO/DO/WO">
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="card card-primary" style="width: 100%;">
                                <div class="card-header">
                                    <h3 class="card-title">Payment Detail</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-md-4">
                                            <label for="payment_type">Payment Type:</label><br>
                                            <select onChange="select_plan(this.value)" id="payment_type" name="payment_type"
                                                class="select2 @error('payment_type') is-invalid @enderror">
                                                <option {{ 1 == old('payment_type') ? 'selected' : '' }} value="1">
                                                    Lumpsum
                                                </option>
                                                <option {{ 2 == old('payment_type') ? 'selected' : '' }} value="2">
                                                    Installment
                                                </option>
                                            </select>
                                            @error('payment_type')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4" id="installment_plan_div" style="display:none;">
                                            <label for="installment_plan">Installment Plan:</label><br>
                                            <select id="installment_plan" name="installment_plan"
                                                class="select2 @error('installment_plan') is-invalid @enderror">
                                                <option value="">Select Installment Plan</option>
                                            </select>
                                            @error('installment_plan')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-md-4" id="plan_date_div" style="display:none;">
                                            <label for="plan_date">Plan Start Date:</label>
                                            <input id="plan_date" type="date" value="{{ date('d/M/Y') }}"
                                                class="form-control @error('plan_date') is-invalid @enderror"
                                                name="plan_date" value="{{ old('plan_date') }}" autocomplete="plan_date"
                                                autofocus placeholder="Net Price">
                                            @error('plan_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="card card-primary" style="width: 100%;">
                                <div class="card-header">
                                    <h3 class="card-title">Rebate Detail</h3>
                                    <div class="card-tools">
                                        <ul class="pagination pagination-sm float-right">
                                            <li class="page-item">
                                                <button id="add_rebate_tr" type="button"
                                                    class="btn btn-block btn-success btn-xs">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </li>
                                            <li class="page-item">
                                                <button id="remove_rebate_tr" type="button"
                                                    class="btn btn-block bg-gradient-danger btn-xs">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">

                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <th>Dealer</th>
                                                <th>Remarks</th>
                                                <th>Rebate Amount</th>
                                            </thead>
                                            <tbody id="rebate_tbody">

                                            </tbody>
                                            <input type="hidden" name="total_rebate_row" id="total_rebate_row" />
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <button style="display:none;" id="danger_alert" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger">
                        Launch Danger Modal
                      </button>
                </div>
            </div>
        </div>
        </div>
        <div class="modal fade" id="modal-danger">
            <div class="modal-dialog">
                <div class="modal-content bg-danger">
                    <div class="modal-header">
                        <h4 class="modal-title">Error Alerts</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body"  id="error_data" style="text-align: center;">  
                    </div> 
                </div> 
            </div> 
        </div>
        <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
        <script>
            $('#allotment_form_validate').on('submit', function(e) 
            {
                e.preventDefault();
                error = '';
                if ($("#category").val() == '') 
                {
                    error += '<b>Please Select Category</b> <br>'; 
                } 
                if ($("#type").val() == '') 
                {
                    error += '<b>Please Select Type</b> <br>'; 
                } 
                if ($("#project_id").val() == '') 
                {
                    error += '<b>Please Select Project</b> <br>'; 
                }  
                if ($("#sector_id").val() == '') 
                {
                    error += '<b>Please Select Sector</b> <br>'; 
                } 
                if ($("#street_id").val() == '') 
                {
                    error += '<b>Please Select Street/Floor</b> <br>'; 
                } 
                if ($("#size_id").val() == '') 
                {
                    error += '<b>Please Select Size</b> <br>'; 
                }  
                if ($("#unit_id").val() == '' && $("#category").val() == 1) 
                {
                    error += '<b>Please Select Unit</b> <br>'; 
                }  
                if ($("#file_no").val() == '' && $("#category").val() == 2) 
                {
                    error += '<b>Please Add File #</b> <br>'; 
                } 
                if ($("#allotment_no").val() == '') 
                {
                    error += '<b>Please Add Allotment File #</b> <br>'; 
                } 
                if ($("#allotment_date").val() == '') 
                {
                    error += '<b>Please Add Allotment Date</b> <br>'; 
                } 
                if ($("#remarks").val() == '') 
                {
                    error += '<b>Please Add Remarks</b> <br>'; 
                } 
                if ($("#member_id").val() == '') 
                {
                    error += '<b>Please Add Member CNIC</b> <br>'; 
                } 
                if ($("#member_id").val() != '' && $("#member_name").val() == '') 
                {
                    error += '<b>Please Add Correct Member CNIC</b> <br>'; 
                }
                if ($("#net_price").val() == 0 || isNaN($("#net_price").val()))  
                {
                    error += '<b>Please Add Inventory Price</b> <br>'; 
                }   
                if ($("#payment_type").val() == 2) 
                {
                    if ($("#installment_plan").val() == '') 
                    {
                        error += '<b>Please Select Plan</b> <br>'; 
                    }
                    if ($("#plan_date").val() == '') 
                    {
                        error += '<b>Please Select Plan Date</b> <br>'; 
                    }
                }  
                if ($("#total_rebate_row").val()>0) 
                {
                    for(var i=1;i<=parseInt($("#total_rebate_row").val());i++)
                    {
                        if ($("#rebate_dealer"+i).val() == '') 
                        {
                            error += '<b>Please Select Rebate Dealer On Row '+i+'</b> <br>'; 
                        } 
                        if ($("#rebate_remarks"+i).val() == '') 
                        {
                            error += '<b>Please Select Rebate Remarks On Row '+i+'</b> <br>'; 
                        }  
                        if ($("#rebate_amount"+i).val() == '') 
                        {
                            error += '<b>Please Select Rebate Amount On Row '+i+'</b> <br>'; 
                        }    
                    }
                }
                if(error!='')
                {
                    $("#error_data").html(error);
                    $("#danger_alert").click();
                    return false;
                }
                else
                {
                    $("#allotment_form_validate").submit();  
                }
            });



            var dealer = '';
            @foreach ($dealer as $deal)
                dealer+='<option value={{ $deal->id }}>{{ $deal->name }}</option>';
            @endforeach
            var i_rebate = 0;
            jQuery("#add_rebate_tr").on("click", function(e) {
                i_rebate = i_rebate + 1;
                document.getElementById("total_rebate_row").value = i_rebate;
                var innermyspan = document.getElementById("rebate_tbody").innerHTML;
                $('#rebate_tbody').append('<tr><td><select class="select2" name="rebate_dealer' + i_rebate + '" id="rebate_dealer' + i_rebate + '">' + dealer +'</select></td><td><input type="text" class="form-control" name="rebate_remarks' +i_rebate + '" id="rebate_remarks' +i_rebate + '"/></td><td><input type="text" class="form-control" name="rebate_amount' +i_rebate + '" id="rebate_amount' +i_rebate + '"/></td></tr>');
                $(".select2").select2({});
            });
            jQuery("#remove_rebate_tr").on("click", function(e) {
                document.getElementById("rebate_tbody").deleteRow((i_rebate - 1));
                if (i_rebate > 0) {
                    i_rebate = i_rebate - 1;
                }
                document.getElementById("total_rebate_row").value = i_rebate;
            });

            function change_category(cat) {
                if (cat == 1) {
                    $("#unit_id_div").css("display", "block");
                    $("#file_no_div").css("display", "none");
                }
                if (cat == 2) {
                    $("#file_no_div").css("display", "block");
                    $("#unit_id_div").css("display", "none");
                }

            }

            function select_plan(ptype) {
                if (ptype == 1) {
                    $("#installment_plan_div").css("display", "none");
                    $("#plan_date_div").css("display", "none");
                }
                if (ptype == 2) {
                    $("#installment_plan_div").css("display", "block");
                    $("#plan_date_div").css("display", "block");
                }

            }

            function sector(project) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('getSector') }}?project_id=" + project,
                    success: function(res) {
                        if (res) {
                            $("#sector_id").empty();
                            $("#sector_id").append('<option value="">Select Sector</option>');
                            $.each(res, function(key, value) {
                                $("#sector_id").append('<option value="' + key + '">' + value +
                                    '</option>');
                            });
                        } else {
                            $("#sector_id").empty();
                        }
                    }
                });
            }

            function street(sector) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('getStreet') }}?sector_id=" + sector,
                    success: function(res) {
                        if (res) {
                            $("#street_id").empty();
                            $("#street_id").append('<option value="">Select Street</option>');
                            $.each(res, function(key, value) {
                                $("#street_id").append('<option value="' + key + '">' + value +
                                    '</option>');
                            });
                        } else {
                            $("#street_id").empty();
                        }
                    }
                });
            }


            function unit() {
                var type = $("#type").val();
                var project = $("#project_id").val();
                var sector = $("#sector_id").val();
                var street = $("#street_id").val();
                var size = $("#size_id").val();
                $.ajax({
                    type: "GET",
                    url: "{{ url('getUnit') }}?type=" + type + "&project=" + project + "&sector=" + sector +
                        "&street=" + street + "&size=" + size,
                    success: function(res) {
                        if (res) {
                            $("#unit_id").empty();
                            $("#unit_id").append('<option value="">Select Unit</option>');
                            $.each(res, function(key, value) {
                                $("#unit_id").append('<option value="' + key + '">' + value +
                                    '</option>');
                            });
                        } else {
                            $("#unit_id").empty();
                        }
                    }
                });

                $.ajax({
                    type: "GET",
                    url: "{{ url('getPlan') }}?project=" + project + "&size=" + size,
                    success: function(res) {
                        if (res) {
                            $("#installment_plan").empty();
                            $("#installment_plan").append('<option value="">Select Plan</option>');
                            $.each(res, function(key, value) {
                                $("#installment_plan").append('<option value="' + key + '">' + value +
                                    '</option>');
                            });
                        } else {
                            $("#installment_plan").empty();
                        }
                    }
                });
            }



            function msno() {
                var type = $("#type").val();
                var project = $("#project_id").val();
                var size = $("#size_id").val();
                $.ajax({
                    type: "GET",
                    url: "{{ url('getMsno') }}?type=" + type + "&project=" + project + "&size=" + size,
                    success: function(res) {
                        if (res) {
                            $("#allotment_no").empty();
                            $("#allotment_no").val(res);
                        } else {
                            $("#allotment_no").empty();
                        }
                    }
                });

                var unit = $("#unit_id").val();
                $.ajax({
                    type: "GET",
                    url: "{{ url('getUnitprice') }}?unit=" + unit,
                    success: function(res) {
                        if (res) {
                            $("#unit_price").empty();
                            $("#unit_price").val(res);
                        } else {
                            $("#unit_price").empty();
                        }
                    }
                });
            }

            function member_search(cnic) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('getMembercnic') }}?cnic=" + cnic,
                    success: function(res) {
                        if (res) {
                            $.each(res, function(key, value) 
                            {
                                $("#member_name").empty();
                                $("#member_name").val(key);
                                $("#member_sodowo").empty();
                                $("#member_sodowo").val(value);
                            });
                        } else {
                            $("#member_name").empty();
                            $("#member_sodowo").empty();
                        }
                    }
                });
            }

            function calculate_net_price() {
                var unit_price = $("#unit_price").val();
                var extra_charges = $("#extra_charges").val();
                var discount = $("#discount").val();

                if (unit_price == '') {
                    unit_price = 0;
                }
                if (extra_charges == '') {
                    extra_charges = 0;
                }
                if (discount == '') {
                    discount = 0;
                }

                $net_price = ((parseInt(unit_price) + parseInt(extra_charges)) - parseInt(discount));

                $("#net_price").val($net_price);
                $("#amount").val($net_price);
            }
        </script>
    @endsection
