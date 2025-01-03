@extends('layouts.app')
@section('content')
<div class="container">
    <div class="justify-content-center">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div>
        @endif
        <div class="card">
            <div class="card-header">City
                @can('role-create')
                    <span class="float-right">
                        <a class="btn btn-primary" href="{{ route('city.index') }}">Back</a>
                    </span>
                @endcan
            </div>
            <div class="card-body">
                <div class="lead">
                    <strong>Name:</strong>
                    {{ $city->name }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection