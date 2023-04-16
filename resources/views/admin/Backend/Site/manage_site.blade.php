@extends('admin.aDashboard')
@section('admins')

	  {{-- TRIAL START --}}
	  <div class="container-fluid">
	  <div class="row">
		<div class="col-lg-7 mb-lg-0 mb-4">
		  <div class="card">
			<div class="card-body p-3">
			  <div class="row">
				<form method="post" action="{{ route('site.update') }}" enctype="multipart/form-data" >
					@csrf
	   
					   <div class="form-group">
						   <h6>Name<span class="text-danger">*</span></h6>
						   <div class="controls">
							   <input type="text" name="name" class="form-control" value="{{$sites->name}}">
					@error('product_name') 
					<span class="text-danger">{{ $message }}</span>
					@enderror
						  </div>
					   </div>
		
			 <div class="form-group">
				   <h6>Address<span class="text-danger">*</span></h6>
				   <div class="controls">
					   <input type="text" name="address" class="form-control" value="{{$sites->address}}">
			@error('product_code') 
			<span class="text-danger">{{ $message }}</span>
			@enderror
				  </div>
			   </div>

			   <div class="form-group">
				<h6>Phone<span class="text-danger">*</span></h6>
				<div class="controls">
					<input type="text" name="phone" class="form-control" value="{{$sites->phone}}">
		 @error('qty') 
		 <span class="text-danger">{{ $message }}</span>
		 @enderror
			   </div>
			</div>

			   <div class="form-group">
				<h6>E-Mail<span class="text-danger">*</span></h6>
				<div class="controls">
					<input type="text" name="email" class="form-control" value="{{$sites['email']}}">
		 @error('qty') 
		 <span class="text-danger">{{ $message }}</span>
		 @enderror
			   </div>
			</div>

			   <div class="col">	
				<div class="row">
					<div class="form-group">
						<h6>Logo<span class="text-danger">*</span></h6>
						<input type="file" class="form-control" id="logo" name="logo">
						@if(!empty($sites['logo']))
							<a target="_blank" href="{{url('/upload/logo/'.$sites['logo'])}}">View Image</a>
							<input type="hidden" name="logo" value="{{ $sites['logo']}}">
						@endif
					</div>
					<div class="form-group">
						<h6>Watermark<span class="text-danger">*</span></h6>
						<input type="file" class="form-control" id="watermark" name="watermark">
						@if(!empty($sites['watermark']))
							<a target="_blank" href="{{url('/upload/logo/'.$sites['watermark'])}}">View Image</a>
							<input type="hidden" name="watermark" value="{{ $sites['watermark']}}">
						@endif
					</div>
				</div>	
			   </div>

			   </div> <!-- end row  -->
	   	 
							   <div class="text-xs-right">
	   <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Setting">
							   </div>
						   </form>
			  </div>
			</div>
		  </div>
		</div>

	  </div>

	  @include('admin.body.footer')

	  {{-- TRIAL END --}}
@endsection
