@extends('frontend.main_master')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@section('title')
My Checkout
@endsection

<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
	<div class="container">

		<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
			<div class="col-first">
				<h1>Checkout</h1>
				<nav class="d-flex align-items-center">
					<a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
					<a href="single-product.html">Checkout</a>
				</nav>
			</div>
		</div>
	</div>
</section>
<!-- End Banner Area -->
	<!--================Checkout Area =================-->
<section class="checkout_area section_gap">
	<div class="container">
		<div class="billing_details">
			<div class="row">
				
				<div class="col-lg-8">
					<h3>Billing Details</h3>
					<form id="GFG" class="row contact_form" action="{{ route('checkout.store') }}" method="POST">
						@csrf
						<div class="col-md-6 form-group p_star">
							<input type="text" name="shipping_name" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Full Name" value="{{ Auth::user()->name }}" required="">
						</div>
						<div class="col-md-6 form-group p_star">

						</div>
						<div class="col-md-12 form-group">
							<input type="email" name="shipping_email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Email" value="{{ Auth::user()->email }}" required="">

						</div>
						<div class="col-md-6 form-group p_star">
							<input type="text" name="shipping_phone" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Phone" value="{{ Auth::user()->phone }}" required="">

						</div>
						<div class="col-md-6 form-group p_star">
							<input type="text" name="post_code" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Post Code">
						</div>

						<h3>Shipping Details</h3>

						<div class="col-md-12 form-group p_star">
							<select name="division_id" class="division_id country_select" required="" >
								<option value="" selected="" disabled="">Select Division</option>
								@foreach($divisions as $item)
									 <option value="{{ $item->id }}">{{ $item->division_name }}</option>	
								@endforeach
							</select>
					</div>

					<div class="col-md-12 form-group p_star">
						<select name="district_id" class="country_select" required="">
							<option value="" selected="" disabled="">Select District</option>
							@foreach($districts as $item)
									<option value="{{ $item->id }}">{{ $item->district_name }}</option>	
							@endforeach
						</select>
						{{-- @error('district_id') 
						<span class="placeholder" data-placeholder="Select District"></span>
						@enderror  --}}
					</div>

					<div class="col-md-12 form-group">
						<select name="state_id" class="country_select" required="">
							<option value="" selected="" disabled="">Select State</option>
							@foreach($states as $item)
							<option value="{{ $item->id }}">{{ $item->state_name }}</option>	
					@endforeach
						</select>
						{{-- @error('state_id') 
						 <span class="text-danger">{{ $message }}</span>
						 @enderror  --}}
					</div>

					<div class="col-md-12 form-group">
						<textarea class="form-control" cols="30" rows="5" placeholder="Notes" name="notes" required=""></textarea>
					</div>
				
			</div>
		
			<div class="col-lg-4">
				<div class="order_box">
					<h2>Your Order</h2>
					<ul class="list">
						<li><a href="#">Product <span>Total</span></a></li>
						@foreach($carts as $item)
						<li><a href="#"><img src="{{ asset($item->options->image) }}" style="height: 50px; width: 50px;"><span class="middle"> x{{ $item->qty }} </span> <span class="last">TK {{ $item->price }}</span></a></li>
						@endforeach 
					</ul>
					<ul class="list list_2">
						@if(Session::has('coupon'))
						<li><a href="#">Subtotal <span>TK {{ $cartTotal }}</span></a></li>
						<li><a href="#">Coupon Name <span>{{ session()->get('coupon')['coupon_name'] }}
							({{ session()->get('coupon')['coupon_discount'] }}% )</span></a></li>
						<li><a href="#">Coupon Discount <span> TK {{ session()->get('coupon')['discount_amount'] }} </span></a></li>
						<li><a href="#">Grand Total <span> TK {{ session()->get('coupon')['total_amount'] }}</span></a></li>
						@else
						<li><a href="#">Subtotal <span>TK {{ $cartTotal }}</span></a></li>
						<li><a href="#">Grand Total <span>TK {{ $cartTotal }}</span></a></li>
						@endif
					</ul>
					<br>
					<div class="single-element-widget mt-30">
						<h2 class="mb-30">Payment</h2>
						<div class="switch-wrap d-flex justify-content-between">
							<p>Cash On Delivery</p>
							<div class="primary-radio">
								<input name="payment_method" type="radio" id="default-radio" value="cod">
								<label for="default-radio"></label>
							</div>
						</div>
						<div class="switch-wrap d-flex justify-content-between">
							<p>Digital Payment</p>
							<div class="primary-radio">
								<input name="payment_method" type="radio" id="default-radio1" value="digital">
								<label for="default-radio1"></label>
							</div>
						</div>
						<div class="switch-wrap d-flex justify-content-between">
							<p>POS</p>
							<div class="primary-radio">
								<input name="payment_method" type="radio" id="default-radio2" value="pos">
								<label for="default-radio2"></label>
							</div>
						</div>

					</div>
					{{-- <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Payment Step</button> --}}
					<a class="primary-btn" href="#" onclick="myFunction()">Proceed to Payment</a>
				</div>
			</div>
		</form>
		</div>
	</div>
</div>
</section>
<!--================End Checkout Area =================-->


<script type="text/javascript">
	$(document).ready(function() {
	  $('.division_id').on('change', function(){
		  var division_id = $(this).val();
		  if(division_id) {
			  $.ajax({
				  url: "{{  url('/district-get/ajax') }}/"+division_id,
				  type:"GET",
				  dataType:"json",
				  success:function(data) {
					  $('.state_id').empty(); 
					 var d =$('.district_id').empty();
						$.each(data, function(key, value){
							$('.district_id').append(
								$('<option>', {
								value: value.id,
								text:  value.district_name,
							}))
							
						});
				  },
			  });
		  } else {
			  alert('danger');
		  }
	  });
	  
$('select[name="district_id"]').on('change', function(){
		  var district_id = $(this).val();
		  if(district_id) {
			  $.ajax({
				  url: "{{  url('/state-get/ajax') }}/"+district_id,
				  type:"GET",
				  dataType:"json",
				  success:function(data) {
					 var d =$('select[name="state_id"]').empty();
						$.each(data, function(key, value){
							$('select[name="state_id"]').append('<option value="'+ value.id +'">' + value.state_name + '</option>');
						});
				  },
			  });
		  } else {
			  alert('danger');
		  }
	  });

  });
  </script>

<script>
	function myFunction() {
		document.getElementById("GFG").submit();
	}
</script>

@endsection 