@extends('frontend.layouts.master')

@section('content')
<div class="o_landy_dashboard_area dashboard_bg section_spacing6">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8">
                <!-- content ::start  -->
                <div class="white_box style2 bg-white mb_30">
                    <div class="dashboard_white_box_body dashboard_orderDetails_body">

                        <div class="order_details_progress style2">
                            <div class="single_order_progress position-relative d-flex align-items-center flex-column">
                                <div class="icon position-relative ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30">
                                        <g  data-name="1" transform="translate(-613 -335)">
                                            <circle  data-name="Ellipse 239" cx="15" cy="15" r="15" transform="translate(613 335)" fill="#50cd89"></circle>
                                            <path  data-name="Path 4193" d="M95.541,18.379a1.528,1.528,0,0,1-1.16-.533l-3.665-4.276a1.527,1.527,0,0,1,2.319-1.988l2.4,2.8L103,5.245c1.172-1.642,2.4-.733,1.222.916L96.784,17.739a1.528,1.528,0,0,1-1.175.638Z" transform="translate(530.651 338.622)" fill="#fff"></path>
                                        </g>
                                    </svg>
                                </div>
                                <h5 class="font_14 f_w_500 m-0 text-nowrap">{{ _trans('landlord.Order Placed')}}</h5>
                            </div>
                            <div class="single_order_progress position-relative d-flex align-items-center flex-column">
                                <div class="icon position-relative ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30">
                                    <g  data-name="1" transform="translate(-613 -335)">
                                        <g  data-name="Ellipse 239" transform="translate(613 335)" fill="none" stroke="#50cd89" stroke-width="2">
                                        <circle cx="15" cy="15" r="15" stroke="none"></circle>
                                        <circle cx="15" cy="15" r="14" fill="none"></circle>
                                        </g>
                                        <circle  data-name="Ellipse 240" cx="5" cy="5" r="5" transform="translate(623 345)" fill="#50cd89"></circle>
                                    </g>
                                </svg>

                                </div>
                                <h5 class="font_14 f_w_500 m-0 text-nowrap">{{ _trans('landlord.Confirmed')}}</h5>
                            </div>
                            <div class="single_order_progress position-relative d-flex align-items-center flex-column">
                                <div class="icon position-relative ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30">
                                    <g  data-name="1" transform="translate(-613 -335)">
                                        <g  data-name="Ellipse 239" transform="translate(613 335)" fill="none" stroke="#f1ece8" stroke-width="2">
                                        <circle cx="15" cy="15" r="15" stroke="none"></circle>
                                        <circle cx="15" cy="15" r="14" fill="none"></circle>
                                        </g>
                                        <circle  data-name="Ellipse 240" cx="5" cy="5" r="5" transform="translate(623 345)" fill="#f1ece8"></circle>
                                    </g>
                                </svg>
                                </div>
                                <h5 class="font_14 f_w_500 m-0 mute_text  text-nowrap">{{ _trans('landlord.Processed')}}</h5>
                            </div>
                            <div class="single_order_progress position-relative d-flex align-items-center flex-column">
                                <div class="icon position-relative ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30">
                                        <g  data-name="1" transform="translate(-613 -335)">
                                            <g  data-name="Ellipse 239" transform="translate(613 335)" fill="none" stroke="#f1ece8" stroke-width="2">
                                            <circle cx="15" cy="15" r="15" stroke="none"></circle>
                                            <circle cx="15" cy="15" r="14" fill="none"></circle>
                                            </g>
                                            <circle  data-name="Ellipse 240" cx="5" cy="5" r="5" transform="translate(623 345)" fill="#f1ece8"></circle>
                                        </g>
                                    </svg>

                                </div>
                                <h5 class="font_14 f_w_500 m-0 mute_text text-nowrap">{{ _trans('landlord.Shipped')}}</h5>
                            </div>
                            <div class="single_order_progress position-relative d-flex align-items-center flex-column">
                                <div class="icon position-relative ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30">
                                        <g  data-name="1" transform="translate(-613 -335)">
                                            <g  data-name="Ellipse 239" transform="translate(613 335)" fill="none" stroke="#f1ece8" stroke-width="2">
                                            <circle cx="15" cy="15" r="15" stroke="none"></circle>
                                            <circle cx="15" cy="15" r="14" fill="none"></circle>
                                            </g>
                                            <circle  data-name="Ellipse 240" cx="5" cy="5" r="5" transform="translate(623 345)" fill="#f1ece8"></circle>
                                        </g>
                                    </svg>
                                </div>
                                <h5 class="font_14 f_w_500 m-0 mute_text text-nowrap">{{ _trans('landlord.Delivered')}}</h5>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap_20 flex-wrap gray_color_1 dashboard_orderDetails_head  justify-content-between theme_border">
                            <div class="d-flex flex-column  ">
                                <div class="d-flex align-items-center flex-wrap gap_5">
                                    <h4 class="font_14 f_w_500 m-0 lh-base">{{ _trans('landlord.Order ID')}}: </h4> <p class="font_14 f_w_400 m-0 lh-base">3211228025521</p>
                                </div>
                                <div class="d-flex align-items-center flex-wrap gap_5">
                                    <h4 class="font_14 f_w_500 m-0 lh-base">{{ _trans('landlord.Order Date')}} :  </h4> <p class="font_14 f_w_400 m-0 lh-base">2021-12-28 02:55:21</p>
                                </div>
                            </div>
                            <div class="d-flex flex-column ">
                                <div class="d-flex align-items-center flex-wrap gap_5">
                                    <h4 class="font_14 f_w_500 m-0 lh-base">{{ _trans('landlord.Status')}}:   </h4> <p class="font_14 f_w_400 m-0 lh-base"> Confirmed</p>
                                </div>
                                <div class="d-flex align-items-center flex-wrap gap_5">
                                    <h4 class="font_14 f_w_500 m-0 lh-base">{{ _trans('landlord.Request Send Data')}}:   </h4> <p class="font_14 f_w_400 m-0 lh-base"> 2021-06-10 15:17:21 </p>
                                </div>
                            </div>
                            <div class="d-flex flex-column  ">
                                <div class="d-flex align-items-center flex-wrap gap_5">
                                    <h4 class="font_14 f_w_500 m-0 lh-base">{{ _trans('landlord.Order Amount')}}:   </h4> <p class="font_14 f_w_400 m-0 lh-base"> $8420.00</p>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive mb_20">
                            <table class="table o_landy_table3 style2 mb-0">
                                <tbody>
                                    <tr>
                                        <td>
                                            <a href="{{route('properties.details')}}" class="d-flex align-items-center gap_20">
                                                <div class="thumb">
                                                    <img src="{{url('frontend/img/o_land_property/summery_product_1.png')}}" alt="">
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
                                                <div class="thumb">
                                                    <img src="{{url('frontend/img/o_land_property/summery_product_1.png')}}" alt="">
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
                        <div class="d-flex align-items-center gap_20 mb_20 flex-wrap gray_color_1 dashboard_orderDetails_head2  justify-content-between theme_border">
                            <div class="d-flex flex-column  ">
                                <div class="d-flex align-items-center flex-wrap gap_5 mb_7">
                                    <h4 class="font_14 f_w_500 m-0 lh-base">{{ _trans('landlord.Order ID')}}: </h4> <p class="font_14 f_w_400 m-0 lh-base">3211228025521</p>
                                </div>
                                <div class="d-flex align-items-center flex-wrap gap_5 mb_7">
                                    <h4 class="font_14 f_w_500 m-0 lh-base">{{ _trans('landlord.Order Date')}} :  </h4> <p class="font_14 f_w_400 m-0 lh-base">2021-12-28 02:55:21</p>
                                </div>
                                <div class="d-flex align-items-center flex-wrap gap_5">
                                    <h4 class="font_14 f_w_500 m-0 lh-base">{{ _trans('landlord.Refund Method')}}:  </h4> <p class="font_14 f_w_400 m-0 lh-base">Wallet</p>
                                </div>
                            </div>
                            <div class="d-flex flex-column ">
                                <div class="d-flex align-items-center flex-wrap gap_5 mb_7">
                                    <h4 class="font_14 f_w_500 m-0 lh-base">{{ _trans('landlord.Status')}}:   </h4> <p class="font_14 f_w_400 m-0 lh-base"> Pending</p>
                                </div>
                                <div class="d-flex align-items-center flex-wrap gap_5 mb_7">
                                    <h4 class="font_14 f_w_500 m-0 lh-base">{{ _trans('landlord.Request Send Data')}}:   </h4> <p class="font_14 f_w_400 m-0 lh-base"> 2021-06-10 15:17:21</p>
                                </div>
                                <div class="d-flex align-items-center flex-wrap gap_5">
                                    <h4 class="font_14 f_w_500 m-0 lh-base">{{ _trans('landlord.Shipping Method')}}:   </h4> <p class="font_14 f_w_400 m-0 lh-base"> Courier </p>
                                </div>
                            </div>
                            <div class="d-flex flex-column  ">
                                <div class="d-flex align-items-center flex-wrap gap_5">
                                    <h4 class="font_14 f_w_500 m-0 lh-base">{{ _trans('landlord.Amount')}}:   </h4> <p class="font_14 f_w_400 m-0 lh-base"> $9,670.65</p>
                                </div>
                            </div>
                        </div>
                        <div class="order_details_list_box">
                            <div class="summery_order_body d-flex flex-wrap">
                                <div class="summery_lists">
                                    <div class="single_summery_list d-flex align-items-start gap_20">
                                        <div class="order_text_head d-flex align-items-center justify-content-between font_14 f_w_500 "><h5 class="font_14 f_w_500 m-0">Order code</h5><span>:</span>
                                        </div>
                                        <p class="font_14 f_w_400 m-0">20211228-06450123</p>
                                    </div>
                                    <div class="single_summery_list d-flex align-items-start gap_20">
                                        <div class="order_text_head d-flex align-items-center justify-content-between font_14 f_w_500 "><h5 class="font_14 f_w_500 m-0">Name</h5><span>:</span>
                                        </div>
                                        <p class="font_14 f_w_400 m-0">Christina Ashens</p>
                                    </div>
                                    <div class="single_summery_list d-flex align-items-start gap_20">
                                        <div class="order_text_head d-flex align-items-center justify-content-between font_14 f_w_500 "><h5 class="font_14 f_w_500 m-0">Email </h5><span>:</span>
                                        </div>
                                        <p class="font_14 f_w_400 m-0">info@onesttech</p>
                                    </div>
                                    <div class="single_summery_list d-flex align-items-start gap_20">
                                        <div class="order_text_head d-flex align-items-center justify-content-between font_14 f_w_500 "><h5 class="font_14 f_w_500 m-0">Delivery type</h5><span>:</span>
                                        </div>
                                        <p class="font_14 f_w_400 m-0">Express</p>
                                    </div>
                                    <div class="single_summery_list d-flex align-items-start gap_20">
                                        <div class="order_text_head d-flex align-items-center justify-content-between font_14 f_w_500 "><h5 class="font_14 f_w_500 m-0">Shipping Address</h5><span>:</span>
                                        </div>
                                        <p class="font_14 f_w_400 m-0">3977 Duke Lane, 5520 Alabaster United States 234780</p>
                                    </div>
                                </div>
                                <div class="summery_lists">
                                    <div class="single_summery_list d-flex align-items-start gap_20">
                                        <div class="order_text_head d-flex align-items-center justify-content-between font_14 f_w_500 "><h5 class="font_14 f_w_500 m-0">Order code</h5><span>:</span>
                                        </div>
                                        <p class="font_14 f_w_400 m-0">20211228-06450123</p>
                                    </div>
                                    <div class="single_summery_list d-flex align-items-start gap_20">
                                        <div class="order_text_head d-flex align-items-center justify-content-between font_14 f_w_500 "><h5 class="font_14 f_w_500 m-0">Name</h5><span>:</span>
                                        </div>
                                        <p class="font_14 f_w_400 m-0">Christina Ashens</p>
                                    </div>
                                    <div class="single_summery_list d-flex align-items-start gap_20">
                                        <div class="order_text_head d-flex align-items-center justify-content-between font_14 f_w_500 "><h5 class="font_14 f_w_500 m-0">Email </h5><span>:</span>
                                        </div>
                                        <p class="font_14 f_w_400 m-0">info@onesttech</p>
                                    </div>
                                    <div class="single_summery_list d-flex align-items-start gap_20">
                                        <div class="order_text_head d-flex align-items-center justify-content-between font_14 f_w_500 "><h5 class="font_14 f_w_500 m-0">Delivery type</h5><span>:</span>
                                        </div>
                                        <p class="font_14 f_w_400 m-0">Express</p>
                                    </div>
                                    <div class="single_summery_list d-flex align-items-start gap_20">
                                        <div class="order_text_head d-flex align-items-center justify-content-between font_14 f_w_500 "><h5 class="font_14 f_w_500 m-0">Shipping Address</h5><span>:</span>
                                        </div>
                                        <p class="font_14 f_w_400 m-0">3977 Duke Lane, 5520 Alabaster United States 234780</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content ::end    -->
            </div>
            <div class="col-xl-3 col-lg-4">
                <div class="dashboard_white_box style3 rounded-0 bg-white mb_20">
                    <div class="dashboard_white_box_body">
                    <h4 class="font_20 f_w_700 mb-2">{{ _trans('landlord.Pending')}}</h4>
                    <p class="lineHeight1 font_14 f_w_400 mb-0">{{ _trans('landlord.hello')}}</p>
                    </div>
                </div>
                <div class="dashboard_white_box style3 rounded-0 bg-white mb_20">
                    <div class="dashboard_white_box_body">
                    <h4 class="font_20 f_w_700 mb-2">{{ _trans('landlord.Processing')}}</h4>
                    <p class="lineHeight1 font_14 f_w_400 mb-0">{{ _trans('landlord.hello')}}</p>
                    </div>
                </div>
                <div class="dashboard_white_box style3 rounded-0 bg-white mb_20">
                    <div class="dashboard_white_box_body">
                    <h4 class="font_20 f_w_700 mb-2">{{ _trans('landlord.Received')}}</h4>
                    <p class="lineHeight1 font_14 f_w_400 mb-0">{{ _trans('landlord.hello')}}</p>
                    </div>
                </div>
                <div class="dashboard_white_box style3 rounded-0 bg-white mb_20">
                    <div class="dashboard_white_box_body">
                    <h4 class="font_20 f_w_700 mb-2">{{ _trans('landlord.Delivered')}}</h4>
                    <p class="lineHeight1 font_14 f_w_400 mb-0">{{ _trans('landlord.hello')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
