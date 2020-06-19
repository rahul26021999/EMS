@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		@include('layouts.sidenav')
		<div class="col-sm-8">
			<div class="card">
				<div class="card-header text-center"><b>Search Results</b></div>
				<div class="card-body">
					<table class="table table-hover">
						<thead>
							{{-- <h1>{{$employes->url()}}</h1> --}}
						{{-- 	<ul class="pagination float-right">
								@if ($employes->currentPage()!=1)
									<li class="page-item"><a class="page-link" href="{{$employes->previousPageUrl()}}">Prev</a></li>
								@else
									<li class="page-item disabled"><a class="page-link" href="">Prev</a></li>
								@endif
								@for ($i = 1; $i <=$employes->lastPage(); $i++)
									<li class="page-item {{ $employes->currentPage()==$i ? 'active':'' }}"><a class="page-link" href="{{$employes->url($i)}}">{{$i}}</a></li>
								@endfor
								@if ($employes->currentPage()!=$employes->lastPage())
									<li class="page-item"><a class="page-link" href="{{$employes->nextPageUrl()}}">Next</a></li>
								@else
									<li class="page-item disabled"><a class="page-link" href="">Next</a></li>
								@endif
							</ul>  --}}
							<tr>
								<th>Firstname</th>
								<th>Lastname</th>
								<th>Dob</th>
								<th>Phone Number</th>
								<th>Attachments</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($employes as $employee)
							<tr>
								<td>{{ $employee->first_name }}</td>
								<td>{{ $employee->last_name }}</td>
								<td>{{ $employee->dob }}</td>
								<td>{{ $employee->phone_number }}</td>
								<td>{{$employee->employee_documents_count}}</td>
								<td><a href="{{ route('employee.edit',$employee->id) }}"><span class="badge badge-primary">Edit</span></a><a href="{{ route('employee.show',$employee->id) }}"><span class="ml-2 badge badge-warning">View</span></a></td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection