@extends('layouts.app')
@section('content')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Projects List</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('project.index') }}">Projects</a></li>
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
            <div class="card-header">
                <div class="card-tools">
                    <a class="btn btn-block btn-success btn-xs" href="{{ route('project.create') }}">Create Project<a/>
                </div>
            </div>    
            <div class="card-body">
              <table id="data_table" class="table table-bordered table-hover">
                <thead>
                    <tr> 
                        <th>Name</th>
                        <th>Type</th> 
                        <th>Short Code</th>  
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($data as $key => $project)
                            <tr> 
                                <td>{{ $project->name }}</td>
                                <td>{{ $project->type==1 ? 'Plot' : '' }} {{ $project->type==2 ? 'Property' : '' }} </td> 
                                <td>{{ $project->short_code }}</td> 
                                <td> 
                                    @can('Inventory Edit')
                                        <a class="btn btn-primary btn-xs" href="{{ route('project.edit',$project->id) }}">Edit</a>
                                    @endcan
                                    @can('Inventory Delete')
                                        {!! Form::open(['method' => 'DELETE','route' => ['project.destroy', $project->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body 
          </div>
                {{ $data->render() }}
            </div>-->
        </div>
    </div>
</section>
@endsection