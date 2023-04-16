@extends('frontend.main_master')
@section('content')

@section('title')
My Cart 
@endsection

 <!-- Start Banner Area -->
 <section class="banner-area organic-breadcrumb">
	<div class="container">
		<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
			<div class="col-first">
				<h1>Shopping Cart</h1>
				<nav class="d-flex align-items-center">
					<a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
					<a href="category.html">Cart</a>
				</nav>
			</div>
		</div>
	</div>
</section>
<!-- End Banner Area -->

<!--================Cart Area =================-->
<section class="cart_area">
	<div class="container">
		<div class="cart_inner">
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th scope="col">Product</th>
							<th scope="col">Color</th>
							<th scope="col">Size</th>
							<th scope="col">Price</th>
							<th scope="col">Quantity</th>
							<th scope="col">Total</th>
							<th scope="col">Remove</th>
						</tr>
					</thead>
					
					<tbody id="cartPage">
					</tbody>
				</table>

					<table class="table">
					<tbody>
						<tr class="bottom_button ">
							<td>
								
							</td>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="cupon_text d-flex justify-content-end">
									<input id="coupon_name" type="text" placeholder="Coupon Code">
									<a class="primary-btn" onclick="applyCoupon()" href="#">Apply</a>
									{{-- <a class="gray_btn" onclick="couponRemove()" href="#">Close Coupon</a> --}}
								</div>
							</td>
						</tr>

						<tr id="couponCalField">
							{{-- <td>

							</td>
							<td>

							</td>
							<td>
								<h5>Subtotal</h5>
							</td>
							<td>
								<h5>$2160.00</h5>
							</td> --}}
						</tr>

						<tr class="out_button_area">
							<td>

							</td>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="checkout_btn_inner d-flex justify-content-end">
									<a class="primary-btn" href="{{ route('checkout') }}">Proceed to checkout</a>
								</div>
							</td>
						</tr>
					
					</tbody>
				</table>

				{{-- @if(Session::has('coupon'))
				@else


				<table class="table" id="couponField">

				</table><!-- /table -->
				@endif

				<table class="table">
					<thead id="couponCalField">
						
			
					</thead><!-- /thead -->

				</table><!-- /table --> --}}
			</div>
		</div>
	</div>
</section>
<!--================End Cart Area =================-->

 
@endsection