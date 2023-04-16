@extends('admin.aDashboard')
@section('admins')

<!-- Content Wrapper. Contains page content -->
  
<div class="container-full">
	<!-- Content Header (Page header) -->
	 


	<!-- Main content -->
	<section class="content">
		<form class="insert-form" id="insert_form" method="post" action="{{ route('repeater') }}">
			@csrf
	
			<div class="row">
				<div class="col">
					<div class="row mb-3">
						<div class="col-2"><label for="mySelect">Customer</label></div>
						<div class="col"><input type="text" id="mySearch" class="form-control mb-3" placeholder="Search Customer">
							<select id="mySelect" name="customer_id" class="form-control">
							<option value="{{$quotation->customer_id}}" selected="" disabled="">{{$quotation->customer->customer_name}}</option>
							@foreach($customers as $customer)
									 <option value="{{ $customer->id }}">{{ $customer->customer_name }}</option>	
							@endforeach
							<!-- More options -->
							</select></div>
						</div>
	
						<div class="row mb-3">
							<div class="col-2"><label>Phone</label></div>
							<div class="col"><input class="form-control mb-3" value="{{$quotation->customer->phone}}" type="text" id="phone" name="phone" readonly value=""></div>
						</div>
	
						<div class="row mb-3">
							<div class="col-2"><label>Address</label></div>
							<div class="col"><input class="form-control mb-3" type="text" id="address" name="address" value="{{$quotation->customer->address}}" readonly></div>
						</div>
				</div>
				<div class="col">
					<div class="row mb-3">
						<div class="col-2"><label>Quotation Date</label></div>
						<div class="col"><input value="{{$quotation->quotation_date}}" class="form-control mb-3" type="date" id="quoDate" name="quoDate"></div>
					</div>
					<div class="row mb-3">
						<div class="col-2"><label>Expire Date</label></div>
						<div class="col"><input value="{{$quotation->expire_date}}" class="form-control mb-3" type="date" id="expDate" name="expDate"></div>
					</div>
					<div class="row mb-3">
						<div class="col"><input class="form-control mb-3" type="hidden" id="auth_id" name="auth_id" value="{{ Auth::id()}}">
						</div>
					</div>
			
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-1"><label>Details</label></div>
				<div class="col"><input value="{{$quotation->details}}" class="form-control mb-3" type="text" id="details" name="details"></div>
			</div>
            
			<div class="input-field">
				<table class="table table-bordered" id="table_field">
					  <tr>
						  <th>Item Information</th>
						  <th>Description</th> 
						  <th>Rate</th>
						  <th>Qty</th>
						  <th>Total</th>
						  <th>Add or Remove</th>
					</tr>
					@foreach ($quotationItems as $item)
					<tr>
						  <td>
							<select id="item" name="item[]" class="form-control" required="" >
								<option value="" selected="" disabled="">{{ $item->product->product_name }}</option>
								@foreach($products as $product)
									 <option value="{{ $product->id }}">{{ $product->product_name }}</option>	
								@endforeach
							</select>

							
							{{-- <input class="form-control" type="text" name="txtFullname[]"
						  required=""> --}}
						</td>
						  <td><input class="form-control" type="text" id="description" name="description[]" required=""></td>
						  <td><input class="form-control unit_price" value="{{ $item->price }}" type="text" id="unit_cost" name="unit_cost[{{ $item->id }}]" required=""></td>
						  <td><input class="form-control qty" value="{{ $item->qty }}" type="text" id="qty" name="qty[{{ $item->id }}]" required=""></td>
						  <td><input class="form-control total" type="text" value="{{ $item->amount }}" id="amount" name="amount[{{ $item->id }}]" value="0" readonly></td>
						  <td><input class="btn btn-danger" type="button" name="remove" id="remove" value="remove"></td>
					</tr>

                    @endforeach
					{{-- <tr>
						<td>
						  <select id="item" name="item[]" class="form-control" required="" >
							  <option value="" selected="" disabled="">Select Product</option>
							  @foreach($products as $product)
								   <option value="{{ $product->id }}">{{ $product->product_name }}</option>	
							  @endforeach
						  </select>

					  </td>
						<td><input class="form-control" type="text" id="description" name="description[]" required=""></td>
						<td><input class="form-control unit_price" type="text" id="unit_cost" name="unit_cost[]" required=""></td>
						<td><input class="form-control qty" type="text" id="qty" name="qty[]" required=""></td>
						<td><input class="form-control total" type="text" id="amount" name="amount[]" value="0" readonly></td>
						<td><input class="btn btn-warning" type="button" name="add" id="add" value="Add"></td>
				  </tr> --}}
				</table>
				
					<div class="row">
					<div class="col">
					</div>

					<div class="col-4">
						<div class="row mb-3">
							<div class="col-4"><label>Sub Total</label></div>
							<div class="col"><span><input value="{{$quotation->sub_total}}" class="form-control" type="text" name="subtotal" id="subtotal" readonly></span>
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-4"><label>Discount (%)</label></div>
							<div class="col"><input value="{{$quotation->discount_percentage}}" class="dper form-control" type="number" id="discount-percentage" name="dper">
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-4"><label>VAT (%)</label></div>
							<div class="col"><input value="{{$quotation->vat_percentage}}" class="vper form-control" type="number" id="vat-percentage" name="">
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-4"><label>Discount (TK)</label></div>
							<div class="col"><input value="{{$quotation->discount_flat}}" class="dflat form-control" name="dflat" type="number" id="discount-flat">
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-4"><label>Grand Total</label></div>
							<div class="col"><input value="{{$quotation->grand_total}}" class="form-control" type="text" name="grandtotal" id="grandtotal" readonly>
							</div>
						</div>

						<div class="row mb-3">
							<div class="col-4"><label>Paid Amount</label></div>
							<div class="col"><input value="{{$quotation->paid_amount}}" class="form-control" type="text" name="paidamount" id="paidamount">
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-4"><label>Due Amount</label></div>
							<div class="col"><input value="{{$quotation->due_amount}}" class="form-control" type="text" name="dueamount" id="dueamount" readonly>
							</div>
						</div>
					
					</div>
				</div>
				
					<input class="btn btn-success" type="submit" name="save" id="save" value="
					Update Quotation">
	
			</div>
	  </form>
	</section>
	<!-- /.content -->
  
  </div>


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
		var html='<tr><td><select id="item" name="item[]" class="form-control" required=""><option value="" selected="" disabled="">Select Product</option>@foreach($products as $product)<option value="{{ $product->id }}">{{ $product->product_name }}</option>@endforeach</select></td><td><input class="form-control" type="text" id="description" name="description[]" required=""></td><td><input class="form-control unit_price" type="text" id="unit_cost" name="unit_cost[]" required=""></td><td><input class="form-control qty" type="text" id="qty" name="qty[]" required=""><td><input class="form-control total" type="text" id="amount" name="amount[]" value="0" readonly></td></td><td><input class="btn btn-danger" type="button" name="remove" id="remove" value="remove"></td></tr>';
		var x =1;
	  $("#add").click(function(){
		$("#table_field").append(html);
	  });
	  $("#table_field").on('click', '#remove', function () {
    $(this).closest('tr').remove();
	});
	
	$("#table_field tbody").on("input", ".unit_price", function () {
                var unit_price = parseFloat($(this).val());
                var qty = parseFloat($(this).closest("tr").find(".qty").val());
                var total = $(this).closest("tr").find(".total");
                total.val(unit_price * qty);
				totalPrice();
            });
	$("#table_field tbody").on("input", ".qty", function () {
		var qty = parseFloat($(this).val());
		var unit_price = parseFloat($(this).closest("tr").find(".unit_price").val());
		var total = $(this).closest("tr").find(".total");
		total.val(unit_price * qty);
		totalPrice();
	});
	// $("#discount-percentage").on("input", ".dper", function () {
	// 	var discount_value = this.value;
	// 	var grandtotal = document.getElementById("grandtotal").value;
	// 	var discount = grandtotal - (discount_value / 100) * grandtotal;
	// 	$("#grandtotal").val(discount);
	// 	console.log(discount);
	// });
	function totalPrice(){
		var sum = 0;
	
		$(".total").each(function(){
		sum += parseFloat($(this).val());
		});
		$("#grandtotal").val(sum);
		$("#subtotal").val(sum);	
	}
	
	document.querySelector('#discount-percentage').addEventListener('input', function() {
		$("#discount-flat").val("");
 		var discount_value = this.value;
		var grandtotal = document.getElementById("subtotal").value;
		var discount = grandtotal - (discount_value / 100) * grandtotal;
		$("#grandtotal").val(discount);
		console.log(discount);
  // Now you can use the inputValue variable to access the value of the input element
	});
	document.querySelector('#discount-flat').addEventListener('input', function() {
		$("#discount-percentage").val("");
 		var discount_value = this.value;
		var grandtotal = document.getElementById("subtotal").value;
		var discount = grandtotal - discount_value;
		$("#grandtotal").val(discount);
		console.log(discount);
  // Now you can use the inputValue variable to access the value of the input element
	});

	document.querySelector('#vat-percentage').addEventListener('input', function() {
 		var vat_value = this.value;
		var grandtotal = document.getElementById("subtotal").value;
		var vat = ((vat_value / 100) * grandtotal) + parseInt(grandtotal);
		$("#grandtotal").val(vat);
		console.log(vat);
  // Now you can use the inputValue variable to access the value of the input element
	});

	$("#mySelect").change(function() {
      // get the selected option value
      var selectedOption = $(this).val();

      // make an AJAX request to the server
      $.get('/get-data', { option: selectedOption }, function(data) {
        // update the field with the response data
        $("#address").val(data.address);
		$("#phone").val(data.phone);
		console.log(data);
      });
    });

	// $("#item").change(function() {
    //   // get the selected option value
    //   var selectedOption = $(this).val();
	// 	console.log('hello');
    //   // make an AJAX request to the server
    //   $.get('/get-data-product', { option: selectedOption }, function(data) {
    //     // update the field with the response data
    //     $("#unit_cost").val(data.selling_price);
    //   });
    // });

	$("#table_field tbody").on("change", "select[name='item[]']", function () {
		var product_id = $(this).val();
		var price = $(this).closest("tr").find(".unit_price");
		$.get('/get-price', { option: product_id }, function(data) {
        // update the field with the response data
		if(data.discount_price == null){
			price.val(data.selling_price);
		}else{
			price.val(data.discount_price);
		}
      });
		// price.val(product_id);
               
    });

	// $("select[name='item[]']").each(function() {
	// 	var selectedOption = $(this).val();
	// 	console.log('hello');
		
	// });

	});
</script>

@endsection