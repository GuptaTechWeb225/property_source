@extends('frontend.layouts.master')

@section('content')

<div class="o_landy_dashboard_area dashboard_bg section_spacing6">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4">
            @include('frontend.include.sidebar')
        </div>
            <div class="col-xl-8 col-lg-8">
                <div class="dashboard_white_box_header d-flex align-items-center gap_20  mb_20">
                    <h3 class="font_20 f_w_700 mb-0 ">{{ _trans('landlord.Order Details')}}</h3>
                </div>
                <!-- content ::start  -->
                <div class="white_box style2 bg-white mb_30">
                    <div class="white_box_header gray_color_1 d-flex align-items-center gap_20 flex-wrap  theme_border justify-content-between ">
                        <div class="d-flex flex-column  ">
                            <div class="d-flex align-items-center flex-wrap gap_5">
                                <h4 class="font_14 f_w_500 m-0 lh-base">{{ _trans('landlord.Order ID:')}}  </h4> <p class="font_14 f_w_400 m-0 lh-base"> {{ @$data['order']->invoice_no }}</p>
                            </div>
                            <div class="d-flex align-items-center flex-wrap gap_5">
                                <h4 class="font_14 f_w_500 m-0 lh-base">{{ _trans('landlord.Order Date :')}}  </h4> <p class="font_14 f_w_400 m-0 lh-base"> {{ @$data['order']->date }}</p>
                            </div>
                        </div>
                        <div class="d-flex flex-column  ">
                            <div class="d-flex align-items-center flex-wrap gap_5">
                                <h4 class="font_14 f_w_500 m-0 lh-base">{{ _trans('landlord.Order Amount:')}} </h4> <p class="font_14 f_w_400 m-0 lh-base">${{ @$data['order']->grand_total }}</p>
                            </div>
                        </div>
                        <div class="d-flex flex-column  ">
                            <a href="{{ route('customer.invoiceDownload', $data['order']->id )}}" class="o_land_primary_btn gray_bg_btn min_200 radius_3px">{{ _trans('landlord.+ Download invoice')}}</a>
                        </div>
                    </div>
                    <div class="dashboard_white_box_body dashboard_orderDetails_body">

                        <div class="table-responsive mb_10">
                            <table class="table o_landy_table3 style2 mb-0">
                                <tbody>
                                @foreach($data['order']->orderDetails as $item)
                                    <tr>
                                        <td>
                                            <a href="{{ route('properties.details') }}"
                                                class="d-flex align-items-center gap_20">
                                                <div class="thumb wishlist-thumb">
                                                    <img class="img-fluid"
                                                        src="{{ @globalAsset($item->property->galleries->first()->image->path) }}"
                                                        alt="">
                                                </div>
                                                <div class="summery_pro_content">
                                                    <h4 class="font_16 f_w_700 text-nowrap m-0 theme_hover">
                                                        {{ @$item->property->name }} </h4>
                                                    <p class="font_14 f_w_400 m-0 ">
                                                        {{ @$item->property->category->name }}</p>
                                                </div>
                                            </a>
                                        </td>

                                        <td>
                                            <h4 class="font_16 f_w_500 m-0 "> {{ priceFormat($item->total_amount) }}
                                            </h4>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="order_details_list_box">
                            <div class="summery_order_body ">
                                <div class="summery_lists">
                                    <div class="single_summery_list d-flex align-items-start gap_20">
                                        <div class="order_text_head d-flex align-items-center justify-content-between font_14 f_w_500 "><h5 class="font_14 f_w_500 m-0">Order code</h5><span>:</span>
                                        </div>
                                        <p class="font_14 f_w_400 m-0">{{ @$data['order']->invoice_no }}</p>
                                    </div>
                                    <div class="single_summery_list d-flex align-items-start gap_20">
                                        <div class="order_text_head d-flex align-items-center justify-content-between font_14 f_w_500 "><h5 class="font_14 f_w_500 m-0">Name</h5><span>:</span>
                                        </div>
                                        <p class="font_14 f_w_400 m-0">{{ @$data['order']->user->name }}</p>
                                    </div>
                                    <div class="single_summery_list d-flex align-items-start gap_20">
                                        <div class="order_text_head d-flex align-items-center justify-content-between font_14 f_w_500 "><h5 class="font_14 f_w_500 m-0">Email </h5><span>:</span>
                                        </div>
                                        <p class="font_14 f_w_400 m-0">{{ @$data['order']->user->email }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content ::end    -->
            </div>

        </div>
    </div>
</div>

@endsection
