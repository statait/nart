@extends('admin.aDashboard')
@section('admins')

<div class="container-fluid py-4">
  <div class="row">
			   
<!--   ------------ Add Brand Page -------- -->


        <div class="col-4">
          <div class="card">
            <div class="card-body p-3">
     <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Add Bank</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="table-responsive">


<form method="post" action="{{ route('bank.update', $bank->id) }}">
   @csrf
           
 <div class="form-group">
  <h6>Bank Name <span class="text-danger">*</span></h6>
  <div class="controls">
 <input type="text"  name="bank_name" class="form-control" value="{{$bank['bank_name']}}" > 
 @error('bank_name') 
 <span class="text-danger">{{ $message }}</span>
 @enderror 
</div>
</div>

<div class="form-group">
  <h6>A/C Name<span class="text-danger">*</span></h6>
  <div class="controls">
 <input type="text"  name="ac_name" class="form-control" value="{{$bank['ac_name']}}"  > 
 @error('ac_name') 
 <span class="text-danger">{{ $message }}</span>
 @enderror 
</div>
</div>

<div class="form-group">
  <h6>A/C Number<span class="text-danger">*</span></h6>
  <div class="controls">
 <input type="number"  name="ano_name" class="form-control" value="{{$bank['ano_name']}}"  > 
 @error('ano_name') 
 <span class="text-danger">{{ $message }}</span>
 @enderror 
</div>
</div>

<div class="form-group">
  <h6>Branch<span class="text-danger">*</span></h6>
  <div class="controls">
 <input type="text" name="branch" class="form-control" value="{{$bank['branch']}}"  >
   @error('branch') 
 <span class="text-danger">{{ $message }}</span>
 @enderror 
  </div>
</div>

<div class="form-group">
  <h6>Balance</h6>
  <div class="controls">
 <input type="number" name="balance" class="form-control" value="{{$bank['balance']}}"  >
   {{-- @error('sign_image') 
 <span class="text-danger">{{ $message }}</span>
 @enderror  --}}
  </div>
</div>


<div class="text-xs-right">
	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add bank">					 
						</div>
   
          </div>
</form>




          
        </div>
      </div>
      <!-- /.box-body -->
      </div>
      </div>
      </div>
      <!-- /.box --> 
    </div>

@endsection