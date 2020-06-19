@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		@include('layouts.sidenav')
		<div class="col-sm-8">
			<div class="card">
				<div class="card-header text-center" style="font-size: 18px;"><b>{{$employee->first_name}}'s </b> Details</div>
				<div class="card-body">
					<table class="table table-hover">
						<thead>
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
							<tr>
								<td>{{ $employee->first_name }}</td>
								<td>{{ $employee->last_name }}</td>
								<td>{{ $employee->dob }}</td>
								<td>{{ $employee->phone_number }}</td>
								<td>{{count($documents)}}</td>
								<td><a href="{{ route('employee.edit',$employee->id) }}"><span class="badge badge-primary">Edit</span></a>
							</tr>
						</tbody>
					</table>
					<p><b>Attachments</b></p>
					@foreach ($documents as $doc)
						<p><a href="{{ $doc->getFileUrl() }}" target="_blank">{{$doc->file}}</a></p>
					@endforeach

				</div>
			</div>
		</div>
	</div>
</div>
@endsection