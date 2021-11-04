@extends('layouts.app')
@section('content')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Plans List</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('plan.index') }}">Plans</a></li>
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
                    <a class="btn btn-block btn-success btn-xs" href="{{ route('plan.create') }}">Create Plan<a/>
                </div>
            </div>    
            <div class="card-body">
              <table id="data_table" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th style="width: 5%;">#</th>
                        <th>Project</th> 
                        <th>Size</th>
                        <th>Plan Detail</th>
                        <th>No. of  Installment</th>  
                        <th>Total Amount</th>  
                        <th style="width: 10%;">Action</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($data as $key => $plan)
                            <tr>
                                <td>{{ $plan->id }}</td>
                                <td>{{ $plan->pname }}</td> 
                                <td>{{ $plan->sname }}</td>
                                <td>{{ $plan->plan_detail }}</td>
                                <td>{{ $plan->noi }}</td> 
                                <td>{{ $plan->total_amount }}</td> 
                                <td>  
                                  <a class="btn btn-success btn-xs" href="{{ route('plan.show',$plan->id) }}">Show</a>
                                    @can('Inventory Delete')
                                        {!! Form::open(['method' => 'DELETE','route' => ['plan.destroy', $plan->id],'style'=>'display:inline']) !!}
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
                {{-- {{ $data->render() }} --}}
            </div>-->
        </div>
    </div>
</section>
 @endsection