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
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Chalan Date</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Customer Name</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Company</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Address</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Qty/MT</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total TK</th>
											{{-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Due</th> --}}
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
											 
										</tr>
									</thead>
									<tbody>
			@php
				$sl = 1;
			@endphp
	 @foreach($chalans as $item)
	 <tr class="align-middle text-center text-sm">
		<td width="5%"><h6 class="mb-0 text-sm "> {{ $sl++ }}</h6></td>
		<td class="text-sm font-weight-bold mb-0">{{ $item->chalan_no }}</td>
        <td class="text-sm font-weight-bold mb-0">{{ $item->chalan_date }}</td>
		<td class="text-sm font-weight-bold mb-0">{{ $item->customer->customer_name }}</td>
		<td class="text-sm  mb-0">{{ $item->company }}</td>
		<td class="text-sm  mb-0">{{ $item->address }}</td>
		<td class="text-sm font-weight-bold mb-0">{{ $item->qty }} </td>
		<td class="text-sm font-weight-bold mb-0">TK {{ $item->total }} </td>
		{{-- <td><h6 class="badge badge-sm bg-gradient-success"> {{ $item->due_amount }}</h6></td> --}}
		<td width="10%">
			{{-- <a class="btn btn-link text-dark px-3 mb-0" href="{{ route('purchase.details',$item->id) }}"><i class="fa-solid fa-eye me-2" aria-hidden="true"></i>View</a> --}}
			
			<a class="btn btn-link text-dark px-3 mb-0" href="{{ route('chalan.download',$item->id) }}"><i class="fa-solid fa-eye me-2" aria-hidden="true"></i>View</a>

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