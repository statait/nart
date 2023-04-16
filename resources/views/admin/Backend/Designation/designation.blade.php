@extends('admin.aDashboard')
@section('admins')



  <!-- Content Wrapper. Contains page content -->
  
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			   
		 

			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Designation List <span class="badge badge-pill badge-danger"> {{ count($designations) }} </span></h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								{{-- <th>Category Icon </th> --}}
								<th>Designation Name</th>
								<th>Action</th>
								 
							</tr>
						</thead>
						<tbody>
	 @foreach($designations as $item)
	 <tr>
		{{-- <td> <span><i class="{{ $item->category_icon }}"></i></span>  </td> --}}
		<td>{{ $item->designation }}</td>
		<td>
 <a href="{{ route('category.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>
 <a href="{{ route('category.delete',$item->id) }}" class="btn btn-danger" title="Delete Data" id="delete">
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


<!--   ------------ Add Category Page -------- -->


          <div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h6 class="box-title">Add Expense Type </h6>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">


 <form method="post" action="{{ route('designation.store') }}">
	 	@csrf
					   
	 <div class="form-group">
		<h6>Designation Name<span class="text-danger">*</span></h6>
		<div class="controls">
	 <input type="text"  name="designation" class="form-control" required=""> 
	 {{-- @error('category_name') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror  --}}
	</div>
	</div> 

					 

			 <div class="text-xs-right">
	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Designation">					 
						</div>
					</form>
				</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box --> 
			</div>

 


		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  



@endsection