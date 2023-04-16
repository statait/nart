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
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Amount</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Details</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
											 
										</tr>
									</thead>
									<tbody>
			@php
				$sl = 1;
			@endphp
	 @foreach($requisitions as $item)
	 <tr class="align-middle text-center text-sm">
		<td width="5%"><h6 class="mb-0 text-sm "> {{ $sl++ }}</h6></td>
        <td><p class="mb-0 text-sm">{{ $item->requisitionType->requisitionType }}</p></td>
		<td class="text-sm font-weight-bold mb-0">{{ $item->date }}</td>
		<td class="text-sm font-weight-bold mb-0">{{ $item->amount }}</td>
		<td class="text-sm font-weight-bold mb-0">{{ $item->details }} </td>
		<td class="text-sm font-weight-bold mb-0">{{ $item->status }} </td>
		@if ( $item->status == 'Unpaid' )
		<td>
			<a class="btn btn-link text-dark px-3 mb-0" href="{{ route('purchase.details',$item->id) }}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
			@if(Auth::guard('admin')->user()->type=="1" || Auth::guard('admin')->user()->type=="2")
			<a class="btn btn-link text-danger text-gradient px-3 mb-0" href="{{ route('purchase.status.port',$item->id) }}"><i class="fa-solid fa-credit-card me-2"></i>Paid</a>
			@endif
		</td>
		@else
	
		<td>
			<a class="btn btn-link text-dark px-3 mb-0" href="{{ route('purchase.details',$item->id) }}"><i class="fa-solid fa-eye text-dark me-2" aria-hidden="true"></i>View</a>
			
		</td>
		
		@endif
	
							 
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