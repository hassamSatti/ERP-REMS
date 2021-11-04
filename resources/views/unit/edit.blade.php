@extends('layouts.app')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Update Unit</h1>
            </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('unit.index') }}">Units</a></li>
                <li class="breadcrumb-item active">Update</li>
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
                    {!! Form::model($unit, ['route' => ['unit.update', $unit->id], 'method'=>'PATCH','enctype'=>'multipart/form-data']) !!}
                    <div class="card-body row">
                        
                        <div class="col-md-4">
                            <label for="project_id">Project:</label><br>
                            <select onChange="sector(this.value)" id="project_id" name="project_id" class="select2 @error('project_id') is-invalid @enderror" >
                                <option value="">Select Project</option>
                                @foreach($project as $cou)
                                    <option  {{ $cou->id == old('project_id') ? 'selected' : ''}} 
                                        {{ $cou->id == $unit->project_id ? 'selected' : ''}} value="{{$cou->id }}">
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
                            <select onChange="street(this.value)" id="sector_id" name="sector_id" class="select2 @error('sector_id') is-invalid @enderror" >
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
                            <select id="street_id" name="street_id" class="select2 @error('street_id') is-invalid @enderror" >
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
                            <select id="size_id" name="size_id" class="select2 @error('size_id') is-invalid @enderror" >
                                <option value="">Select Size</option>
                                @foreach($size as $cou)
                                    <option  {{ $cou->id == old('size_id') ? 'selected' : ''}}
                                        {{ $cou->id == $unit->size_id ? 'selected' : ''}} value="{{$cou->id }}">
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
                            <label for="name">Unit #:</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                            name="name" value="{{ old('name') ?? $unit->name }}" autocomplete="name" autofocus placeholder="Unit #">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="type">Type:</label><br>
                            <select id="type" name="type" class="select2 @error('type') is-invalid @enderror" >
                                <option value="">Select Type </option>
                                <option {{ 1 == old('type') ? 'selected' : ''}}{{ 1 == $unit->type ? 'selected' : ''}} value="1">Residential</option>
                                <option {{ 2 == old('type') ? 'selected' : ''}}{{ 2 == $unit->type ? 'selected' : ''}} value="2">Commercial</option> 
                            </select> 
                            @error('type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="category">Category:</label><br>
                            <select id="category" name="category" class="select2 @error('category') is-invalid @enderror" >
                                <option value="">Select Category </option>
                                <option {{ 1 == old('category') ? 'selected' : ''}}{{ 1 == $unit->category ? 'selected' : ''}} value="1">File</option>
                                <option {{ 2 == old('category') ? 'selected' : ''}}{{ 2 == $unit->category ? 'selected' : ''}} value="2">Plot</option> 
                                <option {{ 3 == old('category') ? 'selected' : ''}}{{ 3 == $unit->category ? 'selected' : ''}} value="3">Shop</option> 
                                <option {{ 4 == old('category') ? 'selected' : ''}}{{ 4 == $unit->category ? 'selected' : ''}} value="4">Apartment</option> 
                                <option {{ 5 == old('category') ? 'selected' : ''}}{{ 5 == $unit->category ? 'selected' : ''}} value="5">Office</option> 
                            </select> 
                            @error('category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="col-md-4">
                            <label for="price">Price:</label>
                            <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" 
                            name="price" value="{{ old('price')?? $unit->price }}" autocomplete="price" autofocus placeholder="Price">
                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <input type="hidden" id="sec_id" value="{{$unit->sector_id}}"/> 
                        <input type="hidden" id="st_id" value="{{$unit->street_id}}"/>    
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
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script>   
    sector({{$unit->project_id}});   
    street({{$unit->sector_id}});           
    function sector(project)
    { 
        $.ajax({
            type: "GET",
            url: "{{ url('getSector') }}?project_id=" + project,
            success: function(res) 
            {
                if (res) 
                {
                    $("#sector_id").empty();
                    $("#sector_id").append('<option>Select Sector</option>');
                    $.each(res, function(key, value) 
                    {
                        sel=''; 
                        if(($("#sec_id").val())==key){sel='selected';}
                        $("#sector_id").append('<option '+sel+'  value="' + key + '">' + value +'</option>');
                    });
                } 
                else 
                {
                    $("#sector_id").empty();
                }
            }
        }); 
    } 
    function street(sector)
    {  
        $.ajax({
            type: "GET",
            url: "{{ url('getStreet') }}?sector_id=" + sector,
            success: function(res) 
            {
                if (res) 
                {
                    $("#street_id").empty();
                    $("#street_id").append('<option>Select Street</option>');
                    $.each(res, function(key, value) 
                    {
                        ste=''; 
                        if(($("#st_id").val())==key){ste='selected';}
                        $("#street_id").append('<option '+ste+' value="' + key + '">' + value +'</option>');
                    });
                } 
                else 
                {
                    $("#street_id").empty();
                }
            }
        }); 
    }    
    </script> 

@endsection


