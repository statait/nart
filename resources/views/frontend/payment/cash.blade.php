@extends('frontend.main_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@section('title')
Payment
@endsection

<section class="banner-area organic-breadcrumb">
	<div class="container">

		<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
			<div class="col-first">
				<h1>Checkout</h1>
				<nav class="d-flex align-items-center">
					<a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
					<a href="single-product.html">Payment</a>
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
	
			<div class="col-lg-12">
				<div class="order_box">
					<h2>Your Order</h2>
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

					{{-- FORM --}}
					<form action="{{ route('cash.order') }}" method="post" id="place_order">
						@csrf
						<div class="form-row">
							<label for="card-element">
				
					  <input type="hidden" name="name" value="{{ $data['shipping_name'] }}">
					  <input type="hidden" name="email" value="{{ $data['shipping_email'] }}">
					  <input type="hidden" name="phone" value="{{ $data['shipping_phone'] }}">
					  <input type="hidden" name="post_code" value="{{ $data['post_code'] }}">
					  <input type="hidden" name="division_id" value="{{ $data['division_id'] }}">
					  <input type="hidden" name="district_id" value="{{ $data['district_id'] }}">
					  <input type="hidden" name="state_id" value="{{ $data['state_id'] }}">
					  <input type="hidden" name="notes" value="{{ $data['notes'] }}"> 
				
							</label>

						</div>
						<br>
						<a class="primary-btn" href="#" onclick="placeOrder()">Place Order</a>
						</form>
					{{-- END FORM --}}
				
				</div>
			</div>
		</form>
		</div>
	</div>
</div>
</section>
<!--================End Checkout Area =================-->

<script>
	function placeOrder() {
		document.getElementById("place_order").submit();
	}
</script>

@endsection 