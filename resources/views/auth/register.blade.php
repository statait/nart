{{-- @extends('frontend.main_master')
@section('content')

@section('title')
Signin  
@endsection

	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Register</h1>
					<nav class="d-flex align-items-center">
						<a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="category.html">Register</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Login Box Area =================-->
	<section class="login_box_area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						
						<img class="img-fluid" src="{{ asset('frontend/assets/img/login.jpg') }}" alt="">
						<div class="hover">
							<h4>Already have an account?</h4>
                            
							<a class="primary-btn" href="{{ url('/login') }}">login</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Log in to enter</h3>
						<form  method="POST" action="{{ route('register') }}" class="row login_form" id="contactForm">
							@csrf
                            <div class="col-md-12 form-group">
                            <input class="form-control" type="text" placeholder="Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Name'" id="name" name="name" required="" class="single-input">
                            </div>
							<div class="col-md-12 form-group">
								<input class="form-control" type="email" id="email"
								name="email" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
							</div>
                            <div class="col-md-12 form-group">
                                <input class="form-control" type="text" placeholder="Phone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone'" id="phone" name="phone" required="" class="single-input">
                                </div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="password"
								name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
							</div>
                            <div class="col-md-12 form-group">
								<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="primary-btn">Register</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->

@endsection --}}
