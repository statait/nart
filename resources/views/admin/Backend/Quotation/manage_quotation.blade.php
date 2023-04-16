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
				  <h3 class="box-title">Quotation List <span class="badge badge-pill badge-danger"> {{ count($quotations) }} </span></h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>SL.</th>
								<th>Invoice</th>
								<th>Customer Name</th>
								<th>Quotation Date</th>
								<th>Expiry Date</th>
								<th>Discount %</th>
								<th>Grand Total</th>
								<th>Created By</th>
								<th>Action</th>
								 
							</tr>
						</thead>
						<tbody>
			@php
				$sl = 0;
			@endphp
	 @foreach($quotations as $item)
	 <tr>
		<td width="5%">{{ $sl++ }}</td>
        <td>{{ $item->invoice }}</td>
		<td>{{ $item->customer->customer_name }}</td>
		<td>{{ $item->quotation_date }}</td>
		 <td>{{ $item->expire_date }} </td>
		 <td> 
			@if($item->discount_percentage == NULL && $item->discount_flat == NULL)
			<span class="badge badge-pill badge-danger">No Discount</span>
			@elseif ($item->discount_percentage == NULL)
			  <span class="badge badge-pill badge-danger">TK {{ round($item->discount_flat)  }}</span>
			@else
			<span class="badge badge-pill badge-danger">{{ $item->discount_percentage }}%</span>
			@endif
		</td>

			<td>TK {{ $item->grand_total }} </td>
	
		 <td>{{ $item->auth->name }} </td>
     




		<td width="30%">
 <a href="{{ route('view.quotation',$item->id) }}" class="btn btn-primary" title="Quotation View"><i class="fa fa-eye"></i> </a>

 {{-- <a href="{{ route('product.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a> --}}

 <a href="{{ url('quotation/invoice_download/'.$item->id ) }}" class="btn btn-danger" title="Download Quotation">
 	<i class="fa fa-download"></i></a>

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