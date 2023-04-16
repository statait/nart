@extends('admin.aDashboard')
@php
use Illuminate\Support\Facades\Auth;
@endphp
@section('admins')



  <!-- Content Wrapper. Contains page content -->
  
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			   
		 

			<div class="col-8">
			 <div class="card">
				<div class="card-body p-3">
					<div class="box">
									<div class="box-header with-border">
										<h3 class="box-title">Category List <span class="badge badge-pill badge-danger"> {{ count($category) }} </span></h3>
									</div>
									<!-- /.box-header -->
									<div class="box-body">
										<div class="table-responsive">
										  <table id="example1" class="table table-bordered table-striped">
											<thead>
												<tr>
													{{-- <th>Category Icon </th> --}}
													<th>Category Name</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
						 @foreach($category as $item)
						 <tr>
							{{-- <td> <span><i class="{{ $item->category_icon }}"></i></span>  </td> --}}
							<td>{{ $item->category_name }}</td>
							<td>

					<a class="btn btn-link text-dark px-3 mb-0" href="{{ route('category.edit',$item->id) }}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
			
					<a class="btn btn-link text-danger text-gradient px-3 mb-0" href="{{ route('category.delete',$item->id) }}"><i class="far fa-trash-alt me-2" aria-hidden="true"></i>Delete</a>
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


<!--   ------------ Add Category Page -------- -->


          <div class="col-4">
			<div class="card">
				<div class="card-body p-3">
			 <div class="box">
				<div class="box-header with-border">
				  <h6 class="box-title">Add Category </h6>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">


 <form method="post" action="{{ route('category.store') }}" enctype="multipart/form-data" >
	 	@csrf
					   
	 <div class="form-group">
		<h6>Category Name <span class="text-danger">*</span></h6>
		<div class="controls">
	 <input type="text"  name="category_name" class="form-control" > 
	 @error('category_name') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	</div>
	</div> 

					 

			 <div class="text-xs-right">
	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Category">					 
						</div>
					</form>
				</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box --> 
			</div>
			</div>
			</div>

 


		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  



@endsection