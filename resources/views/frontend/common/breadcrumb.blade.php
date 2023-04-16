<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
	<div class="container">
		<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
			@if ($bread == '1')
			<div class="col-first">
				<h1>{{$top}}</h1>
				<nav class="d-flex align-items-center">
					<a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
					<a href="#">{{$down}}</a>
									
				</nav>
			</div>
			@else
			<img style="border-radius: 50%" src="{{ (!empty($user->profile_photo_path))? url('upload/user_images/'.$user->profile_photo_path):url('upload/no_image.jpg') }}" height="7%" width="7%">
			<div class="col-first ml-4">
				<h1>{{$top}}</h1>
				<nav class="d-flex align-items-center">
					{{-- <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
					<a href="category.html">{{$bread}}</a> --}}
					<a href="{{ route('user.profile') }}" class="genric-btn primary-border small" style="font-size: 12px">Profile</a>
					<a href="{{ route('change.password')}}" class="genric-btn primary-border small" style="font-size: 12px">Password</a>
					<a href="{{ route('user.logout') }}" class="genric-btn danger primary-border small" style="font-size: 12px ">Logout</a>
				</nav>
			</div>
			@endif

		</div>
	</div>
</section>
<!-- End Banner Area -->