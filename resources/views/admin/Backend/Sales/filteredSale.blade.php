@extends('admin.aDashboard')
@section('admins')

	  {{-- TRIAL START --}}
	  <div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				<div class="card">
					<div class="card-body p-3">
						<div class="form-filter">
							<form method="post" action="{{ route('sale.filter') }}">
								@csrf
								<div class="card-body p-2">
									<div class="row">
										<div class="col-md-6 mb-md-0 mb-4">
											<div class="">
												<input class="form-control date mb-3" value="" type="date" id="sdate" name="sdate" required="">
											</div>
										</div>
										<div class="col-md-6">
											<div class="">
												<input class="form-control date mb-3" value="" type="date" id="edate" name="edate" required="">
											</div>
										</div>
										<div class="col-md-12">
											<div class="">
												<input class="btn bg-gradient-dark mb-0" type="submit" name="save" id="save" value="Filter Schedule">
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-1">
				<div class="card">
					<div class="card-body p-3">
						<div class="form-download">
							<form action="{{ route('download.pdf.sale') }}" method="GET">
								@csrf
								<input type="hidden" name="type" value="pdf">
								<input type="hidden" name="filtersale" value="{{ $filtersale->toJson() }}">
								<div class="">
									<input class="btn bg-gradient-dark mb-0" type="submit" name="save" id="save" value="PDF">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	
	

		
	<div class="row mt-4">
		<div class="col-lg-12 mb-lg-0 mb-4">
		  <div class="card">
			<div class="card-body">
			  <div class="row">
							  <!-- /.box-header -->
							  {{-- <div class="box-body"> --}}
								  <div class="table-responsive">
									<table id="example1" class="table table-bordered table-striped">
									  <thead>
										  <tr>
											  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
											  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Invoice</th>
											  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Customer Name</th>
											  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Grand Total</th>
											  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Paid Amount</th>
											  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Due Amount</th>
											  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Buying Price</th>
											  {{-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Selling Price</th> --}}
											  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Profit</th>
											   
										  </tr>
									  </thead>
									  <tbody>
										@php
										$totalProfit = 0;
										@endphp
				   @foreach($filtersale as $item)
				   <tr>
					  <td><h6 class="mb-0 text-sm">{{ $item->sale_date }}</h6></td>
					  <td><h6 class="mb-0 text-sm">{{ $item->invoice }}</h6></td>
				  @php
					  $customerV = $item->customer_id;
					  $customer = \App\Models\Customer::find($customerV);

					  $sale_id = $item->id;
					  $productIds = \App\Models\SalesItem::where('sale_id',$sale_id)->pluck('product_id');
					  $qtys = \App\Models\SalesItem::where('sale_id',$sale_id)->pluck('qty');
					  
					  $totalBuyingPrice = 0;
					  $totalSellingPrice = 0;
					  $profit = 0;

					foreach ($productIds as $key => $productId) {
						$product = \App\Models\Product::find($productId);
						
						if ($product) {
							$qty = $qtys[$key];
							$totalBuyingPrice += $product->selling_price * $qty;
							$totalSellingPrice += $product->discount_price * $qty;
							$profit = $totalSellingPrice - $totalBuyingPrice;
							$totalProfit += $profit;
						}
					}
					  
				  @endphp
		  
				  @if ($customer)
					<td><h6>
						  {{$item->customer->customer_name}}
						</h6>
					  </td>
					  @else
					  <td><h6 style="color:red
					  ">Customer Deleted </h6></td>
				@endif
					  {{-- <td><h6 class="mb-0 text-sm">{{ $item->customer->customer_name }}</h6></td> --}}
					  <td><h6 class="mb-0 text-sm">{{ $item->grand_total }}</h6></td>
					  <td><h6 class="mb-0 text-sm">{{ $item->p_paid_amount }}</h6></td>
					  <td><h6 class="mb-0 text-sm">{{ $item->due_amount }}</h6></td>
					  <td><h6 class="mb-0 text-sm">{{ $totalBuyingPrice }}</h6></td>
					  {{-- <td><h6 class="mb-0 text-sm">{{ $totalSellingPrice }}</h6></td> --}}
					  <td><h6 class="mb-0 text-sm">{{ $profit }}</h6></td>
  
					  {{-- <td>
			   <a class="btn btn-link text-dark px-3 mb-0" href="{{ route('product.edit',$item->id) }}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
			  
			   <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="{{ route('product.delete',$item->id) }}"><i class="far fa-trash-alt me-2" aria-hidden="true"></i>Delete</a>
			  
					  </td> --}}
										   
				   </tr>
					@endforeach
					{{-- <tr>
						<th></th>
						<th ></th>
						<th > </th>
						<th > </th>
						<th > </th>
						<th > </th>
						<th></th>
						<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Selling Price</th>
						<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{$totalProfit}}</th>
						 
					</tr> --}}
									  </tbody>
									   
									</table>
								  </div>
							  {{-- </div> --}}
			  </div>
			</div>
		  </div>
		</div>
  
	  </div>
	</div>
	  @include('admin.body.footer')

	  {{-- TRIAL END --}}
@endsection
