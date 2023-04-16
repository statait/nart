@extends('admin.aDashboard')
@section('admins')

<div class="container-fluid py-4">
  <div class="row">
			   
		 

    <div class="col-8">
      <div class="card">
				<div class="card-body p-3">
     <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Bank List</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="table-responsive">
          <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Name </th>
              <th>A/C Name</th>
              <th>A/C Number</th>
              <th>Branch</th>
              <th>Balance</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            
 @foreach($banks as $item)
 <tr>
  <td>{{ $item->bank_name }}</td>
  <td>{{ $item->ac_name }}</td>
  <td>{{ $item->ano_name }}</td>
  <td>{{ $item->branch }}</td>
  <td>{{ $item->balance }}</td>
  <td>
<a href="{{ route('bank.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>
<a href="{{ route('bank.delete',$item->id) }}" class="btn btn-danger" title="Delete Data" id="delete">
 <i class="fa fa-trash"></i></a>
  </td>
             
 </tr>
  @endforeach
          </tbody>
           
          </table>
        </div>
      </div>
      <!-- /.box-body -->
      </div>
      <!-- /.box -->

              
    </div>
    </div>
    </div>
    <!-- /.col -->


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


<form method="post" action="{{ route('bank.store') }}">
   @csrf
           
 <div class="form-group">
  <h6>Bank Name <span class="text-danger">*</span></h6>
  <div class="controls">
 <input type="text"  name="bank_name" class="form-control" > 
 @error('bank_name') 
 <span class="text-danger">{{ $message }}</span>
 @enderror 
</div>
</div>

<div class="form-group">
  <h6>A/C Name<span class="text-danger">*</span></h6>
  <div class="controls">
 <input type="text"  name="ac_name" class="form-control" > 
 @error('ac_name') 
 <span class="text-danger">{{ $message }}</span>
 @enderror 
</div>
</div>

<div class="form-group">
  <h6>A/C Number<span class="text-danger">*</span></h6>
  <div class="controls">
 <input type="number"  name="ano_name" class="form-control" > 
 @error('ano_name') 
 <span class="text-danger">{{ $message }}</span>
 @enderror 
</div>
</div>

<div class="form-group">
  <h6>Branch<span class="text-danger">*</span></h6>
  <div class="controls">
 <input type="text" name="branch" class="form-control" >
   @error('branch') 
 <span class="text-danger">{{ $message }}</span>
 @enderror 
  </div>
</div>

<div class="form-group">
  <h6>Balance</h6>
  <div class="controls">
 <input type="number" name="balance" class="form-control" >
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