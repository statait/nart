@php
    // $id = Auth::user()->id;
    // $user = App\Models\User::find($id);
@endphp

<div class="row">
	<div class="col-lg-3">
		<div class="details_item">
			<a href="{{ route('homepagee') }}" class="primary-btn">Dashboard</a>
			
		</div>
	</div>

	<div class="col-lg-3">
		<div class="details_item">
			<a href="{{ route('my.orders') }}" class="primary-btn">My Orders</a>
			
		</div>
	</div>
	<div class="col-lg-3">
		<div class="details_item">
			<a href="{{ route('return.order.list') }}" class="primary-btn" style="font-size: 12px">Return Orders</a>
			
		</div>
	</div>
	<div class="col-lg-3">
		<div class="details_item">
			<a href="{{ route('cancel.orders') }}" class="primary-btn" style="font-size: 11px">Cancelled Order</a>
			
		</div>
	</div>



</div>