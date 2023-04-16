@extends('frontend.main_master')
@section('content')
@section('title')
Bengal Automation
@endsection


<!-- start banner Area -->
<section class="banner-area">
	<div class="container">
		<div class="row fullscreen align-items-center justify-content-start">
			<div class="col-lg-12">
				<div class="active-banner-slider owl-carousel">
					<!-- single-slide -->
					<div class="row single-slide align-items-center d-flex">
						<div class="col-lg-5 col-md-6">
							<div class="banner-content">
								<h1>Bengal's New <br>Collection!</h1>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
									dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
								<div class="add-bag d-flex align-items-center">
									<a class="add-btn" href=""><span class="lnr lnr-cross"></span></a>
									<span class="add-text text-uppercase">Add to Bag</span>
								</div>
							</div>
						</div>
						<div class="col-lg-7">
							<div class="banner-img">
								
								<img class="img-fluid" src="{{asset('frontend/assets/img/banner/banner-img.png') }}" alt="">
							</div>
						</div>
					</div>
					<!-- single-slide -->
					<div class="row single-slide">
						<div class="col-lg-5">
							<div class="banner-content">
								<h1>Bengal's New <br>Collection!</h1>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
									dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
								<div class="add-bag d-flex align-items-center">
									<a class="add-btn" href=""><span class="lnr lnr-cross"></span></a>
									<span class="add-text text-uppercase">Add to Bag</span>
								</div>
							</div>
						</div>
						<div class="col-lg-7">
							<div class="banner-img">
								<img class="img-fluid" src="{{asset('frontend/assets/img/banner/banner-img.png') }}" alt="">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End banner Area -->

<!-- start features Area -->
<section class="features-area section_gap">
	<div class="container">
		<div class="row features-inner">
			<!-- single features -->
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="single-features">
					<div class="f-icon">
					
						<img src="{{ asset('frontend/assets/img/features/f-icon1.png') }}" alt="">
					</div>
					<h6>Free Delivery</h6>
					<p>Free Shipping on all order</p>
				</div>
			</div>
			<!-- single features -->
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="single-features">
					<div class="f-icon">
						<img src="{{ asset('frontend/assets/img/features/f-icon2.png') }}" alt="">
					</div>
					<h6>Return Policy</h6>
					<p>Free Shipping on all order</p>
				</div>
			</div>
			<!-- single features -->
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="single-features">
					<div class="f-icon">
						<img src="{{ asset('frontend/assets/img/features/f-icon3.png')}}" alt="">
					</div>
					<h6>24/7 Support</h6>
					<p>Free Shipping on all order</p>
				</div>
			</div>
			<!-- single features -->
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="single-features">
					<div class="f-icon">
						<img src="{{ asset('frontend/assets/img/features/f-icon4.png')}}" alt="">
					</div>
					<h6>Secure Payment</h6>
					<p>Free Shipping on all order</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- end features Area -->

<!-- Start category Area -->
<section class="category-area">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8 col-md-12">
				<div class="row">
					@foreach ($categories_feature as $category)
					<div class="col-lg-4 col-md-4">
						<div class="single-deal">
							<div class="overlay"></div>
							
							<img class="img-fluid w-100" src="{{ asset($category->category_image) }}" alt="">
							<a href="{{ url('category/product/'.$category->id) }}">
								<div class="deal-details">
									<h6 class="deal-title">{{$category->category_name}}</h6>
								</div>
							</a>
						</div>
					</div>
					@endforeach

				</div>
			</div>
			<div class="col-lg-4 col-md-6">
				<div class="single-deal">
					<div class="overlay"></div>
					<img class="img-fluid w-100" src="{{ asset('frontend/assets/img/category/c5.jpg')}}" alt="">
					<a href="img/category/c5.jpg" class="img-pop-up" target="_blank">
						<div class="deal-details">
							<h6 class="deal-title">Sneaker for Sports</h6>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End category Area -->

