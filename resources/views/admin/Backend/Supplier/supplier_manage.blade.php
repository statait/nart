@extends('admin.aDashboard')
@section('admins')

  <!-- Content Wrapper. Contains page content -->
  
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			   
		 

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Supplier List <span class="badge badge-pill badge-danger"> {{ count($suppliers) }} </span></h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
							
								<th>Supplier Name</th>
								<th>Address </th>
								<th>Mobile No.</th>
								<th>Email</th>
								<th>City</th>
								<th>State </th>
								<th>Zip Code</th>
								<th>Country</th>
								<th>Action</th>
								 
							</tr>
						</thead>
						<tbody>
	 @foreach($suppliers as $item)
	 <tr>
		<td>{{ $item->supplier_name }}</td>
		<td>{{ $item->address }}</td>
		 <td>{{ $item->mobile }} </td>
		 <td>{{ $item->email_address }}</td>
		 <td>{{ $item->city }}</td>
		 <td>{{ $item->state }}</td>
		 <td>{{ $item->zip }}</td>
		 <td>{{ $item->country }}</td>


		<td width="20%">
 <a href="{{ route('product.edit',$item->id) }}" class="btn btn-primary" title="Product Details Data"><i class="fa fa-eye"></i> </a>

 <a href="{{ route('product.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>

 <a href="{{ route('product.delete',$item->id) }}" class="btn btn-danger" title="Delete Data" id="delete">
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

 
 


		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  



@endsection