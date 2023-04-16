@extends('admin.aDashboard')
@section('admins')

 {{-- TRIAL START --}}
 <div class="container-fluid">
	<div class="row mt-4">
	

{{-- ADD CUSTOMER --}}
<div class="col-lg-6 mb-lg-0 mb-4">
  <div class="card">
    <div class="card-body p-3">
      <div class="row">

<form method="post" action="{{ route('customer.update', $customer->id) }}">
@csrf
        
<div class="form-group">
<label  class="text-uppercase text-dark text-xs font-weight-bold ">Customer Name</label>
<div class="controls">
<input type="text" value="{{$customer->customer_name}}"  name="customer_name" class="form-control" > 
@error('customer_name') 
<span class="text-danger">{{ $message }}</span>
@enderror 
</div>
</div>

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Email</label>
<div class="controls">
<input type="text" value="{{$customer->email}}"  name="email" class="form-control" > 
</div>
</div>

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Phone</label>
<div class="controls">
<input type="text" value="{{$customer->phone}}" name="phone" class="form-control" > 
</div>
</div>

<div class="form-group">
	<label  class="text-uppercase text-dark text-xs font-weight-bold ">Address</label>
<div class="controls">
<input type="text" value="{{$customer->address}}" name="address" class="form-control" >

</div>
</div>


{{-- <div class="text-xs-right"> --}}
<input type="submit" class="btn btn-rounded btn-dark mb-5" value="Update Customer">					 
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