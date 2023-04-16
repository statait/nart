@extends('admin.aDashboard')
@section('admins')


  <!-- Content Wrapper. Contains page content -->
  
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			   
		 

			 


<!--   ------------ Edit Slider Page -------- -->


          <div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Edit Location/Store </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">


 <form method="post" action="{{ route('store.location.update') }}" enctype="multipart/form-data">
	 	@csrf
	 <input type="hidden" name="id" value="{{ $location->id }}">	
	 <input type="hidden" name="old_image" value="{{ $location->store_image }}">			   

	 <div class="form-group">
		<h5>Store Name <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text"  name="store_name" class="form-control" value="{{ $location->store_name }}" > 
	 
	</div>
	</div>

    <div class="form-group">
		<h5>Address<span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text"  name="address" class="form-control" value="{{ $location->address }}" > 
	 
	</div>
	</div>


	<div class="form-group">
		<h5>Phone<span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="phone" class="form-control" value="{{ $location->phone }}" >
     
	  </div>
	</div>

    <div class="form-group">
		<h5>Map Link <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="map" class="form-control" value="{{ $location->map }}" >
     
	  </div>
	</div>



	<div class="form-group">
		<h5>Location Image <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="file" name="location_image" class="form-control" >
     @error('location_image') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	  </div>
	</div>
					 

			 <div class="text-xs-right">
	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">					 
						</div>
					</form>




					  
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box --> 
			</div>

 


		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  



@endsection