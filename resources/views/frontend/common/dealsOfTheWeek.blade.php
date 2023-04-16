<!-- Start related-product Area -->
<section class="related-product-area section_gap_bottom">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6 text-center">
				<div class="section-title">
					<h1>Deals of the Week</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
						magna aliqua.</p>
				</div>
			</div>
		</div>
		  
		@php
		$dealsProducts = App\Models\Product::where('status', 1)->orderBy('id','DESC')->get(); 
	  	@endphp

		<div class="row">
			<div class="col-lg-9">
				<div class="row">
					@foreach($dealsProducts as $product)
					<div class="col-lg-4 col-md-4 col-sm-6 mb-20">
						<div class="single-related-product d-flex">
							<a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug ) }}"><img width="100" height="100" src="{{ asset($product->product_thambnail) }}" alt=""></a>
							<div class="desc">
								<a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug ) }}" class="title">{{$product->product_name}}</a>
								@if ($product->discount_price == NULL)
								<div class="price">
									<h6>TK {{$product->selling_price}}</h6>
								</div>
								@else
								<div class="price">
									<h6>TK {{$product->discount_price}}</h6>
									<h6 class="l-through"> TK  {{$product->selling_price}}</h6>
								</div>
								@endif
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
			<div class="col-lg-3">
				<div class="ctg-right">
					<a href="#" target="_blank">
						
						<img class="img-fluid d-block mx-auto" src="{{ asset('frontend/assets/img/category/c5.jpg') }}" alt="">
					</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End related-product Area -->