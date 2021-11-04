@extends('layouts.app')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create Sector/Block</h1>
            </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('sector.index') }}">Sectors/Blocks</a></li>
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
                      <h3 class="card-title">Sector/Block Form</h3>
                    </div>
                    {!! Form::open(array('route' => 'sector.store','method'=>'POST','enctype'=>'multipart/form-data')) !!}
                        <div class="card-body row">

                            

                            <div class="col-md-4">
                                <label for="project_id">Project:</label><br>
                                <select id="project_id" name="project_id" class="select2 @error('project_id') is-invalid @enderror" >
                                    <option value="">Select Project</option>
                                    @foreach($project as $cou)
                                        <option value="{{ $cou->id }}">
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