<!-- start product Area -->
<section class="owl-carousel active-product-area section_gap">
	<!-- single product slide -->
	<div class="single-product-slider">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 text-center">
					<div class="section-title">
						<h1>Latest Products</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
							dolore
							magna aliqua.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<!-- single product -->
				@foreach($products as $product)
				<div class="col-lg-3 col-md-6">
					<div class="single-product">
						<a href="{{ url('product/details/'.$product->id) }}">
						<img class="img-fluid" src="{{ asset($product->product_thambnail) }}" alt="">
						</a>
						<div class="product-details">
							<h6>{{$product->product_name}}</h6>

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
							<div class="prd-bottom">

								<a href="" data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)" class="social-info">
									<span class="ti-bag"></span>
									<p class="hover-text">add to bag</p>
								</a>
				
								<a  id="{{ $product->id }}" onclick="addToWishList(this.id)" class="social-info">
									<span class="lnr lnr-heart"></span>
									<p class="hover-text">Wishlist</p>
								</a>
								<a  href="{{ url('product/details/'.$product->id) }}" class="social-info">
									<span class="lnr lnr-move"></span>
									<p class="hover-text">view more</p>
								</a>
							
							</div>
						</div>
					</div>
				</div>
				@endforeach


			</div>
		</div>
	</div>
	<!-- single product slide -->
	<div class="single-product-slider">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 text-center">
					<div class="section-title">
						<h1>Coming Products</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
							dolore
							magna aliqua.</p>
					</div>
				</div>
			</div>
			<div class="row">
		<!-- single product -->
		@foreach($products as $product)
		<div class="col-lg-3 col-md-6">
			<div class="single-product">
		<a href="{{ url('product/details/'.$product->id) }}">
		<img class="img-fluid" src="{{ asset($product->product_thambnail) }}" alt="">
		</a>
		<div class="product-details">
			<h6>{{$product->product_name}}</h6>

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
			<div class="prd-bottom">

				<a href="" data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)" id="{{ $product->id }}" onclick="productView(this.id)" class="social-info">
					<span class="ti-bag"></span>
					<p class="hover-text">add to bag</p>
				</a>

				<a id="{{ $product->id }}" onclick="addToWishList(this.id)" class="social-info">
					<span class="lnr lnr-heart"></span>
					<p class="hover-text">Wishlist</p>
				</a>

				<a  href="{{ url('product/details/'.$product->id) }}" class="social-info">
					<span class="lnr lnr-move"></span>
					<p class="hover-text">view more</p>
				</a>
			
			</div>
		</div>
	</div>
</div>
@endforeach
			</div>
		</div>
	</div>
</section>
<!-- end product Area -->

<!-- Start exclusive deal Area -->
<section class="exclusive-deal-area">
	<div class="container-fluid">
		<div class="row justify-content-center align-items-center">
			<div class="col-lg-6 no-padding exclusive-left">
				<div class="row clock_sec clockdiv" id="clockdiv">
					<div class="col-lg-12">
						<h1>Exclusive Hot Deal Ends Soon!</h1>
						<p>Who are in extremely love with eco friendly system.</p>
					</div>
					<div class="col-lg-12">
						<div class="row clock-wrap">
							<div class="col clockinner1 clockinner">
								<h1 class="days">1</h1>
								<span class="smalltext">Days</span>
							</div>
							<div class="col clockinner clockinner1">
								<h1 class="hours">20</h1>
								<span class="smalltext">Hours</span>
							</div>
							<div class="col clockinner clockinner1">
								<h1 class="minutes">20</h1>
								<span class="smalltext">Mins</span>
							</div>
							<div class="col clockinner clockinner1">
								<h1 class="seconds">59</h1>
								<span class="smalltext">Secs</span>
							</div>
						</div>
					</div>
				</div>
				<a href="" class="primary-btn">Shop Now</a>
			</div>
			<div class="col-lg-6 no-padding exclusive-right">
				<div class="active-exclusive-product-slider">
					@foreach($combo as $product)
					<!-- single exclusive carousel -->
					<div class="single-exclusive-slider">
						<a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug ) }}">
						<img class="img-fluid" src="{{ asset($product->product_thambnail) }}" alt="">
						</a>
						<div class="product-details">

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

							<h4> {{ $product->product_name }} </h4>
							<div class="add-bag d-flex align-items-center justify-content-center">
								<a class="add-btn" data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)" href=""><span class="ti-bag"></span></a>
								<span class="add-text text-uppercase">Add to Bag</span>
							</div>
						</div>
					</div>
					@endforeach
					<!-- single exclusive carousel -->
					<div class="single-exclusive-slider">
						<img class="img-fluid" src="{{ asset('frontend/assets/img/product/e-p1.png') }}" alt="">
						<div class="product-details">
							<div class="price">
								<h6>$150.00</h6>
								<h6 class="l-through">$210.00</h6>
							</div>
							<h4>addidas New Hammer sole
								for Sports person</h4>
							<div class="add-bag d-flex align-items-center justify-content-center">
								<a class="add-btn" href=""><span class="ti-bag"></span></a>
								<span class="add-text text-uppercase">Add to Bag</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End exclusive deal Area -->

@include('frontend.common.brandsCarosule')

@include('frontend.common.dealsOfTheWeek')
	  
@endsection