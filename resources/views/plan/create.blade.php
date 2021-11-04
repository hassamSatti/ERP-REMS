@extends('layouts.app')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Unit</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('plan.index') }}">Units</a></li>
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
                            <h3 class="card-title">Unit Form</h3>
                        </div>
                        {!! Form::open(['route' => 'plan.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <div class="card-body row">
                            <div class="card card-primary" style="width: 100%;">
                                <div class="card-header">
                                    <h3 class="card-title">Installment Detail</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
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
                                            <label for="size_id">Size:</label><br>
                                            <select id="size_id" name="size_id"
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
                                            <label for="plan_detail">Plan Detail:</label>
                                            <input id="plan_detail" type="text"
                                                class="form-control @error('plan_detail') is-invalid @enderror"
                                                name="plan_detail" value="{{ old('plan_detail') }}"
                                                autocomplete="plan_detail" autofocus placeholder="Plan Detail">
                                            @error('plan_detail')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <label for="total_amount">Total Amount:</label>
                                            <input id="total_amount" type="text" onBlur="plan()"
                                                class="form-control @error('total_amount') is-invalid @enderror"
                                                name="total_amount" value="{{ old('total_amount') }}"
                                                autocomplete="total_amount" autofocus placeholder="Total Amount">
                                            @error('total_amount')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <label for="rem_amount">Remaining Amount:</label>
                                            <input id="rem_amount" type="text"
                                                class="form-control"
                                                name="rem_amount" 
                                                autocomplete="rem_amount" readonly autofocus placeholder="Remaining Amount"> 
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
                                        <div class="col-md-6">
                                            <div class="col-md-8">
                                                <label for="booking_amount">Booking Amount:</label>
                                                <input id="booking_amount" type="text" class="form-control" onBlur="plan()"
                                                    name="booking_amount" placeholder="Booking Amount">
                                            </div>
                                            <div class="col-md-8">
                                                <label for="allocation_amount">Allocation Amount:</label>
                                                <input id="allocation_amount" type="text" class="form-control" onBlur="plan()"
                                                    name="allocation_amount" placeholder="Allocation Amount">
                                            </div>
                                            <div class="col-md-8">
                                                <label for="confirmation_amount">Confirmation Amount:</label>
                                                <input id="confirmation_amount" type="text" class="form-control" onBlur="plan()"
                                                    name="confirmation_amount" placeholder="Confirmation Amount">
                                            </div>
                                            <div class="col-md-8">
                                                <label for="noi">No. of Installment:</label>
                                                <input id="noi" type="text" class="form-control" name="noi" onBlur="plan()"
                                                    placeholder="No. of Installment">
                                            </div>
                                            <div class="col-md-8">
                                                <label for="monthly_amount">Monthly Amount:</label>
                                                <input id="monthly_amount" type="text" class="form-control" onBlur="plan()"
                                                    name="monthly_amount" placeholder="Monthly Amount">
                                            </div>
                                            <div class="col-md-8">
                                                <label for="quaterly_amount">Quaterly Amount:</label>
                                                <input id="quaterly_amount" type="text" class="form-control" onBlur="plan()"
                                                    name="quaterly_amount" placeholder="Quaterly Amount">
                                            </div>
                                            <div class="col-md-8">
                                                <label for="midyearly_amount">Mid Yearly Amount:</label>
                                                <input id="midyearly_amount" type="text" class="form-control" onBlur="plan()"
                                                    name="midyearly_amount" placeholder="Mid Yearly Amount">
                                            </div>
                                            <div class="col-md-8">
                                                <label for="yearly_amount">Yearly Amount:</label>
                                                <input id="yearly_amount" type="text" class="form-control" onBlur="plan()"
                                                    name="yearly_amount" placeholder="Yearly Amount">
                                            </div>
                                            <div class="col-md-8">
                                                <label for="possession_amount">Possession Amount:</label>
                                                <input id="possession_amount" type="text" class="form-control" onBlur="plan()"
                                                    name="possession_amount" placeholder="Possession Amount">
                                            </div>
                                        </div>
                                        <input type="hidden" id="total_row" name="total_row"/>
                                        <div class="col-md-6">
                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Remarks</th>
                                                        <th>Amount</th> 
                                                    </tr>
                                                </thead>
                                                <tbody id="plan_detail_main">
                                                </tbody>
                                            </table>    
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        </div>
        </div>
        <script>
            function plan() 
            { 
                $("#plan_detail_main").html(''); 
                var total_amount=$("#total_amount").val();
                if(total_amount==''){total_amount=0;}
                var rem_amount=total_amount;


                var table_data='';
                var i=0;

                var booking_amount=$("#booking_amount").val();
                if(booking_amount==''){booking_amount=0;}
                if(booking_amount>0)
                {
                    i++;
                    rem_amount=parseInt(rem_amount)-parseInt(booking_amount);
                    table_data +="<tr><td>"+i+"</td><td><input type='text' style='height: 25px;' class='form-control' name='ins"+i+"' value='Booking Amount'/></td><td><input type='text' style='height: 25px;' class='form-control' name='ins_amount"+i+"' value='"+booking_amount+"'/></td></tr>";
                } 
                var allocation_amount=$("#allocation_amount").val();
                if(allocation_amount==''){allocation_amount=0;}
                if(allocation_amount>0)
                {
                    i++;
                    rem_amount=parseInt(rem_amount)-parseInt(allocation_amount);
                    table_data +="<tr><td>"+i+"</td><td><input type='text' style='height: 25px;' class='form-control' name='ins"+i+"' value='Allocation Amount'/></td><td><input type='text' style='height: 25px;' class='form-control' name='ins_amount"+i+"' value='"+allocation_amount+"'/></td></tr>";
                }
                
                var confirmation_amount=$("#confirmation_amount").val();
                if(confirmation_amount==''){confirmation_amount=0;}
                if(confirmation_amount>0)
                {
                    i++;
                    rem_amount=parseInt(rem_amount)-parseInt(confirmation_amount);
                    table_data +="<tr><td>"+i+"</td><td><input type='text' style='height: 25px;' class='form-control' name='ins"+i+"' value='Confirmation Amount'/></td><td><input type='text' style='height: 25px;' class='form-control' name='ins_amount"+i+"' value='"+confirmation_amount+"'/></td></tr>";
                }

                var noi=$("#noi").val();
                if(noi==''){noi=0;}
                if(noi>0)
                {
                    for(var ii=1;ii<=$("#noi").val();ii++)
                    {
                        var amount=0;
                        i++;
                        var monthly_amount=$("#monthly_amount").val();
                        if(monthly_amount==''){monthly_amount=0;} 

                        var quaterly_amount=$("#quaterly_amount").val();
                        if(quaterly_amount==''){quaterly_amount=0;} 

                        var midyearly_amount=$("#midyearly_amount").val();
                        if(midyearly_amount==''){midyearly_amount=0;} 

                        var yearly_amount=$("#yearly_amount").val();
                        if(yearly_amount==''){yearly_amount=0;} 

                        amount=monthly_amount;

                        if(quaterly_amount>0 && ((ii%3)==0))
                        {
                            amount=parseInt(amount)+parseInt(quaterly_amount); 
                            table_data +="<tr><td>"+i+"</td><td><input type='text' style='height: 25px;' class='form-control' name='ins"+i+"' value='Installment # "+ii+" (Quaterly Added)'/></td><td><input type='text' style='height: 25px;' class='form-control' name='ins_amount"+i+"' value='"+amount+"'/></td></tr>";
                        }
                        else if(midyearly_amount>0 && ((ii%6)==0))
                        {
                            amount=parseInt(amount)+parseInt(midyearly_amount); 
                            table_data +="<tr><td>"+i+"</td><td><input type='text' style='height: 25px;' class='form-control' name='ins"+i+"' value='Installment # "+ii+" (Mid Yearly Added)'/></td><td><input type='text' style='height: 25px;' class='form-control' name='ins_amount"+i+"' value='"+amount+"'/></td></tr>";
                        }
                        else if(yearly_amount>0 && ((ii%12)==0))
                        {
                            amount=parseInt(amount)+parseInt(yearly_amount); 
                            table_data +="<tr><td>"+i+"</td><td><input type='text' style='height: 25px;' class='form-control' name='ins"+i+"' value='Installment # "+ii+" (Yearly Added)'/></td><td><input type='text' style='height: 25px;' class='form-control' name='ins_amount"+i+"' value='"+amount+"'/></td></tr>";
                        }
                        else
                        {                            
                            table_data +="<tr><td>"+i+"</td><td><input type='text' style='height: 25px;' class='form-control' name='ins"+i+"' value='Installment # "+ii+"'/></td><td><input type='text' style='height: 25px;' class='form-control' name='ins_amount"+i+"' value='"+amount+"'/></td></tr>";
                        }
                        
                        rem_amount=parseInt(rem_amount)-parseInt(amount);
                    }
                }
                
                
                var possession_amount=$("#possession_amount").val();
                if(possession_amount==''){possession_amount=0;}
                if(possession_amount>0)
                {
                    i++;
                    rem_amount=parseInt(rem_amount)-parseInt(possession_amount);
                    table_data +="<tr><td>"+i+"</td><td><input type='text' style='height: 25px;' class='form-control' name='ins"+i+"' value='Possession Amount'/></td><td><input type='text' style='height: 25px;' class='form-control' name='ins_amount"+i+"' value='"+possession_amount+"'/></td></tr>";
                }
                $("#rem_amount").val(rem_amount); 
                $("#total_row").val(i); 
                $("#plan_detail_main").append(table_data); 

            } 
        </script>
    @endsection
