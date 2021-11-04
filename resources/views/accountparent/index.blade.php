<?php

//namespace App\Http\Controllers;

use App\Models\Sector;
?>
@extends('layouts.app')
@section('content')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Account Parent List</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('accountparent.index') }}">Account Parent</a></li>
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
                    <a class="btn btn-block btn-success btn-xs" href="{{ route('accountparent.create') }}">Create Account Parent<a/>
                </div>
            </div>    
            <div class="card-body">
              <table id="data_table" class="table table-bordered table-hover">
                <thead>
                    <tr> 
                        <th>Account Grand Parent</th>
                        <th>Account Parent Name</th>  
                        <th>Code</th>   
                        <th>Detail</th>   
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($data as $key => $accountparent)                         
                            <tr>  
                                <td>{{ $accountparent->aname }}</td> 
                                <td>{{ $accountparent->name }}</td> 
                                <td>{{ $accountparent->code }}</td> 
                                <td>{{ $accountparent->detail }}</td> 
                                <td> 
                                    @can('Inventory Edit')
                                        <a class="btn btn-primary btn-xs" href="{{ route('accountparent.edit',$accountparent->id) }}">Edit</a>
                                    @endcan
                                    @can('Inventory Delete')
                                        {!! Form::open(['method' => 'DELETE','route' => ['accountparent.destroy', $accountparent->id],'style'=>'display:inline']) !!}
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