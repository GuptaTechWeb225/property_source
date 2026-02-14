@extends('frontend.layouts.master')

@section('content')

<!-- checkout_v3_area::start  -->
<div class="checkout_v3_area">
    <div class="checkout_v3_left d-flex justify-content-end">
        <div class="checkout_v3_inner">
            <div class="shiping_address_box checkout_form m-0">
                <div class="billing_address">

                    <div class="row">
                        <div class="col-12">
                            <div class="shipingV3_info mb_30">
                                <div class="single_shipingV3_info d-flex align-items-start">
                                    <span>{{ _trans('landlord.Contact')}}</span>
                                    <h5 class="m-0 flex-fill">info@onesttech</h5>
                                    <a href="#" class="edit_info_text">{{ _trans('landlord.Change')}}</a>
                                </div>
                                <div class="single_shipingV3_info d-flex align-items-start">
                                    <span>Ship to</span>
                                    <h5 class="m-0 flex-fill"> {{ @$data['shipping']->address }}</h5>
                                    <a href="#" class="edit_info_text">{{ _trans('landlord.Change')}}</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <h3 class="check_v3_title2 mb_13 ">{{ _trans('landlord.Shipping Address')}}</h3>
                        </div>
                        <div class="col-12 mb_25">
                            <div class="standard_shiping_box d-flex align-items-center justify-content-between">
                                <label class="primary_checkbox d-inline-flex style4">
                                    <input checked="" type="checkbox">
                                    <span class="checkmark mr_10"></span>
                                    <span class="label_name f_w_500 mute_text ">{{ _trans('landlord.Standard Shipping')}}</span>
                                </label>
                                <span>$36.00</span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="check_v3_btns flex-wrap d-flex align-items-center">
                                <a href="{{route('customer.payment')}}" class="o_land_primary_btn style2  min_200 text-center text-uppercase ">{{ _trans('landlord.Continue to shipping')}}</a>
                                <a href="{{route('customer.cart')}}" class="return_text">{{ _trans('landlord.Return to cart')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="checkout_v3_right d-flex justify-content-start">
        <div class="order_sumery_box flex-fill">
            <h3 class="check_v3_title mb_25">{{ _trans('landlord.Order Summary')}}</h3>
            <div class="subtotal_lists">
                <div class="single_total_list d-flex align-items-center">
                    <div class="single_total_left flex-fill">
                        <h4>Total</h4>
                    </div>
                    <div class="single_total_right">
                        <span>+ USD 1324.35</span>
                    </div>
                </div>
                <div class="single_total_list d-flex align-items-center flex-wrap">
                    <div class="single_total_left flex-fill">
                        <h4>Discount</h4>
                    </div>
                    <div class="single_total_right">
                        <span>+ USD 75.35</span>
                    </div>
                </div>
                <div class="total_amount d-flex align-items-center flex-wrap">
                    <div class="single_total_left flex-fill">
                        <span class="total_text">{{ _trans('landlord.Total')}} (Incl. VAT)</span>
                    </div>
                    <div class="single_total_right">
                        <span class="total_text">USD <span>$1324.35</span></span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- checkout_v3_area::end  -->

@endsection
