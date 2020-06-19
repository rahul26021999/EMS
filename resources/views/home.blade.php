@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include('layouts.sidenav')
        <div class="col-sm-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <h4>Total Employes <span class="badge badge-success">{{$employee_count}}</span> </h4>
                    <a href="{{ route('employee.create') }}" class="btn btn-primary mt-3">Add Employee</a>
                    <a href="{{ route('employee.index') }}" class="btn btn-danger mt-3 ml-2">Show all</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
