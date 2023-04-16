
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
			@include('frontend.common.dealsOfTheWeek')
			<!-- <h2>Order Details</h2> -->
			<!-- <div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th scope="col">Product</th>
							<th scope="col">Quantity</th>
							<th scope="col">Total</th>
						</tr>
					</thead>
					<tbody>
						
						<tr>
							<td>
								<p></p>
							</td>
							<td>
								<h5></h5>
							</td>
							<td>
								<p></p>
							</td>
						</tr>
						

						<tr>
							<td>
								<h4></h4>
							</td>
							<td>
								<h5></h5>
							</td>
							<td>
								<p></p>
							</td>
						</tr>
						<tr>
							<td>
								<h4></h4>
							</td>
							<td>
								<p></p>
							</td>
							<td>
								<p></p>
							</td>
						</tr>
						<tr>
							<td>
								<h4></h4>
							</td>
							<td>
								<h5></h5>
							</td>
							<td>
								<p></p>
							</td>
						</tr>
					</tbody>
				</table>
			</div> -->
		</div>
	</div>
</section>
<!--================End Order Details Area =================-->

@endsection