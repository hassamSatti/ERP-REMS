@extends('layouts.app')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create Member</h1>
            </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('member.index') }}">Members</a></li>
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
                      <h3 class="card-title">Member Form</h3>
                    </div>
                    {!! Form::open(array('route' => 'member.store','method'=>'POST','enctype'=>'multipart/form-data')) !!}
                        <div class="card-body row">
                            <div class="col-md-6">
                                <label for="name">Name:</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                                name="name" value="{{ old('name') }}" autocomplete="name" autofocus placeholder="Name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="relation">Relation:</label><br>
                                <select id="relation" name="relation" class="select2 @error('relation') is-invalid @enderror" >
                                    <option value="">Select Relation </option>
                                    <option value="1">S/O</option>
                                    <option value="2">D/O</option>
                                    <option value="3">Spouse</option>
                                </select> 
                                @error('relation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="col-md-6">
                                <label for="sodowo">SO/DO/WO:</label>
                                <input id="sodowo" type="text" class="form-control @error('sodowo') is-invalid @enderror" 
                                name="sodowo" value="{{ old('sodowo') }}" autocomplete="sodowo" autofocus placeholder="SO/DO/WO">
                                @error('sodowo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">                                    
                                <label for="dob">DOB:</label>
                                {{-- <div class="input-group date" id="reservationdate" data-target-input="nearest"> --}}
                                    <input id="dob" type="date"  class="form-control @error('dob') is-invalid @enderror" 
                                    name="dob" value="{{ old('dob') }}" autocomplete="dob" autofocus placeholder="DOB">
                                    
                                    @error('dob')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                {{-- </div>                                 --}}
                            </div>

                            <div class="col-md-6">
                                <label for="cnic">CNIC:</label>
                                <input id="cnic" type="text" class="form-control @error('cnic') is-invalid @enderror" 
                                name="cnic" value="{{ old('cnic') }}" autocomplete="cnic" autofocus placeholder="CNIC">
                                @error('cnic')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="email">Email:</label>
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" 
                                name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="sec_phone">Secondary Phone #:</label>
                                <input id="sec_phone" type="text" class="form-control @error('sec_phone') is-invalid @enderror" 
                                name="sec_phone" value="{{ old('sec_phone') }}" autocomplete="sec_phone" autofocus placeholder="Secondary Phone #">
                                @error('sec_phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="pri_phone">Primary Phone #:</label>
                                <input id="pri_phone" type="text" class="form-control @error('pri_phone') is-invalid @enderror" 
                                name="pri_phone" value="{{ old('pri_phone') }}" autocomplete="pri_phone" autofocus placeholder="Primary Phone #">
                                @error('pri_phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="address">Address:</label>
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" 
                                name="address" value="{{ old('address') }}" autocomplete="address" autofocus placeholder="Address">
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>  

                            <div class="col-md-6">
                                <label for="country">Country:</label><br>
                                <select id="country" name="country" class="select2 @error('country') is-invalid @enderror" >
                                    <option value="">Select Country</option>
                                    @foreach($country as $cou)
                                        <option value="{{ $cou->id }}">
                                            {{ $cou->name }}
                                        </option>
                                    @endforeach
                                </select> 
                                @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="city">City:</label><br>
                                <select id="city" name="city" class="select2 @error('city') is-invalid @enderror" >
                                    <option value="">Select City</option>
                                    @foreach($city as $cit)
                                        <option value="{{ $cit->id }}">
                                            {{ $cit->name }}
                                        </option>
                                    @endforeach
                                </select> 
                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>                            
                            

                            <div class="col-md-6">
                                <label for="image">Image:</label>
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" 
                                name="image" value="{{ old('image') }}">
                                @error('image')
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
