@extends('layouts.app')
@section('content')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Designation List</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('designation.index') }}">Designation</a></li>
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
                    <a class="btn btn-block btn-success btn-xs" href="{{ route('designation.create') }}">Create Designation<a/>
                </div>
            </div>    
            <div class="card-body">
              <table id="data_table" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $designation)
                            <tr>
                                <td>{{ $designation->id }}</td>
                                <td>{{ $designation->name }}</td>
                                <td>
                                     
                                        <a class="btn btn-primary btn-xs" href="{{ route('designation.edit',$designation->id) }}">Edit</a>
                                     
                                        {!! Form::open(['method' => 'DELETE','route' => ['designation.destroy', $designation->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                                        {!! Form::close() !!}
                                     
                                </td>
                            </tr>
                        @endforeach
                </tbody>
                </table>
            </div>
            <!-- /.card-body 
            </div>
                {{ $data->render() }}
            </div>
            -->
        </div>
    </div>
</section>
@endsection


