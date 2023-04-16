<!-- Start brand Area -->
<section class="brand-area section_gap">
	<div class="container">
		<div class="row">
			@foreach ($brands as $brand)
			<a class="col single-img" href="#">
				<img class="img-fluid d-block mx-auto" src="{{ asset('frontend/assets/img/brand/1.png') }}" alt="">
			</a>
			@endforeach
		</div>
	</div>
</section>
<!-- End brand Area -->