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
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email Price</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Phone %</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
											 
										</tr>
									</thead>
									<tbody>
            
 @foreach($customers as $item)
 <tr>
  <td>{{ $item->customer_name }}</td>
  <td>{{ $item->address }}</td>
  <td>{{ $item->email }}</td>
  <td>{{ $item->phone }}</td>
  <td>
<a href="{{ route('brand.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>
<a href="{{ route('brand.delete',$item->id) }}" class="btn btn-danger" title="Delete Data" id="delete">
 <i class="fa fa-trash"></i></a>
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

<form method="post" action="{{ route('dealer.store') }}">
@csrf
        
<div class="form-group">
<h6>Dealer Name <span class="text-danger">*</span></h6>
<div class="controls">
<input type="text"  name="customer_name" class="form-control" > 
@error('customer_name') 
<span class="text-danger">{{ $message }}</span>
@enderror 
</div>
</div>

<div class="form-group">
<h6>Email</h6>
<div class="controls">
<input type="text"  name="email" class="form-control" > 
</div>
</div>

<div class="form-group">
<h6>Phone</h6>
<div class="controls">
<input type="text"  name="phone" class="form-control" > 
</div>
</div>

<div class="form-group">
<h6>Address</h6>
<div class="controls">
<input type="text" name="address" class="form-control" >

</div>
</div>


<div class="text-xs-right">
<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Dealer">					 
         </div>

       </div>
</form>

</div>

</div>



{{-- TRIAL END --}}

    </div>
    @include('admin.body.footer')
  </div>
@endsection