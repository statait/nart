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
                    <a href="{{ route('add.admin') }}" class="btn btn-danger" style="float: right;">Add Admin User</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Image  </th>
								<th>Name  </th>
								<th>Email </th> 
								<th>Access </th>
								<th>Action</th>

							</tr>
						</thead>
						<tbody>
	 @foreach($adminuser as $item)
	 <tr>
        <td> <img src="{{ asset($item->profile_photo_path) }}" style="width: 50px; height: 50px;">  </td>
		<td> {{ $item->name }}  </td>
        <td> {{ $item->email  }}  </td>

        <td>
			@if($item->customer == 1)
			<span class="badge btn-primary">Customer</span>
			@else
			@endif

			@if($item->site == 1)
			<span class="badge btn-secondary">Site</span>
			@else
			@endif

			@if($item->product == 1)
			<span class="badge btn-success">Product</span>
			@else
			@endif

			@if($item->bank == 1)
			<span class="badge btn-danger">Bank</span>
			@else
			@endif

			{{-- @if($item->production == 1)
			<span class="badge btn-warning">Production</span>
			@else
			@endif --}}

			@if($item->report == 1)
			<span class="badge btn-info">report</span>
			@else
			@endif

			@if($item->sale == 1)
			<span class="badge btn-dark">Sale</span>
			@else
			@endif

			{{-- @if($item->expense == 1)
			<span class="badge btn-light">Expense</span>
			@else
			@endif --}}

			{{-- @if($item->chalan == 1)
			<span class="badge btn-primary">Chalan</span>
			@else
			@endif --}}

			{{-- @if($item->hr == 1)
			<span class="badge btn-light">HR</span>
			@else
			@endif --}}

			{{-- @if($item->schedule == 1)
			<span class="badge btn-success">Orders</span>
			@else
			@endif --}}

			@if($item->adminuserrole == 1)
			<span class="badge btn-dark">Adminuserrole</span>
			@else
			@endif

		  </td>

		<td width="25%">
            <a href="{{ route('edit.admin.user',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>
            <a href="{{ route('delete.admin.user',$item->id) }}" class="btn btn-danger" title="Delete" id="delete">
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