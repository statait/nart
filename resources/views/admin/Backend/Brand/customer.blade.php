@extends('admin.aDashboard')
@section('admins')

 {{-- TRIAL START --}}
 <div class="container-fluid">
	<div class="row mt-4">
	  <div class="col-lg-8 mb-lg-0 mb-4">
		<div class="card">
		  <div class="card-body p-3">
			<div class="row">
							<!-- /.box-header -->
							{{-- <div class="box-body"> --}}
								<div class="table-responsive">
								  <table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
										
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Address </th>
											{{-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th> --}}
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Phone</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
											 
										</tr>
									</thead>
									<tbody>
            
 @foreach($customers as $item)
 <tr>
  <td>{{ $item->customer_name }}</td>
  <td style="white-space: initial">{{ $item->address }}</td>
  {{-- <td>{{ $item->email }}</td> --}}
  <td>{{ $item->phone }}</td>
  <td>
<a href="{{ route('customer.edit',$item->id) }}" class="btn btn-link text-dark px-3 mb-0" title="Edit Data"><i class="fas fa-pencil-alt text-dark me-2"></i>Edit</a>
<a href="{{ route('customer.delete',$item->id) }}" class="btn btn-link text-danger text-gradient px-3 mb-0" title="Delete Data" id="delete"><i class="fa-solid fa-trash me-2"></i>Delete</a>
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

{{-- ADD CUSTOMER --}}
<div class="col-lg-4 mb-lg-0 mb-4">
  <div class="card">
    <div class="card-body p-3">
      <div class="row">

<form method="post" action="{{ route('customer.store') }}">
@csrf
        
<div class="form-group">
<label  class="text-uppercase text-dark text-xs font-weight-bold ">Customer Name</label>
<div class="controls">
<input type="text"  name="customer_name" class="form-control" > 
@error('customer_name') 
<span class="text-danger">{{ $message }}</span>
@enderror 
</div>
</div>

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Email</label>
<div class="controls">
<input type="text"  name="email" class="form-control" > 
</div>
</div>

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Phone</label>
<div class="controls">
<input type="text"  name="phone" class="form-control" > 
</div>
</div>

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Address</label>
<div class="controls">
<input type="text" name="address" class="form-control" >

</div>
</div>


{{-- <div class="text-xs-right"> --}}
<input type="submit" class="btn btn-rounded btn-dark mb-5" value="Add Customer">					 
         {{-- </div> --}}

       </div>
</form>

</div>

</div>



{{-- TRIAL END --}}

    </div>
    @include('admin.body.footer')
  </div>
@endsection