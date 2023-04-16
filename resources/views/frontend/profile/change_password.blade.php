@extends('frontend.main_master')
@section('content')

@section('title')
Edit User Profile  
@endsection

@php
    $auth = Auth::user()->name;
@endphp

@include('frontend.common.breadcrumb', ['bread' => "2", 'top' => "Edit ". $auth."'s Dashboard", 'down' => "Edit Profile"] )

<!--================Tracking Box Area =================-->
<section class="tracking_box_area section_gap">
    <div class="container">
        <div class="tracking_box_inner">
            <form class="row tracking_form" method="post" action="{{ route('user.password.update') }}">
                @csrf
                <div class="col-md-12 form-group">
                    <input class="form-control" type="password" id="current_password" name="oldpassword" placeholder="" onfocus="this.placeholder = ''" onblur="this.placeholder = ''">
                </div>
                <div class="col-md-12 form-group">
                    <input value="{{ $user->email }}" type="password" id="password" name="password" class="form-control" placeholder="" onfocus="this.placeholder = ''" onblur="this.placeholder = ''">
                </div>
                <div class="col-md-12 form-group">
                    <input value="{{ $user->phone }}" type="password" id="password_confirmation" name="password_confirmation"  class="form-control" placeholder="" onfocus="this.placeholder = ''" onblur="this.placeholder = ''">
                </div>

                <div class="col-md-12 form-group">
                    <button type="submit" class="primary-btn">Change Password</button>
                </div>
            </form>
        </div>
    </div>
</section>
<!--================End Tracking Box Area =================-->


@endsection