@extends('layouts.app')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create Street/Floor</h1>
            </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('street.index') }}">Streets/Floors</a></li>
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
                      <h3 class="card-title">Street/Floor Form</h3>
                    </div>
                    {!! Form::open(array('route' => 'street.store','method'=>'POST','enctype'=>'multipart/form-data')) !!}
                        <div class="card-body row">
  
                            <div class="col-md-4">
                                <label for="sector_id">Sector:</label><br>
                                <select id="sector_id" name="sector_id" class="select2 @error('sector_id') is-invalid @enderror" >
                                    <option value="">Select Sector</option>
                                    @foreach($sector as $cou)
                                        <option value="{{$cou->id}}" {{ $cou->id == old('sector_id') ? 'selected' : ''}}>
                                            {{ $cou->name }}
                                        </option>
                                    @endforeach
                                </select> 
                                @error('sector_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="name">Name:</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                                name="name" value="{{ old('name') }}" autocomplete="name" autofocus placeholder="Name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="col-md-4">
                                <label for="detail">Detail:</label>
                                <input id="detail" type="text" class="form-control @error('detail') is-invalid @enderror" 
                                name="detail" value="{{ old('detail') }}" autocomplete="detail" 
                                autofocus placeholder="Detail">
                                @error('detail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
@endsection
