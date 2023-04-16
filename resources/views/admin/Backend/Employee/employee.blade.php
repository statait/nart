@extends('admin.aDashboard')
@section('admins')

	  <div class="container-full">
		<!-- Content Header (Page header) -->
		  

		<!-- Main content -->
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Add Employee </h4>
			   
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">

  <form method="post" action="{{ route('product-store') }}" enctype="multipart/form-data" >
		 	@csrf

<div class="row">
	<div class="col-12">	

		<div class="row"> <!-- start 1st row  -->
			<div class="col-md-6">

	 <div class="form-group">
		<div class="form-group">
			<h6>First Name<span class="text-danger">*</span></h6>
			<div class="controls">
				<input type="text" name="first_name" class="form-control" required="">
	 {{-- @error('product_name') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror --}}
		   </div>
		</div>
		 </div>
				
			</div> <!-- end col md 4 -->

			<div class="col-md-6">	
				<div class="form-group">
					<h6>Last Name<span class="text-danger">*</span></h6>
					<div class="controls">
						<input type="text" name="last_name" class="form-control" required="">
			 {{-- @error('product_name') 
			 <span class="text-danger">{{ $message }}</span>
			 @enderror --}}
				   </div>
				</div>
			</div> 
			<!-- end col md 4 -->
 <!-- end col md 4 -->
			
		</div> <!-- end 1st row  -->

<div class="row"> <!-- start 3RD row  -->
			<div class="col-md-6">

				<div class="form-group">
					<h6>Designation<span class="text-danger">*</span></h6>
					<div class="controls">
						<select name="category_id" class="form-control"  >
							<option value="" selected="" disabled="">Select Designation</option>
							@foreach($designations as $designation)
							<option value="{{ $designation->id }}">{{ $designation->designation }}</option>	
							@endforeach
						</select>
						{{-- @error('category_id') 
					 <span class="text-danger">{{ $message }}</span>
					 @enderror  --}}
					 </div>
						 </div>
				
			</div> <!-- end col md 4 -->

			<div class="col-md-6">	
				<div class="form-group">
					<h6>Phone<span class="text-danger">*</span></h6>
					<div class="controls">
						<input type="text" name="phone" class="form-control" required="">
			 {{-- @error('product_name') 
			 <span class="text-danger">{{ $message }}</span>
			 @enderror --}}
				   </div>
				</div>		
			</div> <!-- end col md 4 -->			
		</div> <!-- end 3RD row  -->
		 
<div class="row"> <!-- start 6th row  -->

	<div class="col-md-6">

		<div class="form-group">
			<h6>Rate Type<span class="text-danger">*</span></h6>
			<div class="controls">
				<select name="rate_type" class="form-control"  >
					<option value="" selected="" disabled="">Select Option</option>		
					<option value="Hourly">Hourly</option>						
					<option value="Salary">Salary</option>	
				</select>
				{{-- @error('category_id') 
			 <span class="text-danger">{{ $message }}</span>
			 @enderror  --}}
			 </div>
		</div>	
	</div> <!-- end col md 4 -->

			<div class="col-md-6">
				<div class="form-group">
					<h6>Hourly Rate/Salary<span class="text-danger">*</span></h6>
					<div class="controls">
						<input type="text" name="rate-salary" class="form-control" required="">
			 {{-- @error('product_name') 
			 <span class="text-danger">{{ $message }}</span>
			 @enderror --}}
				   </div>
				</div>
				
			</div> <!-- end col md 4 -->
		</div> <!-- end 3th row  -->


		<div class="row"> <!-- start 4th row  -->

			<div class="col-md-6">
				<div class="form-group">
					<h6>Email</h6>
					<div class="controls">
						<input type="text" name="email" class="form-control">
			 {{-- @error('product_name') 
			 <span class="text-danger">{{ $message }}</span>
			 @enderror --}}
				   </div>
				</div>
				
			</div> <!-- end col md 4 -->
		
					<div class="col-md-6">
						<div class="form-group">
							<h6>Blood Group<span class="text-danger">*</span></h6>
							<div class="controls">
								<input type="text" name="b_group" class="form-control">
					 {{-- @error('product_name') 
					 <span class="text-danger">{{ $message }}</span>
					 @enderror --}}
						   </div>
						</div>
						
					</div> <!-- end col md 4 -->
				</div> <!-- end 6th row  -->

		<div class="row"> <!-- start 4th row  -->

			<div class="col-md-6">
				<div class="form-group">
					<h6>Address<span class="text-danger">*</span></h6>
					<div class="controls">
						<input type="text" name="address" class="form-control">
				{{-- @error('product_name') 
				<span class="text-danger">{{ $message }}</span>
				@enderror --}}
					</div>
				</div>
				
			</div> <!-- end col md 4 -->
		
					<div class="col-md-6">
						<div class="form-group">
							<h6>City<span class="text-danger">*</span></h6>
							<div class="controls">
								<select name="city" class="form-control"  >
									<option value="" selected="" disabled="">Select Option</option>		
									<option value="Chittagong">Chittagong</option>	
									<option value="Barishal">Barishal</option>						
									<option value="Dhaka">Dhaka</option>						
									<option value="Khulna">Khulna</option>
									<option value="Rajshahi">Rajshahi</option>	
									<option value="Rongpur">Rongpur</option>						
									<option value="Sylhet">Sylhet</option>	
								</select>
								{{-- @error('category_id') 
								<span class="text-danger">{{ $message }}</span>
								@enderror  --}}
								</div>
						</div>
						
					</div> <!-- end col md 4 -->
				</div> <!-- end 6th row  -->

		<div class="row"> <!-- start last row  -->

			<div class="col-md-6">
				<div class="form-group">
					<h6>Picture</h6>
					<div class="controls">
						<input type="file" name="picture" class="form-control" >
						{{-- @error('picture') 
						<span class="text-danger">{{ $message }}</span>
						@enderror  --}}
							</div>
				</div>
				
			</div> <!-- end col md 4 -->
		
					<div class="col-md-6">
						<div class="form-group">
							<h6>Country<span class="text-danger">*</span></h6>
							<div class="controls">
								<select name="country" class="form-control"  >
									<option value="" selected="" disabled="">Select Option</option>		
									<option value="Bangladesh">Bangladesh</option>						
								</select>
								{{-- @error('category_id') 
							 <span class="text-danger">{{ $message }}</span>
							 @enderror  --}}
							 </div>
						</div>	
						
					</div> <!-- end col md 4 -->
				</div> <!-- end 6th row  -->
	 <hr>				 
						<div class="text-xs-right">
	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Employee">
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>
		<!-- /.content -->
	  </div>

@endsection