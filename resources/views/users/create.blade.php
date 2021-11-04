@extends('layouts.app')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create User</h1>
            </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('users.index') }}">User</a></li>
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
                      <h3 class="card-title">User Form</h3>
                    </div>
                    {!! Form::open(array('route' => 'users.store','method'=>'POST','enctype'=>'multipart/form-data')) !!}
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
                                <label for="fname">SO/DO/WO:</label>
                                <input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror" 
                                name="fname" value="{{ old('fname') }}" autocomplete="fname" autofocus placeholder="SO/DO/WO">
                                @error('fname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
                                <label for="phone">Phone #:</label>
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" 
                                name="phone" value="{{ old('phone') }}" autocomplete="phone" autofocus placeholder="Phone #">
                                @error('phone')
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
                                <label for="department">Department:</label><br>
                                <select id="department" name="department" class="select2 @error('roles') is-invalid @enderror">
                                    <option value="">Select Department</option>
                                    @foreach($department as $dep)
                                        <option value="{{ $dep->id }}">
                                            {{ $dep->name }}
                                        </option>
                                    @endforeach
                                </select> 
                                @error('department')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="designation">Designation:</label><br>
                                <select id="designation" name="designation" class="select2 @error('designation') is-invalid @enderror" >
                                    <option value="">Select Designation</option>
                                    @foreach($designation as $des)
                                        <option value="{{ $des->id }}">
                                            {{ $des->name }}
                                        </option>
                                    @endforeach
                                </select> 
                                @error('designation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="password">Password:</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                                name="password" value="{{ old('password') }}" autocomplete="password" autofocus placeholder="Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="password_confirmation">Confirm Password:</label>
                                <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" 
                                name="password_confirmation" value="{{ old('password_confirmation') }}" autocomplete="password_confirmation" 
                                autofocus placeholder="Confirm Password">
                                @error('password_confirmation')
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

                            <div class="col-md-6">
                                <label for="roles">Role:</label><br>
                                <select id="roles[]" name="roles[]" class="select2 @error('roles') is-invalid @enderror"  multiple>
                                    @foreach($roles as $userrow)
                                        <option value="{{ $userrow->name }}">
                                            {{ $userrow->name }}
                                        </option>
                                    @endforeach
                                </select> 
                                @error('roles')
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
