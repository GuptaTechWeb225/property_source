@extends('marsland::layouts.master')
@section('title', _trans('landlord.Checkout'))
@section('marsland-content')
    <!-- Breadcrumb Area S t a r t-->
    <section class="ot-breadcrumb-area breadcrumb-gradient">
        <div class="container">
            <div class="ot-breadcrumb-inner">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="ot-breadcrumb-inner-wrapper text-center">
                            <div class="breadcrumb-text">
                                <h3 class="title font-700">{{ _trans('landlord.checkout page') }}</h3>
                                <div class="line-dro mt-20">
                                    <span class="line-left diamond-square-shape"></span>
                                    <span class="line-circle"></span>
                                    <span class="line-right diamond-square-shape2"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End-of Breadcrumb-->
    <!-- checkout area S t a r t-->
    <section class="ot-checkout-area pt-40 bottom-padding">
        <div class="container">
            <form action="{{ route('cart.order') }}" method="post">
                @csrf
                <div class="row gutter-x-55">
                    <div class="col-lg-7">
                        <div class="p-5 radius-8 box-shadow dark-shadow-none white-bg">
                            <h5 class="font-600 mb-20 text-25">{{ _trans('landlord.Billing Address') }}</h5>
                            <div class="row mb-2">
                                @foreach($addresses as $address)
                                    <div class="col-lg-6 mb-2">
                                        <div class="card card-body p-0">
                                            <label for="address_id_{{$address->id}}" class="p-3">
                                                <div class="d-flex gap-3">
                                                    <input type="radio" class="form-check-input"
                                                           value="{{ $address->id }}" name="billing_address_id"
                                                           id="address_id_{{$address->id}}">
                                                    <div class="">
                                                        <h6>{{ $address->name }}</h6>
                                                        <p>{{ $address->address }}</p>
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                                @error('billing_address_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h5 class="font-600 mb-20 text-25">{{ _trans('landlord.Add New Address') }}</h5>
                                </div>
                                <div class="col-lg-6">
                                    <div class="ot-contact-form mb-24">
                                        <label class="ot-contact-label">{{ _trans('common.Name') }}</label>
                                        <input class="form-control ot-contact-input" value="{{ @old('name') }}"
                                               type="text" name="name" placeholder="{{ _trans('common.Name') }}">
                                        @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="ot-contact-form mb-24">
                                        <label class="ot-contact-label">{{ _trans('common.Phone') }}</label>
                                        <input class="form-control ot-contact-input" value="{{ @old('name') }}"
                                               type="text" name="phone"
                                               placeholder="{{ _trans('common.Phone') }}">
                                        @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="ot-contact-form mb-24">
                                        <label class="ot-contact-label">{{ _trans('common.Email') }}</label>
                                        <input class="form-control ot-contact-input" value="{{ @old('email') }}"
                                               type="email" name="email"
                                               placeholder="{{ _trans('common.Email') }}">
                                        @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="ot-contact-form">
                                        <label class="ot-contact-label">{{ _trans('common.Country') }}</label>
                                        <div class="ot-contact-form mb-24">
                                            <select class="select2 ot-input" name="country_id">
                                                @foreach($countries as $country)
                                                    <option value="">{{ _trans('common.Select One') }}</option>
                                                    <option
                                                        {{ @old('country_id') == $country->id ? 'seleted':'' }} value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('country_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="ot-contact-form mb-24">
                                        <label class="ot-contact-label">{{ _trans('landlord.Address') }}</label>
                                        <textarea class="ot-contact-textarea" name="address"
                                                  placeholder="{{ _trans('landlord.Address') }}" cols="3"
                                                  rows="2">{{ @old('address') }}</textarea>
                                        @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="form-group col-12 payment-gateway-wrapper">
                                <h5 class="font-600 mb-20">{{ _trans('landlord.Payment') }}</h5>

                                <div class="payment-gateway-list mb-20">
                                    <input type="radio" name="payment_method" checked value="cod" class="d-none"
                                           id="cod">
                                    <input type="radio" name="payment_method" value="bank" class="d-none" id="bank">

                                    <label for="cod" data-gateway="cod" class="single-gateway-item selected">
                                        <span
                                            class="font-500 text-16 text-capitalize text-primary">{{ _trans('landlord.Cash on Delivery (COD) ') }}</span>
                                    </label>
                                    <label for="bank" data-gateway="bank" class="single-gateway-item">
                                        <span
                                            class="font-500 text-16 text-capitalize text-primary">{{ _trans('landlord.bank payment') }}</span>
                                    </label>
                                </div>
                                <div class="col-lg-12 mb-20">
                                    <div class="check-wrap style-seven mb-10">
                                        <input id="2" type="checkbox" name="terms_and_condition" value="1">
                                        <label for="2">{{ _trans('landlord.I agree to all the') }} <a
                                                href="#">{{ _trans('landlord.Terms') }}</a> {{ _trans('landlord.and') }}
                                            <a href="#">{{ _trans('landlord.Privacy
                                                policy') }}</a>
                                        </label>

                                    </div>
                                    @error('terms_and_condition')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-5">
                        <div class="summary-card">
                            <div class="summary-heading">
                                <h4 class="title">{{ _trans('landlord.Order Summary') }}</h4>
                            </div>
                            <div class="summary-price-section">
                                <div class="summary-price original">
                                    <p class="pera">{{ _trans('landlord.Original Price') }}</p>
                                    <p class="pera">{{ priceFormat($subtotal) }}</p>
                                    <input type="hidden" name="subtotal" value="{{ $subtotal }}">
                                </div>
                                <div class="summary-price discount">
                                    <p class="pera">{{ _trans('landlord.Discounts') }}</p>
                                    <p class="pera">{{ $total_discount }}</p>
                                    <input type="hidden" name="discount_amount" value="{{ $total_discount }}">
                                </div>
                            </div>
                            <div class="final-price">
                                <p class="pera font-700">{{ _trans('landlord.Sub Total') }}</p>
                                <p class="pera">{{ priceFormat($subtotal) }}</p>
                            </div>
                            <div class="final-price">
                                <p class="pera font-700">{{ _trans('landlord.Total') }}</p>
                                <p class="pera">{{ priceFormat($subtotal - $total_discount) }}</p>
                                <input type="hidden" name="grand_total" value="{{ $subtotal - $total_discount }}">
                            </div>

                            <div class="checkout-btn d-grid mb-16">
                                <button type="submit"
                                        class="btn-primary-fill btn-block">{{ _trans('landlord.Complete Checkout') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- End-of checkout-->

@endsection
@push('script')
    <script>
        $(document).ready(function () {
            $('input[name="payment_method"]').change(function () {
                var selectedGatewayId = $(this).attr('id');

                $('.single-gateway-item').removeClass('selected');
                $('label[for="' + selectedGatewayId + '"]').addClass('selected');
            });
        });
    </script>
@endpush
