@extends('frontend.layouts.master')

@section('content')
<div class="o_landy_dashboard_area dashboard_bg section_spacing6">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4">
                @include('frontend.include.sidebar')
            </div>
            <div class="col-xl-9 col-lg-8">
                <div class="white_box style2 bg-white mb_20">
                    <div class="white_box_header d-flex align-items-center gap_20 flex-wrap  o_landy_bb3 justify-content-between ">
                        <div class="d-flex flex-column  ">
                            <div class="d-flex align-items-center flex-wrap gap_5">
                                <h4 class="font_14 f_w_500 m-0 lh-base">{{ _trans('landlord.Order ID:')}} </h4> <p class="font_14 f_w_400 m-0 lh-base"> {{ _trans('landlord.3211228025521')}}</p>
                            </div>
                            <div class="d-flex align-items-center flex-wrap gap_5">
                                <h4 class="font_14 f_w_500 m-0 lh-base">{{ _trans('landlord.Order Date :')}} </h4> <p class="font_14 f_w_400 m-0 lh-base"> {{ _trans('landlord.2021-12-28 02:55:21')}}</p>
                            </div>
                        </div>
                        <div class="d-flex flex-column ">
                            <div class="d-flex align-items-center flex-wrap gap_5">
                                <h4 class="font_14 f_w_500 m-0 lh-base">{{ _trans('landlord.Status:')}} </h4> <p class="font_14 f_w_400 m-0 lh-base"> {{ _trans('landlord.Confirmed')}}</p>
                            </div>
                            <div class="d-flex align-items-center flex-wrap gap_5">
                                <h4 class="font_14 f_w_500 m-0 lh-base">{{ _trans('landlord.Request Send Data:')}} </h4> <p class="font_14 f_w_400 m-0 lh-base"> {{ _trans('landlord.2021-06-10 15:17:21')}}</p>
                            </div>
                        </div>
                        <div class="d-flex flex-column  ">
                            <div class="d-flex align-items-center flex-wrap gap_5">
                                <h4 class="font_14 f_w_500 m-0 lh-base">{{ _trans('landlord.Order Amount:')}} </h4> <p class="font_14 f_w_400 m-0 lh-base"> {{ _trans('landlord.$8420.00')}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard_white_box_body">
                        <div class="table-responsive mb_10">
                            <table class="table o_landy_table3 style2 mb-0">
                                <tbody>
                                    <tr>
                                        <td>
                                            <a href="{{route('properties.details')}}" class="d-flex align-items-center gap_20">
                                                <div class="thumb wishlist-thumb">
                                                    <img class="img-fluid" src="{{url('frontend/img/dashboard/products/1.png')}}" alt="">
                                                </div>
                                                <div class="summery_pro_content">
                                                    <h4 class="font_16 f_w_700 text-nowrap m-0 theme_hover">Apartment in Banani</h4>
                                                    <p class="font_14 f_w_400 m-0 ">Apartment</p>
                                                </div>
                                            </a>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center gap_7">
                                                <span class="green_badge">-30%</span>
                                                <span class="font_16 f_w_500 mute_text text-decoration-line-through ">$5,00.00</span>
                                            </div>
                                        </td>

                                        <td>
                                            <h4 class="font_16 f_w_500 m-0 ">$4,00.00</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="{{route('properties.details')}}" class="d-flex align-items-center gap_20">
                                                <div class="thumb wishlist-thumb">
                                                    <img class="img-fluid" src="{{url('frontend/img/dashboard/products/1.png')}}" alt="">
                                                </div>
                                                <div class="summery_pro_content">
                                                    <h4 class="font_16 f_w_700 text-nowrap m-0 theme_hover">Apartment in Banani</h4>
                                                    <p class="font_14 f_w_400 m-0 ">Apartment</p>
                                                </div>
                                            </a>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center gap_7">
                                                <span class="green_badge">-30%</span>
                                                <span class="font_16 f_w_500 mute_text text-decoration-line-through ">$5,00.00</span>
                                            </div>
                                        </td>

                                        <td>
                                            <h4 class="font_16 f_w_500 m-0 ">$4,00.00</h4>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="{{route('customer.refundDetails')}}" class="o_land_primary_btn style2 text-nowrap ">View details</a>
                        </div>
                    </div>
                </div>
                <div class="white_box style2 bg-white mb_20">
                    <div class="white_box_header d-flex align-items-center gap_20 flex-wrap  o_landy_bb3 justify-content-between ">
                        <div class="d-flex flex-column  ">
                            <div class="d-flex align-items-center flex-wrap gap_5">
                                <h4 class="font_14 f_w_500 m-0 lh-base">Order ID: </h4> <p class="font_14 f_w_400 m-0 lh-base"> 3211228025521</p>
                            </div>
                            <div class="d-flex align-items-center flex-wrap gap_5">
                                <h4 class="font_14 f_w_500 m-0 lh-base">Order Date : </h4> <p class="font_14 f_w_400 m-0 lh-base"> 2021-12-28 02:55:21</p>
                            </div>
                        </div>
                        <div class="d-flex flex-column ">
                            <div class="d-flex align-items-center flex-wrap gap_5">
                                <h4 class="font_14 f_w_500 m-0 lh-base">Status: </h4> <p class="font_14 f_w_400 m-0 lh-base"> Confirmed</p>
                            </div>
                            <div class="d-flex align-items-center flex-wrap gap_5">
                                <h4 class="font_14 f_w_500 m-0 lh-base">Request Send Data: </h4> <p class="font_14 f_w_400 m-0 lh-base"> 2021-06-10 15:17:21</p>
                            </div>
                        </div>
                        <div class="d-flex flex-column  ">
                            <div class="d-flex align-items-center flex-wrap gap_5">
                                <h4 class="font_14 f_w_500 m-0 lh-base">Order Amount: </h4> <p class="font_14 f_w_400 m-0 lh-base"> $8420.00</p>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard_white_box_body">
                        <div class="table-responsive mb_10">
                            <table class="table o_landy_table3 style2 mb-0">
                                <tbody>
                                    <tr>
                                        <td>
                                            <a href="{{route('properties.details')}}" class="d-flex align-items-center gap_20">
                                                <div class="thumb wishlist-thumb">
                                                    <img class="img-fluid" src="{{url('frontend/img/dashboard/products/1.png')}}" alt="">
                                                </div>
                                                <div class="summery_pro_content">
                                                    <h4 class="font_16 f_w_700 text-nowrap m-0 theme_hover">Apartment in Banani</h4>
                                                    <p class="font_14 f_w_400 m-0 ">Apartment</p>
                                                </div>
                                            </a>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center gap_7">
                                                <span class="green_badge">-30%</span>
                                                <span class="font_16 f_w_500 mute_text text-decoration-line-through ">$5,00.00</span>
                                            </div>
                                        </td>

                                        <td>
                                            <h4 class="font_16 f_w_500 m-0 ">$4,00.00</h4>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="{{route('customer.refundDetails')}}" class="o_land_primary_btn style2 text-nowrap ">View details</a>
                        </div>
                    </div>
                </div>
                <div class="white_box style2 bg-white mb_30">
                    <div class="white_box_header d-flex align-items-center gap_20 flex-wrap  o_landy_bb3 justify-content-between ">
                        <div class="d-flex flex-column  ">
                            <div class="d-flex align-items-center flex-wrap gap_5">
                                <h4 class="font_14 f_w_500 m-0 lh-base">Order ID: </h4> <p class="font_14 f_w_400 m-0 lh-base"> 3211228025521</p>
                            </div>
                            <div class="d-flex align-items-center flex-wrap gap_5">
                                <h4 class="font_14 f_w_500 m-0 lh-base">Order Date : </h4> <p class="font_14 f_w_400 m-0 lh-base"> 2021-12-28 02:55:21</p>
                            </div>
                        </div>
                        <div class="d-flex flex-column ">
                            <div class="d-flex align-items-center flex-wrap gap_5">
                                <h4 class="font_14 f_w_500 m-0 lh-base">Status: </h4> <p class="font_14 f_w_400 m-0 lh-base"> Confirmed</p>
                            </div>
                            <div class="d-flex align-items-center flex-wrap gap_5">
                                <h4 class="font_14 f_w_500 m-0 lh-base">Request Send Data: </h4> <p class="font_14 f_w_400 m-0 lh-base"> 2021-06-10 15:17:21</p>
                            </div>
                        </div>
                        <div class="d-flex flex-column  ">
                            <div class="d-flex align-items-center flex-wrap gap_5">
                                <h4 class="font_14 f_w_500 m-0 lh-base">Order Amount: </h4> <p class="font_14 f_w_400 m-0 lh-base"> $8420.00</p>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard_white_box_body">
                        <div class="table-responsive mb_10">
                            <table class="table o_landy_table3 style2 mb-0">
                                <tbody>
                                    <tr>
                                        <td>
                                            <a href="{{route('properties.details')}}" class="d-flex align-items-center gap_20">
                                                <div class="thumb wishlist-thumb">
                                                    <img class="img-fluid" src="{{url('frontend/img/dashboard/products/1.png')}}" alt="">
                                                </div>
                                                <div class="summery_pro_content">
                                                    <h4 class="font_16 f_w_700 text-nowrap m-0 theme_hover">Apartment in Banani</h4>
                                                    <p class="font_14 f_w_400 m-0 ">Apartment</p>
                                                </div>
                                            </a>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center gap_7">
                                                <span class="green_badge">-30%</span>
                                                <span class="font_16 f_w_500 mute_text text-decoration-line-through ">$5,00.00</span>
                                            </div>
                                        </td>

                                        <td>
                                            <h4 class="font_16 f_w_500 m-0 ">$4,00.00</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="{{route('properties.details')}}" class="d-flex align-items-center gap_20">
                                                <div class="thumb wishlist-thumb">
                                                    <img class="img-fluid" src="{{url('frontend/img/dashboard/products/1.png')}}" alt="">
                                                </div>
                                                <div class="summery_pro_content">
                                                    <h4 class="font_16 f_w_700 text-nowrap m-0 theme_hover">Apartment in Banani</h4>
                                                    <p class="font_14 f_w_400 m-0 ">Apartment</p>
                                                </div>
                                            </a>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center gap_7">
                                                <span class="green_badge">-30%</span>
                                                <span class="font_16 f_w_500 mute_text text-decoration-line-through ">$5,00.00</span>
                                            </div>
                                        </td>

                                        <td>
                                            <h4 class="font_16 f_w_500 m-0 ">$4,00.00</h4>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="{{route('customer.refundDetails')}}" class="o_land_primary_btn style2 text-nowrap ">View details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
