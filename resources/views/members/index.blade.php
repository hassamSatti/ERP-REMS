@extends('layouts.app')
@section('content')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Members List</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('member.index') }}">Members</a></li>
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
                    <a class="btn btn-block btn-success btn-xs" href="{{ route('member.create') }}">Create Member<a/>
                </div>
            </div>    
            <div class="card-body">
              <table id="data_table" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>SO/DO/WO</th> 
                        <th>CNIC</th> 
                        <th>Email</th> 
                        <th>Address</th> 
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($data as $key => $member)
                            <tr>
                                <td>{{ $member->id }}</td>
                                <td>{{ $member->name }}</td>
                                <td>{{ $member->sodowo }}</td>
                                <td>{{ $member->cnic }}</td>
                                <td>{{ $member->email }}</td> 
                                <td>{{ $member->address }}</td>
                                <td> 
                                    @can('Member Edit')
                                        <a class="btn btn-primary btn-xs" href="{{ route('member.edit',$member->id) }}">Edit</a>
                                    @endcan
                                    @can('Member Delete')
                                        {!! Form::open(['method' => 'DELETE','route' => ['member.destroy', $member->id],'style'=>'display:inline']) !!}
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