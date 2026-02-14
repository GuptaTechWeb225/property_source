@extends('frontend.layouts.master')

@section('content')
<div class="o_landy_dashboard_area dashboard_bg section_spacing6">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4">
                @include('frontend.include.sidebar')
            </div>
            <div class="col-xl-7 col-lg-7">
                <div class="dashboard_white_box style6 bg-white mb_25">
                    <div class="d-flex align-items-center gap_20 mb_45">
                        <h5 class="font_20 f_w_700 flex-fill m-0">Notification Panel</h5>
                        <a href="" class="o_land_primary_btn style3 text-capitalize radius_3px gap_10  d-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17.446" height="18" viewBox="0 0 17.446 18">
                            <path id="setting" d="M24.806,10.431l-.749-.616a1.055,1.055,0,0,1,0-1.629l.749-.616a1.4,1.4,0,0,0,.324-1.789L23.651,3.22a1.4,1.4,0,0,0-1.711-.614l-.908.34a1.055,1.055,0,0,1-1.41-.814l-.159-.957A1.4,1.4,0,0,0,18.075,0H15.118a1.4,1.4,0,0,0-1.387,1.175l-.159.957a1.055,1.055,0,0,1-1.41.814l-.908-.34a1.4,1.4,0,0,0-1.711.614L8.063,5.78a1.4,1.4,0,0,0,.324,1.789l.749.616a1.055,1.055,0,0,1,0,1.629l-.749.616a1.4,1.4,0,0,0-.324,1.789L9.541,14.78a1.4,1.4,0,0,0,1.711.614l.908-.34a1.055,1.055,0,0,1,1.41.814l.159.957A1.4,1.4,0,0,0,15.118,18h2.957a1.4,1.4,0,0,0,1.387-1.175l.159-.957a1.055,1.055,0,0,1,1.41-.814l.908.34a1.4,1.4,0,0,0,1.711-.614l1.479-2.561a1.4,1.4,0,0,0-.324-1.789Zm-2.372,3.647-.908-.34a2.461,2.461,0,0,0-3.291,1.9l-.159.957H15.118l-.159-.957a2.461,2.461,0,0,0-3.291-1.9l-.908.34L9.281,11.516l.749-.616a2.461,2.461,0,0,0,0-3.8l-.749-.616,1.479-2.561.908.34a2.461,2.461,0,0,0,3.291-1.9l.159-.957h2.957l.159.957a2.461,2.461,0,0,0,3.291,1.9l.908-.34,1.479,2.561h0l-.749.616a2.461,2.461,0,0,0,0,3.8l.749.616ZM16.6,5.531A3.469,3.469,0,1,0,20.065,9,3.473,3.473,0,0,0,16.6,5.531Zm0,5.531A2.063,2.063,0,1,1,18.659,9,2.065,2.065,0,0,1,16.6,11.063Z" transform="translate(-7.873)" fill="#fff"/>
                        </svg>
                        Setting</a>
                    </div>
                    <div class="dashboard_notification_body">
                        <!-- dashboard_notification_box -->
                        @foreach($data['notifications'] as $key=>$notification)
                        <div class="dashboard_notification_box">
                            <div class="nofication_userName font_16 f_w_700">
                                {{ $key+1 }}
                            </div>
                            <div class="nofication_content">
                                <h4 class="font_20 f_w_700 m-0">{{$notification->title}} </h4>
                                <p class="nofication_desc">{{$notification->description}} </p>
                                <p class="nofication_subText">Date - {{formatDate($notification->created_at)}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
