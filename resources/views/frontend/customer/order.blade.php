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
                        <h3 class="font_20 f_w_700 mb-0 ">{{ _trans('landlord.My Orders')}}</h3>
                    </div>

                    <!-- tab-content  -->
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <!-- content ::start  -->
                            <div class="white_box style2 bg-white mb_20">
                                @foreach ($data['orders'] as $order)
                                    <div
                                        class="white_box_header d-flex align-items-center gap_20 flex-wrap  o_landy_bb3 justify-content-between ">
                                        <div class="d-flex flex-column  ">
                                            <div class="d-flex align-items-center flex-wrap gap_5">
                                                <h4 class="font_14 f_w_500 m-0 lh-base">Order ID: </h4>
                                                <p class="font_14 f_w_400 m-0 lh-base"> {{ $order->invoice_no }}</p>
                                            </div>
                                            <div class="d-flex align-items-center flex-wrap gap_5">
                                                <h4 class="font_14 f_w_500 m-0 lh-base">Order Date : </h4>
                                                <p class="font_14 f_w_400 m-0 lh-base"> {{ $order->date }}</p>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column  ">
                                            <div class="d-flex align-items-center flex-wrap gap_5">
                                                <h4 class="font_14 f_w_500 m-0 lh-base">Order Amount: </h4>
                                                <p class="font_14 f_w_400 m-0 lh-base">{{ priceFormat($order->grand_total) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dashboard_white_box_body">
                                        <div class="table-responsive mb_10">
                                            <table class="table o_landy_table3 style2 mb-0">
                                                <tbody>
                                                @foreach($order->orderDetails as $item)
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
                                                                        {{ $item->property->name }} </h4>
                                                                    <p class="font_14 f_w_400 m-0 ">
                                                                        {{ $item->property->category->name }}</p>
                                                                </div>
                                                            </a>
                                                        </td>

                                                        <td>
                                                            <h4 class="font_16 f_w_500 m-0 ">{{ priceFormat($item->total_amount) }}</h4>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <a href="{{ route('customer.orderDetails', $order->id )}}" class="o_land_primary_btn style2 text-nowrap">Order details</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
