@extends('marsland::layouts.master')
@section('title', _trans('About Us'))
@section('marsland-content')
    <!-- Breadcrumb Area S t a r t-->
    <section class="ot-breadcrumb-area breadcrumb-gradient">
        <div class="container">
            <div class="ot-breadcrumb-inner">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="ot-breadcrumb-inner-wrapper text-center">
                            <div class="breadcrumb-text">
                                <h3 class="title font-700">{{ _trans('landlord.cart page') }}</h3>
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
    @php
        $subtotal = 0;
        $total_discount = 0;
        $total = 0;
    @endphp
        <!-- shopping-cart S t a r t-->
    <div class="shoping-cart-area pt-40 bottom-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="shoping-cart-heading mb-30">
                        <h5 class="title fs-6 font-500 text-title">{{ count($carts) }} {{ _trans('landlord.Property in cart') }}</h5>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between ">
                <div class="col-xl-8 col-lg-8">
                    <div class="shoping-cart-wrapper mb-24">

                        @forelse($carts as $cart)
                            <div class="shoping-cart-widget d-flex align-items-center">
                                <div class="thumb">
                                    <a href="javascript:">
                                        <img src="{{ globalAsset(@$cart->property->defaultImage->path) }}"
                                             class="img-cover" alt="img">
                                    </a>
                                </div>
                                <div class="d-flex flex-fill align-items-start  gap-4 shoping-cart-widget-info ">
                                    <div class="shoping-cart-info flex-fill">
                                        <a href="javascript:">
                                            <h4 class="title colorEffect  font-600 line-clamp-1">{{ @$cart->property->name }}</h4>
                                        </a>
                                        <h5 class="author-name mb-10">{{ @$cart->property->size }}{{ _trans('landlord.sqft') }}</h5>
                                        <div class="others-info w-100">
                                            <h5 class="updated-date text-16 font-500 text-gray text-capitalize">{{ $cart->start_date }}
                                                -
                                                {{ $cart->end_date }}</h5>
                                        </div>
                                    </div>
                                    @php
                                        $discount_amount = calculatePercentage(@$cart->property->discount_type,@$cart->property->discount_amount,$cart->amount);
                                        $total_discount += $discount_amount;
                                        $subtotal += $cart->amount;
                                        $total += $cart->amount - $discount_amount;
                                    @endphp
                                    <div
                                        class="shoping-wized-prise d-flex flex-column justify-content-end align-items-end">
                                        <button type="button" class="btn btn-link text-decoration-none text-danger"
                                                onclick="removeCartItem('{{ $cart->id }}')"><i
                                                class="ri-close-line"></i></button>
                                        <span class="price">{{ priceFormat($cart->amount) }}</span>
                                        <span class="discount">{{ priceFormat($discount_amount) }}</span>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <h4 class="mb-5">{{ _trans('landlord.Your cart is empty') }}</h4>
                            <a href="{{ route('properties') }}" class="btn btn-primary">
                                {{ _trans('landlord.Buy Property') }}
                            </a>
                        @endforelse
                    </div>
                </div>
                @if(count($carts) > 0)
                    <div class="col-xl-4 col-lg-4">
                        <div class="paymentDetails ot-card white-bg box-shadow border-0 mb-24">
                            <div class="d-flex justify-content-between mb-20">
                                <h4 class="priceTittle mb-30">{{ _trans('landlord.Billing Summary') }}</h4>
                            </div>
                            <div class="priceListing mb-30">
                                <ul class="listing mb-10">
                                    <li class="listItem"><p class="leftCap">{{ _trans('landlord.sub Total') }}</p>
                                        <p class="rightCap text-title font-700">{{ priceFormat($subtotal) }}</p></li>
                                    <li class="listItem"><p
                                            class="leftCap rightCap">{{ _trans('landlord.Discount') }} </p>
                                        <p class="rightCap text-title font-700">{{ priceFormat($total_discount) }}</p>
                                    </li>
                                    <li class="listItem"><p class="leftCap rightCap">{{ _trans('landlord.Vat') }} </p>
                                        <p class="rightCap text-title font-700">{{ priceFormat(0) }}</p></li>
                                    <li class="listItem"><p class="leftCap rightCap">{{ _trans('landlord.Total') }}</p>
                                        <p class="rightCap text-title font-700">{{ priceFormat($total) }}</p></li>
                                </ul>

                                <div class="info d-flex justify-content-between align-items-center gap-10">
                                    <p class="pera">{{ _trans('landlord.Your savings on this order') }}</p>
                                    <span class="pera">{{ priceFormat($total_discount) }}</span>
                                </div>
                            </div>
                            <a href="{{ route('cart.checkout') }}" class="btn-primary-fill w-100">{{ _trans('landlord.Checkout') }}</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- End-of shopping-cart-->
@endsection
@push('script')
    <script>
        const removeCartItem = (id) => {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    let url = '{{ url('cart/remove-from-cart') }}/' + id
                    $.ajax({
                        url: url,
                        type: 'GET',
                        success: function (response) {
                            Swal.fire({
                                title: "Deleted!",
                                text: "Your file has been deleted.",
                                icon: "success"
                            }).then(() => {
                                window.location.reload();
                            });
                        },
                        error: function (error) {
                            Swal.fire({
                                title: "Error",
                                text: "Something went wrong!",
                                icon: "error"
                            });
                        }
                    });
                }
            });
        }
    </script>
@endpush
