
@extends('frontend.main_master')
@section('content')

@section('title')
User Dashboard  
@endsection

@php
    $auth = Auth::user()->name;
@endphp

@include('frontend.common.breadcrumb', ['bread' => "Hello", 'top' => $auth."'s Dashboard"] )

<!--================Order Details Area =================-->
<section class="order_details section_gap">
	<div class="container">
        @include('frontend.common.user_sidebar')
		<div class="order_details_table">
		
			<h2>My Orders</h2> 
			<div class="table-responsive">
				<table class="table">
					<thead >
						<tr>
							<th scope="col"><strong> Date</strong></th>
							<th scope="col"><strong> Total</strong></th>
							<th scope="col"><strong>Payment</strong></th>
							<th scope="col"><strong>Invoice</strong></th>
							<th scope="col"><strong>Order</strong></th>
							<th scope="col"><strong>Action </strong></th>
						</tr>
					</thead>
					<tbody>

            @foreach($orders as $order)
						<tr>
							<td>
								<p>{{ $order->order_date }}</p>
							</td>
							<td>
								<p>TK {{ $order->amount }}</p>
							</td>
							<td>
								<p>{{ $order->payment_method }}</p>
							</td>
              <td>
								<p>{{ $order->invoice_no }}</p>
							</td>
              <td>
				<p>@if($order->status == 'pending') 
					<span> Pending </span>
                  @elseif($order->status == 'confirm')
                    <span class="badge badge-pill badge-warning"> Confirm </span>
        
                  @elseif($order->status == 'processing')
                  <span class="badge badge-pill badge-warning" style="background: #FFA500;"> Processing </span>
        
                  @elseif($order->status == 'picked')
                  <span class="badge badge-pill badge-warning" style="background: #808000;"> Picked </span>
        
                  @elseif($order->status == 'shipped')
                  <span class="badge badge-pill badge-warning" style="background: #808080;"> Shipped </span>
        
                  @elseif($order->status == 'delivered')
                  <span class="badge badge-pill badge-warning" style="background: #008000;"> Delivered </span>
        
                  @if($order->return_order == 1) 
                  <span class="badge badge-pill badge-warning" style="background:red;">Return Requested </span>
        
                  @endif
        
                 @else
                 <span class="badge badge-pill badge-warning" style="background: #FF0000;"> Cancel </span>
        
                @endif
                  </p>
					</td>
              <td>
				<p><a href="{{ url('user/order_details/'.$order->id ) }}" class="genric-btn success-border circle small" style="font-size: 12px ">View</a>
							
				<a href="{{ url('user/invoice_download/'.$order->id ) }}" class="genric-btn info-border circle small">Download</a>
       			</p>
							</td>
						</tr>
						 @endforeach

					</tbody>
				</table>
			</div> 
		</div>
	</div>
</section>
<!--================End Order Details Area =================-->

@endsection