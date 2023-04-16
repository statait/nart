@extends('admin.aDashboard')
@section('admins')

  {{-- TRIAL START --}}
  <div class="container-fluid">
	<div class="row">
	  <div class="col-lg-12 mb-lg-0 mb-4">
		<div class="card">
		  <div class="card-body p-3">
			<div class="row">
				
			<form class="insert-form" method="post" action="{{ route('todays-production-store') }}">
			@csrf
			<div class="row">

			<div class="input-field">
				<table class="table table-bordered" id="table_field">
					  <tr>
						<th>Product Information</th>
						<th>Quantity/Metric Ton</th>
						{{-- <th>Action</th> --}}
					</tr>
					<tr>
						  <td>
							<select id="item" name="item" class="form-control" required="" >
								<option value="Sulphuric Acid" selected="" disabled="">Sulphuric Acid</option>
							
							</select>

						</td>
						  <td><input class="form-control qnty" type="number" id="qnty" name="qnty" required=""></td>
						 
					</tr>
				</table>
				
					<input class="btn bg-gradient-dark mb-0" type="submit" name="save" id="save" value="
					Save Todays Production">
				
			</div>
	  </form>
	</div>
</div>
</div>
</div>

</div>

@include('admin.body.footer')

{{-- TRIAL END --}}

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

@endsection