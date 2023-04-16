@extends('frontend.main_master')
@section('content')

{{-- @section('title')
{{ $product->product_name }} Product Details
@endsection --}}



	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Product Details Page</h1>
					<nav class="d-flex align-items-center">
						<a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Shop<span class="lnr lnr-arrow-right"></span></a>
						<a href="single-product.html">{{$product->product_name}}</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Single Product Area =================-->
	<div class="product_image_area">
		<div class="container">
			<div class="row s_product_inner">
				<div class="col-lg-6">
					<div class="s_Product_carousel">
						@foreach($multiImag as $img)
						<div class="single-prd-item">
							<img class="img-fluid" src="{{ asset($img->photo_name ) }} " alt="">
						</div>
						@endforeach
					</div>
				</div>
				<div class="col-lg-5 offset-lg-1">

					<div class="s_product_text">
						<h3 class="name" id="pname">{{$product->product_name}}</h3>
						@if ($product->discount_price == NULL)
							<div class="price">
								<h6>TK {{$product->selling_price}}</h6>
							</div>
							@else
							<div class="price d-flex">
								<h6 style="padding-right: 5%"> TK {{$product->discount_price}}</h6>
								<h6 style="text-decoration: line-through; color:grey">TK {{$product->selling_price}}</h6>
							</div>
							@endif
						<ul class="list">
							<li><a class="active" href="#"><span>Category</span> : {{$product->category->category_name}}</a></li>

							<li><a href="#"><span>Availibility</span> : In Stock</a></li>
						</ul>
						<ul>
						@foreach ($short_descps as $feature )
						<li>{{$feature}}</li>
						@endforeach
						</ul>
						<h3 class="name" id="pcolor">{{$product->product_color}}</h3>
						<h3 class="name" id="psize">{{$product->product_size}}</h3>
						<div class="product_count">
							<label for="qty">Quantity:</label>
							<input type="text" id="qty" value="1" min="1" maxlength="12" value="1" title="Quantity:" class="input-text qty">
							<button onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;"
							 class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
							<button onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty > 0 ) result.value--;return false;"
							 class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
						</div>
				
				
						<!--   /// Add Product Color And Product Size ///// -->
			<div class="row">						
				<div class="col-sm-6">
					<div class="form-group">

						<label class="info-title control-label">Choose Color <span> </span></label>
						{{-- <select class="form-control unicase-form-control selectpicker" style="display: none;" id="color"> --}}
							{{-- <option selected="" disabled="">Select Color</option> --}}
							{{-- @foreach($product_color as $color)
							<option value="{{ $color }}">{{ ucwords($color) }}</option>
							@endforeach --}}
						{{-- </select>  --}}
					</div> <!-- // end form group -->	 
				</div> <!-- // end col 6 -->

				<div class="col-sm-6">
					{{-- <div class="form-group">
						@if($product->product_size == null)

						@else	

						<label class="info-title control-label">Choose Size <span> </span></label>
						<select class="form-control unicase-form-control selectpicker" style="display: none;" id="size">
							<option selected="" disabled="">Choose Size</option>
							@foreach($product_size as $size)
							<option value="{{ $size }}">{{ ucwords($size) }}</option>
							@endforeach
						</select> 

						@endif
					</div>  --}}
					<!-- // end form group -->		
				</div> 
				<!-- // end col 6 -->
			</div><!-- /.row -->
			<br>


						<div class="card_area d-flex align-items-center">
							<input type="hidden" id="product_id" value="{{ $product->id }}" min="1">
							<a type="submit" onclick="addToCart()" class="primary-btn" href="">Add to Cart</a>
							{{-- <a class="icon_btn" href="#"><i class="lnr lnr lnr-diamond"></i></a> --}}
							<a class="icon_btn"  id="{{ $product->id }}" onclick="addToWishList(this.id)"><i class="lnr lnr lnr-heart"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--================End Single Product Area =================-->

	<!--================Product Description Area =================-->
	<section class="product_description_area">
		<div class="container">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item">
					<a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
					 aria-selected="false">Specification</a>
				</li>
				<li class="nav-item">
					<a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review"
					 aria-selected="false">Reviews</a>
				</li>
			</ul>
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
					<p>{{$product->long_descp}}</p>
				</div>
				<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
					<div class="table-responsive">
						<table class="table">
							<tbody>
								<tr>
									<td>
										<h5>Width</h5>
									</td>
									<td>
										<h5>128mm</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Height</h5>
									</td>
									<td>
										<h5>508mm</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Depth</h5>
									</td>
									<td>
										<h5>85mm</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Weight</h5>
									</td>
									<td>
										<h5>52gm</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Quality checking</h5>
									</td>
									<td>
										<h5>yes</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Freshness Duration</h5>
									</td>
									<td>
										<h5>03days</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>When packeting</h5>
									</td>
									<td>
										<h5>Without touch of hand</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Each Box contains</h5>
									</td>
									<td>
										<h5>60pcs</h5>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

				{{-- REVIEW SECTION --}}
				@php
					$reviews = App\Models\Review::where('product_id',$product->id)->latest()->limit(5)->get();
				@endphp	

				<div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
					<div class="row">
						<div class="col-lg-6">
							<div class="review_list">
								@foreach($reviews as $item)
								@if($item->status == 0)
											
								@else
											
								<div class="review_item">
									<div class="media">
										<div class="d-flex">
											<img src="{{ (!empty($item->user->profile_photo_path))? url('upload/user_images/'.$item->user->profile_photo_path):url('upload/no_image.jpg') }}" alt="">
										</div>
										<div class="media-body">
											<h4> {{ $item->user->name }}</h4>
										</div>
									</div>
									<p>{{ $item->summary }}</p>
								</div>
								@endif
							@endforeach
							</div>
						</div>
						<div class="col-lg-6">
							<div class="review_box">
								<h4>Add a Review</h4>
								{{-- <p>Your Rating:</p> --}}
								@guest
								<p>Login to review a product
								<button class="primary-btn ml-2"><a style="color: white" href="{{ route('login') }}">Login Here</a></button> </p>
								@else 
								<form class="row contact_form" action="contact_process.php" method="post" action="{{ route('review.store') }}" id="contactForm" novalidate="novalidate">
									@csrf
									<input type="hidden" name="product_id" value="{{ $product->id }}">
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" class="form-control" name="summary" placeholder="Summary" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Summary'">
										</div>
									</div>


									<div class="col-md-12">
										<div class="form-group">
											<textarea class="form-control" name="comment" id="message" rows="1" placeholder="Review" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Review'"></textarea></textarea>
										</div>
									</div>
									<div class="col-md-12 text-right">
										<button type="submit" value="submit" class="primary-btn">Submit Now</button>
									</div>
								</form>
								@endguest
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Product Description Area =================-->
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-62c151d22da13923"></script>

<script>
	function increment() {
	   document.getElementById('qty').stepUp();
	}
	function decrement() {
	   document.getElementById('qty').stepDown();
	}
 </script>



@endsection
