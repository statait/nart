@extends('frontend.main_master')
@section('content')
@section('title')
Product Search Page 
@endsection

<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
  <div class="container">
    <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
      <div class="col-first">
        <h1>Search</h1>
        <nav class="d-flex align-items-center">
          <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
          <a href="#">Search Result<span class="lnr lnr-arrow-right"></span></a>
          <a href="#">{{$item}}</a>
        </nav>
      </div>
    </div>
  </div>
</section>
<!-- End Banner Area -->
<div class="container">
  <div class="row">
    <div class="col-xl-3 col-lg-4 col-md-5">
      <div class="sidebar-categories">

        @php
        $categories = App\Models\Category::orderBy('category_name','ASC')->get();  
        @endphp
        
        <div class="head">Browse Categories</div>
        <ul class="main-categories">

          @foreach ($categories as $category)
          <li class="main-nav-list"><a href="{{ url('category/product/'.$category->id) }}"></span>{{$category->category_name}}</a>
          </li>
          @endforeach
        
        </ul>
      </div>

    </div>
    <div class="col-xl-9 col-lg-8 col-md-7">

      <!-- Start Best Seller -->
      <section class="lattest-product-area pb-40 category-list">
        <div class="row">
          
          @foreach ($products as $product)
               <!-- single product -->
          <div class="col-lg-4 col-md-6">
            <div class="single-product">
              <img class="img-fluid" src="{{ asset($product->product_thambnail) }}" alt="">
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
      </section>
      <!-- End Best Seller -->

    </div>
  </div>
</div>

<!-- Start related-product Area -->
@include('frontend.common.dealsOfTheWeek')
<!-- End related-product Area -->



@endsection