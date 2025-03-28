@extends('admin.aDashboard')
@section('admins')

 {{-- TRIAL START --}}
 <div class="container-fluid">
	<div class="row mt-4">
	  <div class="col-lg-12 mb-lg-0 mb-4">
		<div class="card">
		  <div class="card-body p-3">
			<div class="row">
							<!-- /.box-header -->
							{{-- <div class="box-body"> --}}
								<div class="table-responsive">
								  <table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr class="align-middle text-center">
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sl.</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Customer</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Details</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Grand Total</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Paid</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Due</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Delivery Status</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
											 
										</tr>
									</thead>
									<tbody>
			@php
				$sl = 1;
			@endphp
	 @foreach($sales as $item)
	 <tr class="align-middle text-center text-sm">
		<td width="5%"><h6 class="mb-0 text-sm "> {{ $sl++ }}</h6></td>
        <td><p class="mb-0 text-sm">{{ $item->sale_date }}</p></td>
		@php
			$customerV = $item->customer_id;
			$customer = \App\Models\Customer::find($customerV);
		@endphp

		@if ($customer)
			<td class="text-sm font-weight-bold mb-0">{{ $customer->customer_name }}</td>
		@else
			<td class="text-danger">Customer Deleted</td>
		@endif
		
		<td class="text-sm font-weight-bold mb-0">{{ $item->details }}</td>
		<td class="text-sm font-weight-bold mb-0">TK {{ $item->grand_total }} </td>
		<td class="text-sm font-weight-bold mb-0">TK {{ $item->p_paid_amount }} </td>
		<td><h6 class="badge badge-sm bg-gradient-success"> {{ $item->due_amount }}</h6></td>
		<td class="text-sm font-weight-bold mb-0">{{ $item->delivery_status }}</td>
		<td width="20%">
			<a class="btn btn-link text-dark px-3 mb-0" href="{{ route('sale.edit',$item->id) }}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
			
			<a class="btn btn-link text-danger text-gradient px-3 mb-0" href="{{ route('sale.download',$item->id) }}"><i class="fa-solid fa-download me-2"></i>Download</a>

			@if(Auth::guard('admin')->user()->type=="1" || (Auth::guard('admin')->user()->type=="2"))
			<a class="btn btn-link text-danger text-gradient px-3 mb-0" href="{{ route('sale.delete',$item->id) }}"><i class="fa-solid fa-trash me-2"></i>Delete</a>
			@endif
 {{-- <a href="{{ route('purchase.details',$item->id) }}" class="btn btn-primary" title="Purchase View"><i class="fa fa-eye"></i> </a>

 <a href="{{ route('purchase.status.port',$item->id) }}" class="btn btn-info" title="Change Status"><i class="fa fa-pencil"></i> </a> --}}

		</td>
							 
	 </tr>
	  @endforeach
	</tbody>
									 
</table>
</div>
{{-- </div> --}}
</div>
</div>
</div>
</div>

</div>

@include('admin.body.footer')

{{-- TRIAL END --}}


@endsection