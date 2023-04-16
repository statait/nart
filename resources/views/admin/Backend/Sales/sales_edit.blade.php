@extends('admin.aDashboard')
@section('admins')

  {{-- TRIAL START --}}
  <div class="container-fluid">
	<div class="row">
	  <div class="col-lg-12 mb-lg-0 mb-4">
		<div class="card">
		  <div class="card-body p-3">
			<div class="row">
				
			<form class="insert-form" id="insert_form" method="post" action="{{ route('sales.store') }}">
			@csrf
			<div class="row">
				@php
					$customerV = $sales->customer_id;
					$customer = \App\Models\Customer::find($customerV);
				@endphp
				<div class="col">
					<div class="row mb-3">
						<div class="col-3"><label  class="text-uppercase text-dark text-xs font-weight-bold" for="mySelect">Customer</label></div>
					
						<div class="col">
							<select id="mySelect" name="customer_id" class="js-example-basic-single select2 form-control" required="">
							@if ($customer)
							<option value="{{$sales->customer->id}}" selected="" disabled="">{{$sales->customer->customer_name}}</option>
							@else
							<option value="" selected="" disabled="">Customer Deleted</option>
							@endif
							@foreach($customers as $customer)
									 <option value="{{ $customer->id }}">{{ $customer->customer_name }}</option>	
							@endforeach
							<!-- More options -->
							</select>
						</div>
						</div>
	
						<div class="row mb-3">
							<div class="col-3"><label class="text-uppercase text-dark text-xs font-weight-bold">Address</label></div>
							@if ($customer)
							<div class="col"><input value="{{$sales->customer->address}}" class="form-control"  type="text" id="address" name="address" required="">
							@else
							<div class="col"><input value="N/A" class="form-control"  type="text" id="" name="" required="">
							@endif
						</div>
							
						</div>
						<div class="row mb-3">
							<div class="col-3"><label class="text-uppercase text-dark text-xs font-weight-bold">Phone</label></div>
							@if ($customer)
							<div class="col"><input value="{{$sales->customer->phone}}" class="form-control mb-3" type="text" id="phone" name="phone" required=""></div>
							@else
							<div class="col"><input value="N/A" class="form-control mb-3" type="text" id="" name="" required=""></div>
							@endif
						</div>
	
						{{-- <div class="row mb-3">
							<div class="col-2"><label>Address</label></div>
							<div class="col"><input class="form-control mb-3" type="text" id="address" name="address" readonly></div>
						</div> --}}
				</div>
				<div class="col">
					<div class="row mb-3">
						<div class="col-3"><label class="text-uppercase text-dark text-xs font-weight-bold">Sale Date</label></div>
						<div class="col"><input value="{{$sales->sale_date}}" class="form-control" type="date" id="saleDate" name="saleDate" required=""></div>
					</div>
					{{-- <div class="row mb-3">
						<div class="col-2"><label>Details</label></div>
						<div class="col"><input class="form-control mb-3" type="text" id="details" name="details"></div>
					</div> --}}
					<div class="row mb-3">
						<div class="col-3"> <label for="details">Details</label></div>
						<div class="col"><textarea class="form-control" name="details" id="details" rows="3">{{$sales->details}}</textarea></div>
					</div>
					{{-- <div class="row mb-3">
						<div class="col"><input class="form-control mb-3" type="hidden" id="auth_id" name="auth_id"  value="{{ Auth::id()}}">
					</div>
			
				</div> --}}
			</div>
			<div class="table-responsive">
				<table id="table_field" class="table align-items-center mb-0">
				<thead>
					  <tr>
						<th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Product Information</th>
						<th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Stock</th> 
						<th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Rate</th>
						<th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Qty</th>
						<th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Total</th>
						<th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Action</th>
					</tr>
				</thead>
					@foreach ($salesItems as $item)
						<tr>
						<td>
							<select id="item" name="item[]" class="form-control" required="" >
								<option value="{{$item->product->id}}" selected="" disabled="">{{$item->product->product_name}}</option>
								@foreach($products as $product)
									 <option value="{{ $product->id }}">{{ $product->product_name }}</option>	
								@endforeach
							</select>
						</td>
						  <td><input value="{{$item->product->qty}}" class="form-control stock" type="text"  id="stock" name="stock[]" required="" readonly></td>
						
						  @if ($item->product->discount_price == NULL)
						  <td><input value="{{$item->product->selling_price}}"  class="form-control rate" type="number" id="rate" name="rate[]" required="" readonly></td>
						  @else
						  <td><input value="{{$item->product->discount_price}}"  class="form-control rate" type="number" id="rate" name="rate[]" required="" readonly></td>
						  @endif
						
						  <td><input value="{{$item->qty}}" class="form-control qnty" type="number" id="qnty" name="qnty[]" required=""></td>
						  <td><input value="{{$item->amount}}" class="form-control total" type="number" id="amount" name="amount[]" value="0" readonly></td>
						  <td>
							<a name="add" id="add" class="btn bg-gradient-dark mb-0"><i class="fas fa-plus" aria-hidden="true"></i></a>
							{{-- <i class="fa-solid fa-circle-plus display-4 text-success" type="button" name="add" id="add" ></i> --}}
						</td>
					</tr>
					@endforeach
				</table>
				<hr>
					<div class="row">
					<div class="col">
					</div>

					<div class="col-4">
						<div class="row mb-2">
							<div class="col-4"><label  class="text-uppercase text-dark text-xs font-weight-bold">Sub Total</label></div>
							<div class="col"><span><input value="{{$sales->sub_total}}" class="form-control" type="text" name="subtotal" id="subtotal" readonly></span>
							</div>
						</div>
						<div class="row mb-2">
							<div class="col-4"><label  class="text-uppercase text-dark text-xs font-weight-bold ">Discount (%)</label></div>
							<div class="col"><input  value="{{$sales->discount_per}}"  class="dper form-control" type="number" id="discount-percentage" name="dper">
							</div>
						</div>
						<div class="row mb-2">
							<div class="col-4"><label  class="text-uppercase text-dark text-xs font-weight-bold ">VAT (%)</label></div>
							<div class="col"><input  value="{{$sales->total_vat}}"  class="vper form-control" type="number" id="vat-percentage" name="vper" readonly>
							</div>
						</div>
						<div class="row mb-2">
							<div class="col-4"><label  class="text-uppercase text-dark text-xs font-weight-bold ">Discount (TK)</label></div>
							<div class="col"><input  value="{{$sales->discount_flat}}" class="dflat form-control" name="dflat" type="number" id="discount-flat">
							</div>
						</div>
						<div class="row mb-2">
							<div class="col-4"><label  class="text-uppercase text-dark text-xs font-weight-bold ">Grand Total</label></div>
							<div class="col"><input  value="{{$sales->grand_total}}"  class="form-control" type="text" name="grandtotal" id="grandtotal" readonly>
							</div>
						</div>
						<div class="row mb-2">
							<div class="col-4"><label class="text-uppercase text-dark text-xs font-weight-bold ">Paid Amount</label></div>
							<div class="col"><input value="{{$sales->p_paid_amount}}" readonly class="form-control" type="number" name="paidamount" id="paidamount">
							</div>
						</div>
						<div class="row mb-2">
							<div class="col-4"><label class="text-uppercase text-dark text-xs font-weight-bold ">Due Amount</label></div>
							<div class="col"><input value="{{$sales->due_amount}}" class="form-control" type="text" name="dueamount" id="dueamount" readonly>
							</div>
						</div>

					
					</div>
				</div>
				<div class="row">
					<div class="col">
						<div class="table-responsive">
							<table id="table_fieldpayment" class="table align-items-center mb-0">
							<thead>
							<tr>
							  <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Payment Type</th>
							  <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Paid Amount</th>
							  <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Action</th>
						  </tr>

							</thead>
							@foreach ($payItems as $pitem)
						  <tr>
								<td>
								  <select id="payitem" name="payitem[]" class="form-control" required="" >
									  <option value="{{$pitem->bank_id}}" selected="" disabled="">{{$pitem->payment->bank_name}}</option>
									  @foreach($banks as $payment)
										   <option value="{{ $payment->id }}">{{ $payment->bank_name }}</option>	
									  @endforeach
								  </select>	  
							  </td>
								<td><input class="form-control pay_amount" type="number" id="pay_amount" name="pay_amount[]" value="{{$pitem->b_paid_amount}}" required=""></td>
								<td><a name="addpay" id="addpay" class="btn bg-gradient-dark mb-0"><i class="fas fa-plus" aria-hidden="true"></i></a>
								</td>
								<input class="form-control sumPayment" type="text" name="sumPayment" id="sumPayment" hidden readonly>
						  </tr>
						  @endforeach
					  </table>
					</div>
					</div>
					<div class="col">				
					</div>
				</div>
				
				{{-- <input class="btn bg-gradient-dark mb-0" type="submit" name="save" id="save" value="
				Save Purchase"> --}}
			</div>
			{{-- <div class="container">
				<div class="row">
				  <div class="col">
				  </div>
				  <div class="col">
					<input type="submit" class="btn bg-gradient-primary w-100" value="Add Sale">
				  </div>
				  <div class="col">
				  </div>
				</div>
			  </div> --}}
			
	  </form>
	</div>
</div>
</div>
</div>

</div>

@include('admin.body.footer')

{{-- TRIAL END --}}

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

  {{-- <script>
	// Add a search field to the dropdown
	$("#mySearch").on("keyup", function() {
	  var value = $(this).val().toLowerCase();
	  $("#mySelect option").filter(function() {
		$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
	  });
	});
  </script> --}}
  
  <script>
	$(document).ready(function(){
		var html='<tr><td><select id="item" name="item[]" class="form-control" required="" ><option value="" selected="" disabled="">Select Product</option>@foreach($products as $product)<option value="{{ $product->id }}">{{ $product->product_name }}</option>@endforeach</select></td><td><input class="form-control stock" type="text"  id="stock" name="stock[]" required="" readonly></td><td><input class="form-control rate" type="number" id="rate" name="rate[]" required="" readonly></td><td><input class="form-control qnty" type="number" id="qnty" name="qnty[]" required=""></td><td><input class="form-control total" type="number" id="amount" name="amount[]" value="0" readonly></td><td><a name="remove" id="remove" class="btn bg-gradient-danger mb-0"><i class="fas fa-minus" aria-hidden="true"></i></a></td></tr>';
	
		// var x =1;
	  $("#add").click(function(){
		$("#table_field").append(html);
	  });
	  $("#table_field").on('click', '#remove', function () {
    $(this).closest('tr').remove();
	totalPrice();
	duePrice();
	});

	var htmlpay='<tr><td><select id="payitem" name="payitem[]" class="form-control" required="" ><option value="" selected="" disabled="">Select Payment</option>@foreach($banks as $payment)<option value="{{ $payment->id }}">{{ $payment->bank_name }}</option>@endforeach</select></td><td><input class="form-control pay_amount" type="number" id="pay_amount" name="pay_amount[]" required=""></td><td><a name="payremove" id="payremove" class="btn bg-gradient-danger mb-0"><i class="fas fa-minus" aria-hidden="true"></i></a></td></tr>';

		// var x =1;
	  $("#addpay").click(function(){
		$("#table_fieldpayment").append(htmlpay);
	  });
	  $("#table_fieldpayment").on('click', '#payremove', function () {
    $(this).closest('tr').remove();
	totalPayment()
	duePrice();
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
		$('.js-example-basic-single').select2();

      });
    });
	
	$("#table_field tbody").on("input", ".rate", function () {
                var rate = parseFloat($(this).val());
                var qnty = parseFloat($(this).closest("tr").find(".qnty").val());
                var total = $(this).closest("tr").find(".total");
                total.val(qnty * rate);
				totalPrice();
				duePrice();
            });
	$("#table_field tbody").on("input", ".qnty", function () {
		var qnty = parseFloat($(this).val());
		var rate = parseFloat($(this).closest("tr").find(".rate").val());
		var total = $(this).closest("tr").find(".total");
		total.val(rate * qnty);
		totalPrice();
		duePrice();
	});
	// $("#discount-percentage").on("input", ".dper", function () {
	// 	var discount_value = this.value;
	// 	var grandtotal = document.getElementById("grandtotal").value;
	// 	var discount = grandtotal - (discount_value / 100) * grandtotal;
	// 	$("#grandtotal").val(discount);
	// 	console.log(discount);
	// });

	$("#table_fieldpayment tbody").on("input", ".pay_amount", function () {
                // var amount = parseFloat($(this).val());
                // var qnty = parseFloat($(this).closest("tr").find(".qnty").val());
                // var total = $(this).closest("tr").find(".total");
                // total.val(qnty * rate);
				// totalPrice();
				totalPayment();
				duePrice();

	      });

		  function duePrice(){
			$("#paidamount").val($("#sumPayment").val());
			$("#dueamount").val(($("#grandtotal").val()) - ($("#sumPayment").val()));
		  }

	function totalPrice(){
		var sum = 0;
	
		$(".total").each(function(){
		sum += parseFloat($(this).val());
		});
		$("#grandtotal").val(sum);
		$("#subtotal").val(sum);	
	}

	function totalPayment(){
		var sum = 0;
	
		$(".pay_amount").each(function(){
		sum += parseFloat($(this).val());
		});

		$("#sumPayment").val(sum);
	}
	
	document.querySelector('#discount-percentage').addEventListener('input', function() {
		$("#discount-flat").val("");
 		var discount_value = this.value;
		var grandtotal = document.getElementById("subtotal").value;
		var discount = grandtotal - (discount_value / 100) * grandtotal;
		$("#grandtotal").val(discount);
		duePrice();
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
		duePrice();
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

	$("#item").change(function() {
      // get the selected option value
      var selectedOption = $(this).val();
		// console.log('hello');
      // make an AJAX request to the server
      $.get('/product/get-data-product', { option: selectedOption }, function(data) {
        // update the field with the response data
        $("#stock").val(data.qty);
		if(data.discount_price == null){
			 $("#rate").val(data.selling_price);
		}else{
			 $("#rate").val(data.discount_price);
		}
		
      });
    });

	$("#table_field tbody").on("change", "select[name='item[]']", function () {
		var product_id = $(this).val();
		var stock = $(this).closest("tr").find(".stock");
		var rate = $(this).closest("tr").find(".rate");
		$.get('/product/get-data-product', { option: product_id }, function(data) {
       
		if(data.qty == null){
			stock.val(0);
		}else{
			stock.val(data.qty);
		}

		if(data.discount_price == null){
			 rate.val(data.selling_price);
		}else{
			 rate.val(data.discount_price);
		}
			
      });
		// price.val(product_id);
               
    });

	document.querySelector('#paidamount').addEventListener('input', function() {
		$("#dueamount").val("");
 		var paidamount = this.value;
		var grandtotal = document.getElementById("grandtotal").value;
		var duetotal = grandtotal - paidamount;
		$("#dueamount").val(duetotal);
  // Now you can use the inputValue variable to access the value of the input element
	});
	

	// $("select[name='item[]']").each(function() {
	// 	var selectedOption = $(this).val();
	// 	console.log('hello');
		
	// });

	});
</script>

<script>
	$(document).ready(function() {
    $('.select2').select2({
        placeholder: 'Select an option',
        allowClear: true
    });
});
</script>

@endsection