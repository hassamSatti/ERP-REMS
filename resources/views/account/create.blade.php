@extends('layouts.app')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create Account</h1>
            </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('account.index') }}">Accounts</a></li>
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
                      <h3 class="card-title">Account Form</h3>
                    </div>
                    {!! Form::open(array('route' => 'account.store','method'=>'POST','enctype'=>'multipart/form-data')) !!}
                        <div class="card-body row">

                            

                            <div class="col-md-4">
                                <label for="ap_id">Account Parent:</label><br>
                                <select id="ap_id" name="ap_id" class="select2 @error('ap_id') is-invalid @enderror" >
                                    <option value="">Select Account Project</option>
                                    @foreach($accountparent as $cou)
                                        <option value="{{ $cou->id }}">
                                            {{ $cou->name }} ( {{ $cou->code }} )
                                        </option>
                                    @endforeach
                                </select> 
                                @error('ap_id')
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
                                <label for="code">Code:</label>
                                <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" 
                                name="code" value="{{ old('code') }}" autocomplete="code" 
                                autofocus placeholder="Code">
                                @error('code')
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
