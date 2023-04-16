{{-- <header class="header-style-1"> 
  
  <!-- ============================================== TOP MENU ============================================== -->
  <div class="top-bar animate-dropdown">
    <div class="container">
      <div class="header-top-inner">
        <div class="cnt-account">
          <ul class="list-unstyled">
            {{-- <li><a href="#"><i class="icon fa fa-user"></i>My Account</a></li> --}}
            <li><a href="{{route('todays.offer')}}"><i class="icon fa fa-money"></i>Today's Offer</a></li>
            <li><a href="https://statabd.com/store-locator/"><i class="icon fa fa-map-marker"></i>Store Location</a></li>
            {{-- <li><a href="{{route('frontend.location')}}"><i class="icon fa fa-map-marker"></i>Store Location</a></li> --}}
            <li><a href="{{ route('wishlist') }}"><i class="icon fa fa-heart"></i>Wishlist</a></li>
            <li><a href="{{ route('mycart') }}"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
            {{-- <li><a href="{{ route('checkout') }}"><i class="icon fa fa-check"></i>Checkout</a></li> --}}

            <li><a href="" type="button" data-toggle="modal" data-target="#ordertraking"><i class="icon fa fa-check"></i>Order Tracking</a></li>
            
            @auth
            <li><a href="{{ route('dashboard') }}"><i class="icon fa fa-user"></i>User Profile</a></li>
            @else
            <li><a href="{{ route('dashboard') }}"><i class="icon fa fa-lock"></i>Login/Register</a></li>  
            @endauth
            
          </ul>
        </div>
        <!-- /.cnt-account -->
        

        <!-- /.cnt-cart -->
        <div class="clearfix"></div>
      </div>
      <!-- /.header-top-inner --> 
    </div>
    <!-- /.container --> 
  </div>
  <!-- /.header-top --> 
  <!-- ============================================== TOP MENU : END ============================================== -->
  <div class="main-header">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3 logo-holder"> 

          @php
          $setting = App\Models\SiteSetting::find(1);
           @endphp
          <!-- ============================================================= LOGO ============================================================= -->
          <div class="logo"> <a href="{{ url('/') }}"> <img style="width: 300px; height:100px; margin-top:-30px;" src="{{ asset($setting->logo) }}" alt="logo"> </a> </div>
          <!-- /.logo --> 
          <!-- ============================================================= LOGO : END ============================================================= --> </div>
        <!-- /.logo-holder -->
        
        <div class="col-xs-12 col-sm-12 col-md-6 top-search-holder"> 
          <!-- /.contact-row --> 
          <!-- ============================================================= SEARCH AREA ============================================================= -->
          <div class="search-area">
            <form method="post" action="{{ route('product.search') }}">
              @csrf
              <div class="control-group">

                <input class="search-field" onfocus="search_result_show()" onblur="search_result_hide()" id="search" name="search" placeholder="Search here..." />
                <button class="search-button" type="submit"></button> </div>
            </form>
            <div id="searchProducts"></div>
          </div>
          <!-- /.search-area --> 
          <!-- ============================================================= SEARCH AREA : END ============================================================= --> </div>
        <!-- /.top-search-holder -->
        
        <div class="col-xs-12 col-sm-12 col-md-3 animate-dropdown top-cart-row"> 
          <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
          
          <div id="myBt" class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
            <div class="items-cart-inner">
              <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
              <div class="basket-item-count"><span class="count" id="cartQty"> </span></div>
              <div class="total-price-basket"> <span id="sp" class="lbl">cart -</span> 
                <span class="total-price"> <span class="sign">TK </span>
                <span class="value" id="cartSubTotal"> </span> </span> </div>
            </div>
            </a>

            <ul class="dropdown-menu">
              <li>
 <!--   // Mini Cart Start with Ajax -->

         <div id="miniCart">

        </div>

<!--   // End Mini Cart Start with Ajax -->
                <div class="clearfix cart-total">
                  <div class="pull-right"> <span class="text">Sub Total :</span>
                    <span class='price'  id="cartSubTotal"> </span> </div>
                  <div class="clearfix"></div>
                  <a href="{{route('mycart')}}" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a> </div>
                <!-- /.cart-total--> 
                

              </li>
            </ul>
            <!-- /.dropdown-menu--> 
          </div>
          <!-- /.dropdown-cart -->
          <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= --> </div>

          <div class="col-xs-12 col-sm-12 col-md-2 "> 

            
          </div>


        <!-- /.top-cart-row --> 

      </div>
      <!-- /.row --> 
      
    </div>
    <!-- /.container --> 
    
  </div>
  <!-- /.main-header --> 
  
  <!-- ============================================== NAVBAR ============================================== -->
  <div id="navbar" class="header-nav animate-dropdown">
    <div class="container">
      <div class="yamm navbar navbar-default" role="navigation">
        <div class="navbar-header">
       <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> 
       <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div class="nav-bg-class">
          <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
            <div class="nav-outer">
              <ul class="nav navbar-nav">
                
                <li class="dropdown yamm-fw"> <a href="{{ url('/') }}"  >Home</a> </li>
               
                @php
                $categories = App\Models\Category::orderBy('category_name','ASC')->get();
                @endphp

                @foreach ($categories as $category)
                {{-- <li class="dropdown"> <a href="contact.html">Kids & Girls</a> </li> --}}
                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">{{$category->category_name}}</a>
                  <ul class="dropdown-menu pages">
                    <li>
                      <div class="yamm-content">
                        <div class="row">
                          <div class="col-xs-12 col-menu">
                            <ul class="links">
                              @php
                              $subcategories = App\Models\subCategory::where('category_id',$category->id)->orderBy('subcategory_name','ASC')->get();
                              @endphp

                              @foreach($subcategories as $subcategory)
                              <li><a id="hh" href="{{ url('subcategory/product/'.$subcategory->id.'/'.$subcategory->subcategory_slug ) }}">{{ $subcategory->subcategory_name }}</a></li>
                              @endforeach
                            </ul>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </li>
                @endforeach

                
                <li class="dropdown  navbar-right special-menu"> <a href="{{route('todays.offer')}}">Todays offer</a> </li>
                {{-- <a style="float: right" href="{{route('frontend.location')}}"> <button class="btn btn-link icon btn-xs" type="button" title="STATA Store"> <i class="fa fa-map-marker fa-lg"></i> </button></a> --}}
              </ul>
              <!-- /.navbar-nav -->
              <div class="clearfix"></div>
            </div>
            <!-- /.nav-outer --> 
          </div>
          <!-- /.navbar-collapse --> 
          
        </div>
        <!-- /.nav-bg-class --> 
      </div>
      <!-- /.navbar-default --> 
    </div>
    <!-- /.container-class --> 
    
  </div>
  <!-- /.header-nav --> 
  <!-- ============================================== NAVBAR : END ============================================== --> 

  <!-- Order Traking Modal -->
<div class="modal fade" id="ordertraking" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Track Your Order </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method="post" action="{{ route('order.tracking') }}">
          @csrf
         <div class="modal-body">
          <label>Invoice Code</label>
          <input type="text" name="code" required="" class="form-control" placeholder="Your Order Invoice Number">           
         </div>

         <button class="btn btn-danger" type="submit" style="margin-left: 17px;"> Track Now </button>

        </form> 


      </div>

    </div>
  </div>
</div>
  
</header> --}}



