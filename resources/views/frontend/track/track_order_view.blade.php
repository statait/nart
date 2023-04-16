@extends('frontend.main_master')
@section('content')

@section('title')
Order Traking 
@endsection

 <!-- Start Banner Area -->
 <section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Order Tracking</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="category.html">Order Tracking</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->
<!--================Tracking Box Area =================-->
<section class="tracking_box_area section_gap">
    <div class="container">
        <div class="tracking_box_inner">
            <p>To track your order please enter your Order ID in the box below and press the "Track Order" button. This
                was given to you on your receipt and in the confirmation email you should have received.</p>
            <form class="row tracking_form" action="{{ route('order.tracking') }}" method="post">
                @csrf
                <div class="col-md-12 form-group">
                    <input type="text" class="form-control" id="order" name="code" placeholder="Invoice ID" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Invoice ID'">
                </div>

                <div class="col-md-12 form-group">
                    <button type="submit" class="primary-btn">Track Order</button>
                </div>
            </form>
        </div>
    </div>
</section>
<!--================End Tracking Box Area =================-->

@endsection