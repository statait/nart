@extends('frontend.main_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@section('title')
Confirmation
@endsection
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
	<div class="container">
		<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
			<div class="col-first">
				<h1>Confirmation</h1>
				<nav class="d-flex align-items-center">
					<a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
					<a href="category.html">Confirmation</a>
				</nav>
			</div>
		</div>
	</div>
</section>
<!-- End Banner Area -->

<!--================Order Details Area =================-->
<section class="order_details section_gap">
	<div class="container">
		<h3 class="title_confirmation">Thank you. Your order has been received.</h3>
		<div class="row order_d_inner">
			<div class="col-lg-6">
				<div class="details_item">
					<h4>Order Info</h4>
					@php
					$order = App\Models\Order::findOrFail($order_id);
					$orderitems = App\Models\OrderItem::where('order_id', $order_id)->get();	
					@endphp
					
					<ul class="list">
						<li><a href="#"><span>Order number</span> : {{ $order->invoice_no }}</a></li>
						<li><a href="#"><span>Date</span> : {{$order->order_date}}</a></li>
						<li><a href="#"><span>Total</span> : {{$order->currency}}  {{ $order->amount }}</a></li>
						<li><a href="#"><span>Payment method</span> :  {{ $order->payment_method }}</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="details_item">
					<h4>Billing Address</h4>
					<ul class="list">
						<li><a href="#"><span>Address</span> : {{$order->notes}}</a></li>
						<li><a href="#"><span>City</span> : {{$order->state->state_name}} , {{$order->district->district_name}} , {{$order->division->division_name}}</a></li>
						<li><a href="#"><span>Postcode </span> : {{$order->post_code}}</a></li>
						<li><a href="#"><span>Country</span> : Bangladesh</a></li>
					</ul>
				</div>
			</div>

		</div>
		<div class="order_details_table">
			<h2>Order Details</h2>
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th scope="col">Product</th>
							<th scope="col">Quantity</th>
							<th scope="col">Total</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($orderitems as $item)
						<tr>
							<td>
								<p>{{$item->product->product_name}}</p>
							</td>
							<td>
								<h5>x {{$item->qty}}</h5>
							</td>
							<td>
								<p>{{$item->qty * $item->price}}</p>
							</td>
						</tr>
						@endforeach

						<tr>
							<td>
								<h4>Subtotal</h4>
							</td>
							<td>
								<h5></h5>
							</td>
							<td>
								{{-- {{ $order->amount + $order->coupon_discount}} --}}
								<p>{{$order->currency}} </p>
							</td>
						</tr>
						<tr>
							<td>
								<h4>Coupon</h4>
							</td>
							<td>
								<p>{{$order->coupon}}({{$order->coupon_percentage}})</p>
							</td>
							<td>
								<p>{{$order->coupon_discount}}</p>
							</td>
						</tr>
						<tr>
							<td>
								<h4>Total</h4>
							</td>
							<td>
								<h5></h5>
							</td>
							<td>
								<p>{{$order->currency}}  {{ $order->amount }}</p>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>
<!--================End Order Details Area =================-->

@endsection 