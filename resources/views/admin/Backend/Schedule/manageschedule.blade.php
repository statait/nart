@extends('admin.aDashboard')
@section('admins')

  <!-- Content Wrapper. Contains page content -->

 {{-- TRIAL START --}}
 <div class="container-fluid">
	<div class="col-md-12 mb-lg-0 mb-3">
		<div class="card p-3">
		<div class="card-header pb-0 p-3">

		</div>
		<form method="post" action="{{ route('schedule.filter') }}">
			@csrf
		<div class="card-body p-2">
			<div class="row">
			<div class="col-md-5 mb-md-0 mb-4">
			<div class="">
				<input class="form-control date mb-3" value="" type="date" id="sdate" name="sdate" required="">
			</div>
			</div>
			<div class="col-md-5">
			<div class="">
				<input class="form-control date mb-3" value="" type="date" id="edate" name="edate" required="">
			</div>
			</div>
			<div class="col-md-2">
				<div class="">
					<input class="btn bg-gradient-dark mb-0" type="submit" name="save" id="save" value="
					Filter Schedule">
				</div>
			</div>
		</form>
		</div>
		</div>
		</div>
		</div>

		
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
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Party Name</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Quantity</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Time</th>
											{{-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th> --}}
											 
										</tr>
									</thead>
									<tbody>
				 @foreach($schedules as $item)
				 <tr>
					<td><h6 class="mb-0 text-sm">{{ $item->schedule_date }}</h6></td>
					<td><h6 class="mb-0 text-sm">{{ $item->customer->customer_name }}</h6></td>
					<td><h6 class="mb-0 text-sm">{{ $item->qty }}</h6></td>
					<td><h6 class="mb-0 text-sm">{{ $item->time }}</h6></td>

					{{-- <td>
			 <a class="btn btn-link text-dark px-3 mb-0" href="{{ route('product.edit',$item->id) }}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
			
			 <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="{{ route('product.delete',$item->id) }}"><i class="far fa-trash-alt me-2" aria-hidden="true"></i>Delete</a>
			
					</td> --}}
										 
				 </tr>
				  @endforeach
									</tbody>
									 
								  </table>
								</div>
							{{-- </div> --}}
			</div>
		  </div>
		  <input class="btn bg-gradient-dark mb-0" type="submit" name="save" id="save" value="
		  Print PDF">
		</div>
	  </div>

	</div>

	@include('admin.body.footer')
	
	<script>
		$(document).ready(function() {
  $('form').submit(function(event) {
    event.preventDefault(); // prevent default form submission
    // your form submission code here
  });
});
	</script>
@endsection