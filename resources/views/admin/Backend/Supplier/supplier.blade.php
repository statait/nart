@extends('admin.aDashboard')
@section('admins')

	  <div class="container-full">
		<!-- Content Header (Page header) -->
		  

		<!-- Main content -->
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Add Supplier </h4>
			   
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">

  <form method="post" action="{{ route('supplier.store') }}">
		 	@csrf

			 <div class="form-group row">
				<label for="supplier_name" class="col-sm-2 text-right col-form-label">Supplier Name <i class="text-danger"> * </i>:</label>
				<div class="col-sm-4">
				<div class="">
				<input type="text" name="supplier_name" class="form-control" id="supplier_name"  value="">
				@error('supplier_name') 
				<span class="text-danger">{{ $message }}</span>
				@enderror 
				</div>
				</div>
				<label for="supplier_mobile" class="col-sm-2 text-right col-form-label">Mobile No <i class="text-danger"> </i>:</label>
				<div class="col-sm-4">
				<div class="">
				<input type="number" name="mobile" class="form-control" id="supplier_mobile" value="">
				@error('mobile') 
				<span class="text-danger">{{ $message }}</span>
				@enderror 
				</div>
				</div>
				</div>
				<div class="form-group row">
				<label for="email_address" class="col-sm-2 text-right col-form-label">Email:</label>
				<div class="col-sm-4">
				<div class="">
				<input type="email" class="form-control" name="email_address" id="email_address" value="">
				@error('email_address') 
				<span class="text-danger">{{ $message }}</span>
				@enderror 
				</div>
				</div>
				<label for="zip" class="col-sm-2 text-right col-form-label">Zip code:</label>
				<div class="col-sm-4">
				<div class="">
				<input name="zip" type="text" class="form-control" id="zip"  value="">
				</div>
				</div>
				</div>
				<div class="form-group row">
				<label for="phone" class="col-sm-2 text-right col-form-label">Phone:</label>
				<div class="col-sm-4">
				<div class="">
				<input class="form-control input-mask-trigger text-left" id="phone" type="number" name="phone" value="">
				</div>
				</div>

				</div>
				<div class="form-group row">
				<label for="address1" class="col-sm-2 text-right col-form-label">Address:</label>
				<div class="col-sm-4">
				<div class="">
				<textarea name="address" id="address" class="form-control" ></textarea>
				@error('address') 
				<span class="text-danger">{{ $message }}</span>
				@enderror 
				</div>
				</div>

				</div>
				<div class="form-group row">
				<label for="city" class="col-sm-2 text-right col-form-label">City:</label>
				<div class="col-sm-4">
				<div class="">
				<input type="text" name="city" class="form-control" id="city"  value="">
				</div>
				</div>
				</div>
				<div class="form-group row">
				<label for="state" class="col-sm-2 text-right col-form-label">State:</label>
				<div class="col-sm-4">
				<div class="">
				<input type="text" name="state" class="form-control" id="state"  value="">
				</div>
				</div>

				</div>
				<div class="form-group row">
				<label for="country" class="col-sm-2 text-right col-form-label">Country:</label>
				<div class="col-sm-4">
				<div class="">
				<input name="country" type="text" class="form-control " value="" id="country">
				</div>
			</div>
			</div>
		
				<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Supplier">
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