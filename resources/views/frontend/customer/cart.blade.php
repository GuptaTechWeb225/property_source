@extends('frontend.layouts.master')

@section('content')
    <!-- checkout_v3_area::start  -->
    <div class="pt-5 pb-5 container">

        @if ($data['carts']->count() > 0)

            <div class="table-responsive mb-0">
                <table class="table o_landy_table3 style4 mb-0 table-scrollable">
                    <thead>
                    <tr>
                        <th class="font_14 f_w_700 m-0 text-nowrap priamry_text">
                            {{ _trans('landlord.Products') }}
                        </th>
                        <th class="font_14 f_w_700 m-0 text-nowrap priamry_text">
                            {{ _trans('landlord.Price') }}
                        </th>
                        <th class="font_14 f_w_700 m-0 text-nowrap priamry_text">
                            {{ _trans('landlord.Duration') }}
                        </th>
                        <th class="font_14 f_w_700 m-0 text-nowrap priamry_text">
                            {{ _trans('landlord.Discount') }}
                        </th>
                        <th class="font_14 f_w_700 m-0 text-nowrap priamry_text">
                            {{ _trans('landlord.Total') }}
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($data['carts'] as $cart)
                        <tr>
                            <td>
                                <a href="{{ route('properties.details', ['slug' => $cart->property->slug, 'advertise_id' => $cart->advertisement_id]) }}"
                                   class="d-flex align-items-center gap_20">
                                    <img height="50" width="50"
                                         src="{{ @globalAsset($cart->property->defaultImage->path) }}" alt="dfdf">
                                    <div class="summery_pro_content">
                                        <h4 class="font_16 f_w_700 m-0 theme_hover">
                                            {{ @$cart->property->name }}</h4>
                                        <p class="font_14 f_w_400 m-0 ">{{ @$cart->property->size }}
                                            {{ _trans('landlord.sqft') }}</p>
                                    </div>
                                </a>
                            </td>

                            <td>
                                <h4 class="font_16 f_w_500 m-0 text-nowrap rent-amount"
                                    id="rent-amount-{{ $cart->id }}">
                                    {{ priceFormat($cart->amount) }}
                                </h4>
                            </td>
                            <td>
                                <div class="lag_select">
                                    @if($cart->type == 'buy')
                                        {{  @$cart->start_date }}
                                    @else
                                        {{  @$cart->start_date }} -  {{  @$cart->end_date }}
                                    @endif
                                </div>
                            </td>
                            <td>
                                {{ priceFormat($cart->discount_amount) }}
                            </td>
                            <td>
                                <div class="m-0 d-flex gap_10 align-items-center">
                                    <h4 class="font_16 f_w_500 m-0 text-nowrap total-amount"
                                        id="total-amount-{{ $cart->id }}">
                                        {{ priceFormat($cart->amount - $cart->discount_amount) }}</h4>
                                    <a class="pe-auto cart-delete" data-id="{{ @$cart->id }}">

                                        <span class="text-danger"><i class="far fa-trash-alt"></i></span>
                                    </a>
                                </div>
                            </td>

                        </tr>

                    @empty
                        <p>{{ _trans('landlord.No property found') }}</p>
                    @endforelse
                    </tbody>
                </table>
                <table class="table o_landy_table3 style4 mb-0">
                    <tbody>
                    <tr>
                        <td colspan="4">
                            <div class="m-0 d-flex justify-content-end gap_10 align-items-center">
                                <h4>
                                    {{ _trans('landlord.Sub Total') }}
                                    <span id="updated-amount"> {{ priceFormat($cart->amount - $cart->discount_amount) }}</span>
                                </h4>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="d-flex gap_10 align-items-center flex-wrap mt_20">
                <div class="d-flex align-items-center gap_10 flex-fill flex-wrap">
                    <a href="{{ route('properties') }}"
                       class="o_land_primary_btn2 style3">{{ _trans('landlord.Add Another Property') }}</a>
                </div>
                <a href="{{ route('customer.checkout') }}"
                   class="o_land_primary_btn min_200 style2" id="CheckoutBtn">{{ _trans('landlord.Checkout') }}</a>
            </div>

        @else
            <div class="d-flex justify-content-center">
                <p>No Property Found</p>
            </div>
        @endif
    </div>
    <!-- checkout_v3_area::end  -->
@endsection

@section('script')
    <script>
        $(function () {
            $('input[name="daterange"]').daterangepicker({
                autoUpdateInput: false
            });
        });
        $('input[name="daterange"]').on('apply.daterangepicker', function (ev, picker) {
            $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
        });
    </script>
    @include('frontend.customer.cart_script')
@endsection
