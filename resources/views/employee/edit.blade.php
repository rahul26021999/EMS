@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-sm-9">
			<form class="form" method="post" action="{{ route('employee.update',$employee->id) }}">
				@csrf
				@method('PUT')
				<div class="card">
					<div class="card-header"><h4>Add Employee Details</h4></div>
					<div class="card-body">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="firstName">First Name:</label>
									<input type="text" class="form-control" value="{{$employee->first_name}}" name="firstName" id="firstName" placeholder="First Name">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="lastName">Last Name:</label>
									<input type="text" class="form-control"  value="{{$employee->last_name}}" name="lastName" id="lastName" placeholder="Last Name">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="date">Date of Birth:</label>
									<input type="date" class="form-control"  value="{{$employee->dob}}" name="dob" id="date" placeholder="">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="phoneNumber">Phone Number:</label>
									<input type="text" class="form-control" name="phoneNumber"  value="{{$employee->phone_number}}" id="phoneNumber" placeholder="Phone Number">
								</div>
							</div>
						</div>	
					</div>
					<div class="card-footer">
						<input type="submit" name="submit" value="Save" class="btn btn-success float-right ml-3">
						<a href="{{ route('employee.show',$employee->id) }}" class="btn btn-primary">Cancel</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection