@extends('admin.aDashboard')
@section('admins')

<div class="container-fluid py-4">
  <div class="row">
			   
		 

    <div class="col-8">

     <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Location List</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="table-responsive">
          <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Image</th>
              <th>Name </th>
              <th>Address </th>
              <th>Phone </th>
              {{-- <th>Map Link</th> --}}
              <th>Action</th>
               
            </tr>
          </thead>
          <tbody>
            
 @foreach($locations as $item)
 <tr>
  
  <td><img src="{{ asset($item->store_image) }}" style="width: 70px; height: 40px;"> </td>
  <td>{{ $item->store_name }}</td>
  <td>{{ $item->address }}</td>
  <td>{{ $item->phone }}</td>
  {{-- <td>{{ $item->map }}</td> --}}
  <td style="width: 21%">
<a href="{{route('store.location.edit',$item->id)}}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>
<a href="{{route('store.location.delete',$item->id)}}" class="btn btn-danger" title="Delete Data" id="delete">
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
    <!-- /.col -->


<!--   ------------ Add Location Page -------- -->


        <div class="col-4">

     <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Add Location </h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="table-responsive">


<form method="post" action="{{ route('store.location.store') }}" enctype="multipart/form-data">
   @csrf
           
 <div class="form-group">
  <h6>Store Name <span class="text-danger">*</span></h6>
  <div class="controls">
 <input type="text"  name="store_name" class="form-control" > 
 @error('store_name') 
 <span class="text-danger">{{ $message }}</span>
 @enderror 
</div>
</div>


<div class="form-group">
  <h6>Store Address<span class="text-danger">*</span></h6>
  <div class="controls">
 <input type="text" name="address" class="form-control" >
   @error('address') 
 <span class="text-danger">{{ $message }}</span>
 @enderror 
  </div>
</div>

<div class="form-group">
  <h6>Phone<span class="text-danger">*</span></h6>
  <div class="controls">
 <input type="text" name="phone" class="form-control" >
   @error('phone') 
 <span class="text-danger">{{ $message }}</span>
 @enderror 
  </div>
</div>

<div class="form-group">
  <h6>Map Link<span class="text-danger">*</span></h6>
  <div class="controls">
 <input type="text" name="map" class="form-control" >
   @error('map') 
 <span class="text-danger">{{ $message }}</span>
 @enderror 
  </div>
</div>

<div class="form-group">
  <h6>Store Image <span class="text-danger">*</span></h6>
  <div class="controls">
 <input type="file" name="store_image" class="form-control" >
   @error('store_image') 
 <span class="text-danger">{{ $message }}</span>
 @enderror 
  </div>
</div>


<div class="text-xs-right">
	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Store">					 
						</div>

          </div>
</form>




          
        </div>
      </div>
      <!-- /.box-body -->
      </div>
      <!-- /.box --> 
    </div>

@endsection