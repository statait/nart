@extends('admin.aDashboard')
@section('admins')

  {{-- TRIAL START --}}
  <div class="container-fluid">
	<div class="row">
	  <div class="col-lg-12 mb-lg-0 mb-4">
		<div class="card">
		  <div class="card-body p-3">
			<div class="row">
				
			<form class="insert-form" method="post" action="{{ route('production-store') }}">
			@csrf
			<div class="row">

			<div class="input-field">
				<table class="table table-bordered" id="table_field">
					  <tr>
						<th>Product Information</th>
						<th>Stock/Metric Ton</th> 
						<th>Quantity/Metric Ton</th>
						<th>Action</th>
					</tr>
					<tr>
						  <td>
							<select id="item" name="item[]" class="form-control" required="" >
								<option value="" selected="" disabled="">Select Product</option>
								@foreach($products as $product)
									 <option value="{{ $product->id }}">{{ $product->product_name }} ({{$product->product_code}})</option>	
								@endforeach
							</select>

						</td>
						  <td><input class="form-control stock" type="text" id="stock" name="stock[]" required="" readonly></td>
						
						  <td><input class="form-control qnty" type="number" id="qnty" name="qnty[]" required=""></td>
						  <td>
							<a name="add" id="add" class="btn bg-gradient-dark mb-0"><i class="fas fa-plus" aria-hidden="true"></i></a>
						</td>
					</tr>
				</table>
				
					{{-- <a type="submit" name="save" id="save" class="btn bg-gradient-dark mb-0">&nbsp;&nbsp;Save Production</a> --}}
					<input class="btn bg-gradient-dark mb-0" type="submit" name="save" id="save" value="
					Save Production">
				
			</div>
	  </form>
	</div>
</div>
</div>
</div>

</div>

@include('admin.body.footer')

{{-- TRIAL END --}}

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

  <script>
	// Add a search field to the dropdown
	$("#mySearch").on("keyup", function() {
	  var value = $(this).val().toLowerCase();
	  $("#mySelect option").filter(function() {
		$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
	  });
	});
  </script>
  
  <script>
	$(document).ready(function(){
		var html='<tr><td><select id="item" name="item[]" class="form-control" required="" ><option value="" selected="" disabled="">Select Product</option>@foreach($products as $product) <option value="{{ $product->id }}">{{ $product->product_name }} ({{$product->product_code}})</option>	@endforeach</select></td><td><input class="form-control stock" type="text" id="stock" name="stock[]" required="" readonly></td><td><input class="form-control qnty" type="number" id="qnty" name="qnty[]" required=""></td><td><a name="remove" id="remove" class="btn bg-gradient-danger mb-0"><i class="fas fa-minus" aria-hidden="true"></i></a></td></tr>';
	
		// var x =1;
	  $("#add").click(function(){
		$("#table_field").append(html);
	  });
	  $("#table_field").on('click', '#remove', function () {
    $(this).closest('tr').remove();
	totalPrice();
	duePrice();
	});


	$("#item").change(function() {
      // get the selected option value
      var selectedOption = $(this).val();
		// console.log('hello');
      // make an AJAX request to the server
      $.get('/get-data-product', { option: selectedOption }, function(data) {
        // update the field with the response data
        $("#stock").val(data.qty);
      });
    });

	$("#table_field tbody").on("change", "select[name='item[]']", function () {
		var product_id = $(this).val();
		var stock = $(this).closest("tr").find(".stock");
		$.get('/get-data-product', { option: product_id }, function(data) {
        // update the field with the response data
		if(data.qty == null){
			stock.val(0);
		}else{
			stock.val(data.qty);
		}
			
      });
		// price.val(product_id);
               
    });

	});
</script>

@endsection