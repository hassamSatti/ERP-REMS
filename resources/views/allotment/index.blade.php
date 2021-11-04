@extends('layouts.app')
@section('content')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Memberships List</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('allotment.index') }}">Memberships</a></li>
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
                    <a class="btn btn-block btn-success btn-xs" href="{{ route('allotment.create') }}">Create Membership<a/>
                </div>
            </div>    
            <div class="card-body">
              <table id="data_table_allotments" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th style="width: 5%;">#</th>
                        <th>Membership #</th>
                        <th>Member Name</th>
                        <th>Member CNIC</th>
                        <th>Project</th>
                        <th>Sector</th>
                        <th>Street</th>
                        <th>Unit #</th>
                        <th>Size</th> 
                    </tr>
                </thead>
                {{-- <tbody>
                        @foreach ($data as $key => $unit)
                            <tr>
                                <td>{{ $unit->id }}</td>
                                <td>{{ $unit->pname }}</td>
                                <td>{{ $unit->secname }}</td>
                                <td>{{ $unit->sname }}</td>
                                <td>{{ $unit->siname }}</td>
                                <td>{{ $unit->uname }}</td>
                                <td>{{ $unit->price }}</td> 
                                <td> 
                                    @can('Inventory Edit')
                                        <a class="btn btn-primary btn-xs" href="{{ route('unit.edit',$unit->id) }}">Edit</a>
                                    @endcan
                                    @can('Inventory Delete')
                                        {!! Form::open(['method' => 'DELETE','route' => ['unit.destroy', $unit->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody> --}}
                </table>
            </div>
            <!-- /.card-body 
          </div>
                {{-- {{ $data->render() }} --}}
            </div>-->
        </div>
    </div>
</section>
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script type="text/javascript"> 
  $(document).ready(function(){

      // DataTable
     $('#data_table_allotments').DataTable({
          "pageLength": 25,
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
          processing: true,
          serverSide: true,
          ajax: "{{route('getAllotments')}}",
          columns: [
              { data: 'id' },
              { data: 'memname' },  
              { data: 'mname' },  
              { data: 'mcnic' },  
              { data: 'pname' },
              { data: 'secname' },
              { data: 'sname' },
              { data: 'uname' },
              { data: 'siname' }, 
          ]
      });

   });
   </script>
@endsection