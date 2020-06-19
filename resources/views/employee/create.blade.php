@extends('layouts.app')

@section('content')

<script>
    $(function() {

		$("#files").on('change',function(e){
			$('#attachedFiles').html("");
			$('#itemsCount').html(e.target.files.length + " item Attached");

			for (var i = 0; i < e.target.files.length; i++) {
				console.log(e.target.files[i]);
				var files="<p><a href='' >"+e.target.files[i].name+"</a></p>";
				$('#attachedFiles').append(files);
			}
   
		});      
	    $("input[name=phoneNumber]")[0].oninvalid = function () {
	        this.setCustomValidity("Enter a Valid Phone Number");
	    };
    });
</script>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-sm-8">
			<form class="form" method="POST" action="{{ route('employee.store') }}" enctype="multipart/form-data">
				@csrf
				<div class="card">
					<div class="card-header"><h4>Add Employee Details</h4></div>
					<div class="card-body">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="firstName">First Name:</label>
									<input type="text" class="form-control" required="required" name="firstName" id="firstName" placeholder="First Name">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="lastName">Last Name:</label>
									<input type="text" class="form-control" required="required" name="lastName" id="lastName" placeholder="Last Name">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="date">Date of Birth:</label>
									<input type="date" class="form-control" required="required" name="dob" id="date" placeholder="">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="phoneNumber">Phone Number:</label>
									<input type="text" class="form-control" required="required" name="phoneNumber" pattern="[0-9]{10}"  id="phoneNumber" placeholder="Phone Number" >
								</div>
							</div>
							<div class="col-sm-6" style="display: none;">
								<div class="form-group">
									<label for="files">Attachments : </label>
									<input type="file" class="form-control" multiple name="files[]" id="files">
								</div>
							</div>
							<div class="col-sm-6">
								<button type="button" class="btn btn-secondary" onclick="document.getElementById('files').click();">Attach Files</button>
								<span id="itemsCount"></span>
								<div id="attachedFiles">
									
								</div>
							</div>
						</div>	
					</div>
					<div class="card-footer">
						<a href="{{ route('home')}}" class="btn btn-primary">Cancel</a>
						<input type="submit" name="submit" value="Save" class="btn btn-success float-right ml-3">
						<input type="reset" name="reset" value="Reset" class="btn btn-danger float-right">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection