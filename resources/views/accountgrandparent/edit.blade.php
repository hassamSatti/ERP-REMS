@extends('layouts.app')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Update Project</h1>
            </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('project.index') }}">Projects</a></li>
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
                      <h3 class="card-title">Project Form</h3>
                    </div>
                    {!! Form::model($project, ['route' => ['project.update', $project->id], 'method'=>'PATCH','enctype'=>'multipart/form-data']) !!}
                    <div class="card-body row">
                        <div class="col-md-6">
                            <label for="name">Name:</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                            name="name" value="{{ old('name')?? $project->name }}" autocomplete="name" autofocus placeholder="Name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="type">Relation:</label><br>
                            <select id="type" name="type" class="select2 @error('type') is-invalid @enderror" >
                                <option value="">Select Type </option>
                                <option {{1==$project->type ? 'selected':''}} value="1">Plots</option>
                                <option {{2==$project->type ? 'selected':''}} value="2">Property</option> 
                            </select> 
                            @error('type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                          
                        <div class="col-md-6">
                            <label for="short_code">Short Code:</label>
                            <input id="short_code" type="text" class="form-control @error('short_code') is-invalid @enderror" 
                            name="short_code" value="{{ old('short_code')?? $project->short_code  }}" autocomplete="short_code" 
                            autofocus placeholder="Short Code">
                            @error('short_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="image">Image:</label>
                            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" 
                            name="image" value="{{ old('image')?? $project->image }}">
                            <img src="{{ asset('images/projects/'.$project->image)}}" width="100px">
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


