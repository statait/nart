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
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Code</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stock</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Buying Price</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Selling Price</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
											 
										</tr>
									</thead>
									<tbody>
				 @foreach($products as $item)
				 <tr class="align-middle text-center text-sm">
					<td><h6 class="mb-0 text-sm">{{ $item->product_code }}</h6></td>
					<td><p class="mb-0 text-sm">{{ $item->product_name }}</p></td>
					<td><p class="mb-0 text-sm">{{ $item->qty }}</p></td>
					<td class="text-sm font-weight-bold mb-0">TK {{ $item->selling_price }} </td>
					<td class="text-sm font-weight-bold mb-0">TK {{ $item->discount_price }} </td>
					
					<td>

			 <a class="btn btn-link text-dark px-3 mb-0" href="{{ route('product.edit',$item->id) }}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
			
			 <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="{{ route('product.delete',$item->id) }}"><i class="far fa-trash-alt me-2" aria-hidden="true"></i>Delete</a>
			
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