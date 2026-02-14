@extends('frontend.layouts.master')

@section('content')
  <!-- checkout_v3_area::start  -->
<div class="checkout_v3_area">
    <div class="checkout_v3_left d-flex justify-content-end">
        <div class="checkout_v3_inner">
            <div class="shiping_address_box checkout_form m-0">
                <div class="billing_address">

                    <div class="row">
                        <form action="{{ route('customer.placeOrder') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="col-12 mb_10">
                            <h3 class="check_v3_title2">Payment</h3>
                            <h6 class="shekout_subTitle_text">All transactions are secure and encrypted.</h6>
                        </div>
                        <div class="col-12">
                            <div class="accordion checkout_acc_style mb_30" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                    <span class="accordion-button shadow-none collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo"  aria-controls="collapseTwo">
                                        <span>
                                            <label class="primary_checkbox d-inline-flex style5 gap_10">
                                                <input type="radio" checked name="payment_method" value="cash_on_delivery">
                                                <span class="checkmark m-0"></span>
                                                <span class="label_name f_w_500 ">
                                                    Cash on Delivery (COD)
                                                </span>
                                            </label>
                                        </span>
                                    </span>
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb_10">
                            <h3 class="check_v3_title2">Billing Address</h3>
                            <h6 class="shekout_subTitle_text">All transactions are secure and encrypted.</h6>
                        </div>
                        <div class="col-12">
                            <div class="accordion checkout_acc_style style2 mb_30" id="accordionExample1">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo1">
                                    <span class="accordion-button shadow-none collapsed"  data-bs-toggle="collapse" >
                                        <label class="primary_checkbox d-inline-flex style5 gap_10">
                                            <input checked name="address"  type="radio" value="same_address">
                                            <span class="checkmark m-0"></span>
                                            <span class="label_name f_w_500 ">
                                            Same as shipping address
                                            </span>
                                        </label>
                                    </span>
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="check_v3_btns flex-wrap d-flex align-items-center">
                                <a href="#" class="o_land_primary_btn style2  min_200 text-center text-uppercase ">Pay now</a>
                                <a href="#" class="return_text">Return to shipping</a>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- checkout_v3_area::end  -->
@endsection
