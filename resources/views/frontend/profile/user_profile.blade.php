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
            <form class="row tracking_form" method="post" action="{{ route('user.profile.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12 form-group">
                    <input type="text" class="form-control" name="name" placeholder="" onfocus="this.placeholder = ''" value="{{ $user->name }}" onblur="this.placeholder = '{{ $user->name }}'">
                </div>
                <div class="col-md-12 form-group">
                    <input value="{{ $user->email }}" type="email" name="email" class="form-control" placeholder="{{ $user->email }}" onfocus="this.placeholder = ''" onblur="this.placeholder = '{{ $user->email }}'">
                </div>
                <div class="col-md-12 form-group">
                    <input value="{{ $user->phone }}" type="text" class="form-control" name="phone" placeholder="{{ $user->phone }}" onfocus="this.placeholder = ''" onblur="this.placeholder = '{{ $user->phone }}'">
                </div>
                <div class="col-md-12 form-group">
                    <input type="file" class="form-control" name="profile_photo_path">
                </div>

                <div class="col-md-12 form-group">
                    <button type="submit" class="primary-btn">Update Profile</button>
                </div>
            </form>
        </div>
    </div>
</section>
<!--================End Tracking Box Area =================-->


@endsection