<style> 
  .search-area{
    position: relative;
  }
    #searchProducts {
      position: absolute;
      top: 100%;
      left: 0;
      width: 100%;
      background: #ffffff;
      z-index: 999;
      border-radius: 8px;
      margin-top: 5px;
    }
  </style>
  
  
  <script>
    function search_result_hide(){
      $("#searchProducts").slideUp();
    }
     function search_result_show(){
        $("#searchProducts").slideDown();
    }
  </script> 

{{-- .............................................................. --}}

	<!-- Start Header Area -->
	<header class="header_area sticky-header">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="index.html"><img src="img/logo.png" alt=""></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">
							<li class="nav-item active"><a class="nav-link" href="index.html">Home</a></li>
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Shop</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="category.html">Shop Category</a></li>
									<li class="nav-item"><a class="nav-link" href="single-product.html">Product Details</a></li>
									<li class="nav-item"><a class="nav-link" href="checkout.html">Product Checkout</a></li>
									<li class="nav-item"><a class="nav-link" href="cart.html">Shopping Cart</a></li>
									<li class="nav-item"><a class="nav-link" href="confirmation.html">Confirmation</a></li>
								</ul>
							</li>
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Blog</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>
									<li class="nav-item"><a class="nav-link" href="single-blog.html">Blog Details</a></li>
								</ul>
							</li>
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Pages</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="login.html">Login</a></li>
									<li class="nav-item"><a class="nav-link" href="tracking.html">Tracking</a></li>
									<li class="nav-item"><a class="nav-link" href="elements.html">Elements</a></li>
								</ul>
							</li>
							<li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li class="nav-item"><a href="#" class="cart"><span class="ti-bag"></span></a></li>
							<li class="nav-item">
								<button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
		<div class="search_input" id="search_input_box">
			<div class="container">
				<form class="d-flex justify-content-between">
					<input type="text" class="form-control" id="search_input" placeholder="Search Here">
					<button type="submit" class="btn"></button>
					<span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
				</form>
			</div>
		</div>
	</header>
	<!-- End Header Area -->