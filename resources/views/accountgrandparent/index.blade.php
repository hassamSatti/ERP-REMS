@extends('layouts.app')
@section('content')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Account Grand Parent List</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            {{-- <li class="breadcrumb-item"><a href="{{ route('accountgrandparent.index') }}">Account Grand Parent</a></li> --}}
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
                    <a class="btn btn-block btn-success btn-xs" href="{{ route('accountgrandparent.create') }}">Create Account Grand Parent<a/>
                </div>
            </div>    
            <div class="card-body">
              <table class="table table-bordered table-hover">
                <thead>
                    <tr> 
                        <th>Name</th> 
                        <th>Code</th>
                        <th>Detail</th>   
                    </tr>
                </thead>
                <tbody>
                        @foreach ($data as $key => $accountgrandparent)
                            <tr> 
                                <td>{{ $accountgrandparent->name }}</td> 
                                <td>{{ $accountgrandparent->code }}</td>  
                                <td>{{ $accountgrandparent->detail }}</td>  
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