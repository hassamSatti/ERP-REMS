@extends('layouts.app')
@section('content')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Roles List</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
            <li class="breadcrumb-item active">List</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!-- /.card-header -->
                
            <div class="card-body">
                <div class="lead">
                    <strong>Name:</strong>
                    {{ $role->name }}
                </div>
                <div class="lead">
                    <strong>Permissions:</strong><br>   
                    @if(!empty($rolePermissions))
                    <div class="row"> 
                        @foreach($rolePermissions as $permission)
                        <div class="col-md-2"> 
                            <label class="badge badge-success">{{ $permission->name }}</label>
                        </div>    
                        @endforeach
                    </div>    
                    @endif
                </div>
            </div>
            <!-- /.card-body 
          </div> 
            </div>
            -->
        </div>
    </div>
</section>
@endsection





