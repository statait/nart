{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Reset Password') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}




@extends('frontend.main_master')
@section('content')

@section('title')
Signin  
@endsection

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Login</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="sign-in-page">
			<div class="row">
				<!-- Sign-in -->			
<div class="col-md-6 col-sm-6 sign-in">
	<h4 class="">Sign in</h4>
	<p class="">Hello, Welcome to your account.</p>
	<br>
	{{-- <div class="social-sign-in outer-top-xs">
		<a href="#" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with Facebook</a>
		<a href="#" class="twitter-sign-in"><i class="fa fa-twitter"></i> Sign In with Twitter</a>
	</div> --}}

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

		<div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
		    <input type="email" id="email"
            name="email" class="form-control unicase-form-control text-input">
		</div>
	  	<div class="form-group">
		    <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
		    <input type="password" class="form-control unicase-form-control text-input" id="password"
            name="password">
		</div>
        <div class="form-group">
		    <label class="info-title" for="exampleInputPassword1">Password Confirmation <span>*</span></label>
		    <input type="password" class="form-control unicase-form-control text-input" id="password_confirmation"
            name="password_confirmation">
		</div>

		
	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Reset Password</button>
	</form>					
</div>
<!-- Sign-in -->

<!-- create a new account -->
<div class="col-md-6 col-sm-6 create-new-account">
	<h4 class="checkout-subtitle">Create a new account</h4>
	<p class="text title-tag-line">Create your new account.</p>

	<form method="POST" action="{{ route('register') }}">
        @csrf

		<div class="form-group">
		    <label class="info-title" for="name">Name <span>*</span></label>
		    <input type="text" class="form-control unicase-form-control text-input" id="name" name="name " >
		</div>
		@error('name')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
		@enderror

		<div class="form-group">
	    	<label class="info-title" for="email">Email Address <span>*</span></label>
	    	<input type="email" class="form-control unicase-form-control text-input" id="email"
            name="email" >
	  	</div>
		  @error('email')
		  <span class="invalid-feedback" role="alert">
			  <strong>{{ $message }}</strong>
		  </span>
	  	  @enderror

        <div class="form-group">
		    <label class="info-title" for="phone">Phone Number <span>*</span></label>
		    <input type="text" class="form-control unicase-form-control text-input" id="phone" name="phone" >
		</div>
		@error('phone')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
		  @enderror

        <div class="form-group">
		    <label class="info-title" for="password">Password <span>*</span></label>
		    <input type="password" class="form-control unicase-form-control text-input" id="password"
            name="password" >
		</div>
		@error('password')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
		  @enderror

         <div class="form-group">
		    <label class="info-title" for="password_confirmation">Confirm Password <span>*</span></label>
		    <input type="password" class="form-control unicase-form-control text-input" id="password_confirmation" name="password_confirmation" >
		</div>
		@error('password_confirmation')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
		  @enderror


	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Sign Up</button>
	</form>
	
	
</div>	
<!-- create a new account -->			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
    </div>
</div>

@endsection