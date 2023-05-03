@extends('admin.aDashboard')
@section('admins')

	  {{-- TRIAL START --}}
	  <div class="container-fluid">
	  <div class="row">
		<div class="col-lg-7 mb-lg-0 mb-4">
		  <div class="card">
			<div class="card-body p-3">
			  <div class="row">
				<form method="post" action="{{ route('product.update', $product->id) }}" >
					@csrf
	   
			<div class="form-group">
		   <h6>Category<span class="text-danger">*</span></h6>
		   <div class="controls">
			   <select name="category_id" class="form-control" required="" >
				   <option value="{{$product->category->id}}" selected="" disabled="">{{$product->category->category_name}}</option>
				   @foreach($categories as $category)
		<option value="{{ $category->id }}">{{ $category->category_name }}</option>	
				   @endforeach
			   </select>
			   @error('category_id') 
			<span class="text-danger">{{ $message }}</span>
			@enderror 
			</div>
				</div>
	   
					   <div class="form-group">
						   <h6>Product Name<span class="text-danger">*</span></h6>
						   <div class="controls">
							   <input type="text" value="{{$product->product_name}}" name="product_name" class="form-control" required="">
					@error('product_name') 
					<span class="text-danger">{{ $message }}</span>
					@enderror
						  </div>
					   </div>
		
			 <div class="form-group">
				   <h6>Product Code <span class="text-danger">*</span></h6>
				   <div class="controls">
					   <input type="text" value="{{$product->product_code}}" name="product_code" class="form-control" required="">
			@error('product_code') 
			<span class="text-danger">{{ $message }}</span>
			@enderror
				  </div>
			   </div>

			   <div class="form-group">
				<h6>Quantity<span class="text-danger">*</span></h6>
				<div class="controls">
					<input type="text" value="{{$product->qty}}" name="qty" class="form-control" required="">
		 @error('qty') 
		 <span class="text-danger">{{ $message }}</span>
		 @enderror
			   </div>
			</div>

			   <div class="col">	
				<div class="row">
					<div class="col">	
					<div class="form-group">
						<h6>Product Selling Price <span class="text-danger">*</span></h6>
						<div class="controls">
				 <input type="text" value="{{$product->discount_price}}" name="discount_price" class="form-control" >
				 @error('discount_price') 
				 <span class="text-danger">{{ $message }}</span>
				 @enderror
						  </div>
					</div></div>
					<div class="col">
						
						<div class="form-group">
							<h6>Product Buying Price <span class="text-danger">*</span></h6>
							<div class="controls">
								<input type="text" value="{{$product->selling_price}}" name="selling_price" class="form-control">
					 @error('selling_price') 
					 <span class="text-danger">{{ $message }}</span>
					 @enderror
						   </div>
						</div>	
					</div>
				</div>	
			   </div>

			   </div> <!-- end row  -->
	   	 
							   <div class="text-xs-right">
	   <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Product">
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
