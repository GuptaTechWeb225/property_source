@extends('frontend.layouts.master')


@section('content')
    <!-- checkout_wrapper_area::start   -->
    <div class="checkout_v3_area">
        <div class="checkout_v3_left d-flex justify-content-end">
            <div class="checkout_v3_inner">
                <form action="{{ route('customer.placeOrder') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="shiping_address_box checkout_form m-0">
                        <div class="billing_address">
                            <div class="row">
                                <h3 class="check_v3_title mb_25">{{ _trans('landlord.Billing Address') }}</h3>

                                <div class="mb-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" {{ $data['address']->count() > 0 ? 'checked' : '' }}  name="address_type" id="oldAddress" value="old_address">
                                        <label class="form-check-label" for="oldAddress">Old Address</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" {{ $data['address']->count() < 1 ? 'checked' : '' }} type="radio" name="address_type" id="newAddress" value="new_address">
                                        <label class="form-check-label" for="newAddress">New Address</label>
                                    </div>
                                </div>

                                <div class="row" id="new_address_inputs">
                                    <div class="col-lg-12 mb_20">
                                        <label
                                            class="primary_label2 style3">{{ _trans('landlord.Name') }}</label>
                                        <input class="primary_input3 style5 radius_3px "
                                               type="text"
                                               placeholder="{{ _trans('landlord.Enter your first and last name') }}"
                                               name="name" value="{{ old('name') }}">
                                        @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6 mb_20">
                                        <label
                                            class="primary_label2 style3">{{ _trans('landlord.Phone') }}</label>
                                        <input class="primary_input3 style5 radius_3px"
                                               type="number"
                                               placeholder="{{ _trans('landlord.154327') }}" name="phone">
                                        @error('phone')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 mb_20">
                                        <label
                                            class="primary_label2 style3">{{ _trans('landlord.Email') }}</label>
                                        <input class="primary_input3 style5 radius_3px"
                                               type="email"
                                               placeholder="{{ _trans('landlord.test@gmail.com') }}"
                                               name="email">
                                        @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-lg-12 mb_20">
                                        <label
                                            class="primary_label2 style3">{{ _trans('landlord.Address') }}</label>
                                        <input class="primary_input3 style5 radius_3px "
                                               type="text"
                                               placeholder="{{ _trans('landlord.House# 122, Street# 245, ABC Road') }}"
                                               name="address" value="{{ old('address') }}">
                                        @error('address')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 mb_20">
                                        <label
                                            class="primary_label2 style3">{{ _trans('landlord.Country') }}</label>
                                        <select class="form-select style5 primary_input3"
                                                aria-label="Default select example" name="country_id">
                                            <option class="primary_input3" value="">
                                                {{ _trans('landlord.Select Country') }}</option>
                                            @foreach ($data['country'] as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('country')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 mb_20">
                                        <label
                                            class="primary_label2 style3">{{ _trans('landlord.Postal Code') }}</label>
                                        <input class="primary_input3 style5 radius_3px"
                                               type="number"
                                               placeholder="{{ _trans('landlord.154327') }}" name="postal">
                                        @error('postal')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                </div>


                                @if ($data['address']->count() > 0)
                                    @foreach ($data['address'] as $key => $address)
                                        <label class="aiz-megabox d-block bg-white">
                                            <span class="d-flex p-3 gap-2 address-box">
                                                <input type="radio" name="billing_address_id"
                                                       value="{{ $address->id }}">
                                                <span class=" flex-shrink-0 mt-1"></span>
                                                <span class="flex-grow-1 pl-3 text-left line-break">
                                                    <div> <span class="w-50 fw-600">Name:</span>
                                                        <span class="ml-2">{{ $address->name }}</span>
                                                    </div>
                                                    <div> <span class="w-50 fw-600">Phone:</span>
                                                        <span class="ml-2">{{ $address->phone }}</span>
                                                    </div>
                                                    <div> <span class="w-50 fw-600">Address:</span>
                                                        <span class="ml-2">{{ $address->address }}</span>
                                                    </div>
                                                </span>
                                            </span>
                                        </label>
                                    @endforeach
                                @else
                                    <p>No address found for this user.</p>
                                @endif

                            </div>

                            <div class="row mt-2">
                                <div class="col-12 mb_10">
                                    <h3 class="check_v3_title2">Payment</h3>
                                    <h6 class="shekout_subTitle_text">All transactions are secure and encrypted.</h6>
                                </div>
                                <div class="col-12">
{{--                                    <div class="border d-inline-block p-3">--}}
{{--                                        <label class="primary_checkbox d-inline-flex style5 gap_10">--}}
{{--                                            <input name="payment_method" value="cash_on_delivery" type="radio" checked>--}}
{{--                                            <span class="checkmark m-0"></span>--}}
{{--                                            <span class="label_name f_w_500 ">--}}
{{--                                                Cash on Delivery (COD)--}}
{{--                                            </span>--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
                                    <div class="d-inline-block text-white">
                                        <label class="primary_checkbox d-inline-flex style5 gap_10">
                                            <input name="payment_method" value="cash_on_delivery" type="radio" checked>
                                            <span class="checkmark m-0"></span>
                                            <span class="label_name f_w_500 text-white">
                                              <img height="60" src="https://i.pcmag.com/imagery/reviews/068BjcjwBw0snwHIq0KNo5m-15.fit_lim.size_1050x591.v1602794215.png" alt="">
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="py-4">
                                        <label class="primary_checkbox d-flex">
                                            <input type="hidden" value="0" name="terms_and_condition">
                                            <input required type="checkbox" value="1" name="terms_and_condition">
                                            <span class="checkmark mr_15"></span>
                                            <span
                                                class="label_name f_w_400 ">{{ _trans('landlord.I agree with the terms and conditions.') }}</span>

                                        </label>
                                        @error('terms_and_condition')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="check_v3_btns flex-wrap d-flex align-items-center">
                                        <button type="submit" class="o_land_primary_btn style2  min_200 text-center text-uppercase ">
                                            Place Order
                                        </button>
                                        <a href="#" class="return_text">Return to shipping</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="checkout_v3_right d-flex justify-content-start">
            <div class="order_sumery_box flex-fill">
                <h3 class="check_v3_title mb_25">{{ _trans('landlord.Order Summary') }}</h3>
                <div class="subtotal_lists">
                    @php
                        $total = 0;
                    @endphp
                    @forelse($data['carts'] as $cart)
                        <div class="single_total_list d-flex align-items-center">
                            <div class="single_total_left flex-fill">
                                <h4>{{ _trans('landlord.Subtotal') }}</h4>
                            </div>
                            <div class="single_total_right">
                                <span> {{ priceFormat($cart->amount) }}</span>
                            </div>
                        </div>

                        <div class="single_total_list d-flex align-items-center flex-wrap">
                            <div class="single_total_left flex-fill">
                                <h4>{{ _trans('landlord.Discount') }}</h4>
                            </div>
                            <div class="single_total_right">
                                <span> {{ priceFormat($cart->discount_amount) }}</span>
                            </div>
                        </div>

                        @php
                            $total += $cart->amount - $cart->discount_amount;
                        @endphp
                    @empty
                        <p>{{ _trans('landlord.No property found') }}</p>
                    @endforelse
                    <div class="total_amount d-flex align-items-center flex-wrap mb_25">
                        <div class="single_total_left flex-fill">
                            <span class="total_text">{{ _trans('landlord.Total') }} (Incl. VAT)</span>
                        </div>
                        <div class="single_total_right">
                            <span class="total_text"> <span>{{ priceFormat($total) }}</span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- checkout_wrapper_area::end   -->
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            @if($data['address']->count() > 0)
                $('#new_address_inputs').hide();
            @endif
            // Add an event listener to the radio buttons
            $('input[name="address_type"]').change(function() {
                if ($(this).val() === 'new_address') {
                    $('#new_address_inputs').show();
                } else {
                    $('#new_address_inputs').hide();
                }
            });
        });
    </script>
    @include('frontend.customer.checkout_script')
@endsection
