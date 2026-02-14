@extends('frontend.layouts.master')

@section('content')
<!-- error_area::start  -->
<div class="error_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="error_inner">
                    <div class="thumb">
                        <img class="img-fluid" src="{{url('frontend/img/error_img.png')}}" alt="">
                    </div>
                    <h3>Opps! Page Not Found</h3>
                    <p>Perhaps you can try to refresh the page, sometimes it works.</p>
                    <a href="{{route('home')}}" class="o_land_primary_btn min_200 style6 f_w_700 radius_3px">Back To Homepage</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- error_area:: end  -->
@endsection
