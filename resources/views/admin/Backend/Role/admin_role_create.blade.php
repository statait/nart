@extends('admin.aDashboard')
@section('admins')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  {{-- TRIAL START --}}
  <div class="container-fluid">
	<div class="row">
	  <div class="col-lg-12 mb-lg-0 mb-4">
		<div class="card">
		  <div class="card-body p-3">
			<div class="row">
	 <form method="post" action="{{ route('admin.user.store') }}" enctype="multipart/form-data" >
	 	@csrf
					  <div class="row">
						<div class="col-12">

			<div class="row">
				<div class="col-md-6">

	 <div class="form-group">
		<h5>Admin User Name  <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="name" class="form-control" > </div>
	</div>

				</div> <!-- end cold md 6 -->



				<div class="col-md-6">

	  <div class="form-group">
		<h5>Admin Email  <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="email" name="email" class="form-control" > </div>
	</div>

				</div> <!-- end cold md 6 --> 

			</div>	<!-- end row 	 -->	




	<div class="row">
				<div class="col-md-6">

	 <div class="form-group">
		<h5>Admin User Phone  <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="phone" class="form-control" > </div>
	</div>

				</div> <!-- end cold md 6 -->



				<div class="col-md-6">

	  <div class="form-group">
		<h5>Admin Password  <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="password" name="password" class="form-control" > </div>
	</div>

				</div> <!-- end cold md 6 --> 

			</div>	<!-- end row 	 -->	


	 <div class="row">

				<div class="col-md-6">
		<div class="form-group">
		<h5>Admin User Image </h5>
		<div class="controls">
 <input type="file" name="profile_photo_path" class="form-control" id="image"> </div>
	</div>
				</div><!-- end cold md 6 --> 

				<div class="col-md-1">
	<img id="showImage" src="{{ url('upload/no_image.jpg') }}" style="width: 100px; height: 100px;">				

				</div>

	<div class="col-md-3 ">
	<div class="form-group">
		<h5>Type</h5>	
			<select id="type" name="type" class="form-control" required="" >
				<option value="1" selected="">Super Admin</option>
				<option value="2" >Admin</option>
				<option value="3" >Sales</option>
				<option value="4" >Production</option>
			</select>					
		</div>
	</div>
			</div><!-- end row 	 -->	


	<div class="row">

<div class="col-md-4">

	<div class="form-check form-switch">
		<input class="form-check-input" type="checkbox" id="checkbox_1" name="product" value="1">
		<label class="form-check-label" for="checkbox_1">Product</label>
	</div>

	<div class="form-check form-switch">
		<input class="form-check-input" type="checkbox" id="checkbox_2" name="reports" value="1">
		<label class="form-check-label" for="checkbox_2">Reports</label>
	</div>

	<div class="form-check form-switch">
		<input class="form-check-input" type="checkbox" id="checkbox_3" name="customer" value="1">
		<label class="form-check-label" for="checkbox_3">Customer</label>
	</div>

	<div class="form-check form-switch">
		<input class="form-check-input" type="checkbox" id="checkbox_4" name="sale" value="1">
		<label class="form-check-label" for="checkbox_4">Sale</label>
	</div>

</div>

{{-- SECOND COL --}}

<div class="col-md-4">

	<div class="form-check form-switch">
		<input class="form-check-input" type="checkbox" id="checkbox_7" name="manage_site" value="1">
		<label class="form-check-label" for="checkbox_7">Manage Site</label>
	</div>

	<div class="form-check form-switch">
		<input class="form-check-input" type="checkbox" id="checkbox_5" name="admin_user" value="1">
		<label class="form-check-label" for="checkbox_5">Admin User</label>
	</div>

	<div class="form-check form-switch">
		<input class="form-check-input" type="checkbox" id="checkbox_6" name="manage_bank" value="1">
		<label class="form-check-label" for="checkbox_6">Manage Bank</label>
	</div>

</div>


			 <div class="text-xs-right">
	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Admin User">					 
						</div>
					</form>

				</div>
			</div>
			</div>
			</div>
			
			</div>
			
			@include('admin.body.footer')
			
{{-- TRIAL END --}}


<script type="text/javascript">
	$(document).ready(function(){
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
			 $('#showImage').attr('src',e.target.result);	
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});
</script>


@endsection 