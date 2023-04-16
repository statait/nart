
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
		
			<h2>Cancel Orders</h2> 
			<div class="table-responsive">
				<table class="table">
					<thead >
						<tr>
							<th scope="col"><strong> Date</strong></th>
							<th scope="col"><strong> Total</strong></th>
							<th scope="col"><strong>Payment</strong></th>
							<th scope="col"><strong>Invoice</strong></th>
							<th scope="col"><strong>Cancel Reason</strong></th>
							<th scope="col"><strong>Order Status </strong></th>
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
								<p>{{ $order->return_reason }}</p>
							</td>
              <td>
				<p>@if($order->return_order == 0) 
					<span> Pending </span>
          @elseif($order->return_order == 1)
                    <span class="badge badge-pill badge-warning">No Return Request </span>
        
                  @elseif($order->status == 'processing')
                  <span class="badge badge-pill badge-warning" style="background: #800000;"> Pending </span>
                  <span class="badge badge-pill badge-warning" style="background:red;">Return Requested </span>
        
                  @elseif($order->return_order == 2)
                  <span class="badge badge-pill badge-warning" style="background: #008000;">Success </span>
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