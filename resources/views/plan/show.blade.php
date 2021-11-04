@extends('layouts.app')
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Plan</h1>
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
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr> 
                                        <th>Project</th>
                                        <th>Size</th>
                                        <th>Plan Detail</th>
                                        <th>No. of Installment</th>
                                        <th>Total Amount</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $project->name }}</td>
                                        <td>{{ $size->name }}</td> 
                                        <td>{{ $plan->plan_detail }}</td>
                                        <td>{{ $plan->noi }}</td>
                                        <td>{{ $plan->total_amount }}</td>
                                    </tr>
                                </tbody>
                            </table>

                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr> 
                                        <th>#</th>
                                        <th>Remarks</th>
                                        <th>Amount</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($plan_sub as $plan_sub_row)
                                    <tr>
                                        <td>{{ $plan_sub_row->id }}</td>
                                        <td>{{ $plan_sub_row->remarks }}</td> 
                                        <td>{{ $plan_sub_row->amount }}</td> 
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
    </section>
@endsection
