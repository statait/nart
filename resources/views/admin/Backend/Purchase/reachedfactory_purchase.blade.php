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
										<tr>
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
				$sl = 0;
			@endphp
	 @foreach($purchases as $item)
	 <tr>
		<td width="5%">{{ $sl++ }}</td>
        <td>{{ $item->chalan_no }}</td>
		<td>{{ $item->supplier->supplier_name }}</td>
		<td>{{ $item->purchase_date }}</td>
		<td>TK {{ $item->grand_total }} </td>
		<td>{{ $item->status }}</td>
		<td width="20%">
 <a href="{{ route('purchase.details',$item->id) }}" class="btn btn-primary" title="Purchase View"><i class="fa fa-eye"></i> </a>

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