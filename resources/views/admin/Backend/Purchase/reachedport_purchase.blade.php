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
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Chalan No.</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Supplier </th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">LC Date</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Grand Total</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Change Status</th>
											 
										</tr>
									</thead>
									<tbody>
			@php
				$sl = 1;
			@endphp
	 @foreach($purchases as $item)
	 <tr class="align-middle text-center text-sm">
		<td width="5%"><h6 class="mb-0 text-sm "> {{ $sl++ }}</h6></td>
        <td><p class="mb-0 text-sm">{{ $item->chalan_no }}</p></td>
		<td class="text-sm font-weight-bold mb-0">{{ $item->supplier->supplier_name }}</td>
		<td class="text-sm font-weight-bold mb-0">{{ $item->purchase_date }}</td>
		<td class="text-sm font-weight-bold mb-0">TK {{ $item->grand_total }} </td>
		<td><h6 class="badge badge-sm bg-gradient-primary"> {{ $item->status }}</h6></td>
		<td width="20%">
			<a class="btn btn-link text-dark px-3 mb-0" href="{{ route('purchase.details',$item->id) }}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
			@if(Auth::guard('admin')->user()->type=="1" || Auth::guard('admin')->user()->type=="2")
			<a class="btn btn-link text-danger text-gradient px-3 mb-0" href="{{ route('purchase.status.factory',$item->id) }}"><i class="fa-solid fa-warehouse me-2"></i>Factory</a>
			@endif
 {{-- <a href="{{ route('purchase.details',$item->id) }}" class="btn btn-primary" title="Purchase View"><i class="fa fa-eye"></i> </a>

 <a href="{{ route('purchase.status.factory',$item->id) }}" class="btn btn-info" title="Change Status"><i class="fa fa-pencil"></i> </a> --}}
{{-- 
 <a href="{{ url('quotation/invoice_download/'.$item->id ) }}" class="btn btn-danger" title="Download Quotation"><i class="fa fa-download"></i></a> --}}

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