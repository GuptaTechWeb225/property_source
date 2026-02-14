@extends('marsland::layouts.customer')
@section('title', _trans('common.Dashboard'))

@section('customer-content')
     <div class="sidebar-content-wrap flex-fill ot-card white-bg border-0">

        <!-- Dashboard Card S t a r t -->
            @if(auth()->user()->role_id == 5 && (auth()->user()->address_verify == 1))
                <div class="dashboard-card mb-40">

                    <div class="row g-24">
                        <div class="col-xl-4 col-sm-6">
                            <div class="single-dashboard-card single-dashboard-card2  h-calc d-flex flex-wrap align-items-center gap-17">
                                <div class="icon">
                                    <i class="ri-shopping-cart-line"></i>
                                </div>
                                <div class="cat-caption">
                                    <p class="pera font-600">{{ _trans('common.Total Order') }}</p>
                                    <!-- Counter -->
                                    <div class="single-counter">
                                        <p class="amount">{{ number_format($data['order']) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-sm-6">
                            <div class="single-dashboard-card single-dashboard-card2  h-calc d-flex flex-wrap align-items-center gap-17">
                                <div class="icon">
                                    <i class="ri-heart-2-line"></i>
                                </div>
                                <div class="cat-caption">
                                    <p class="pera font-600">{{ _trans('common.My Wishlist') }}</p>
                                    <!-- Counter -->
                                    <div class="single-counter">
                                        <p class="amount">{{ number_format($data['wishlist']) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-sm-6">
                            <div class="single-dashboard-card single-dashboard-card2 h-calc d-flex flex-wrap align-items-center gap-17">
                                <div class="icon">
                                    <i class="ri-cup-line"></i>
                                </div>
                                <div class="cat-caption">
                                    <p class="pera font-600">{{ _trans('common.Purchase Amount') }}</p>
                                    <!-- Counter -->
                                    <div class="single-counter">
                                        <p class="amount">{{ priceFormat($data['total_amount']) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-sm-6">
                            <div class="single-dashboard-card single-dashboard-card2 h-calc d-flex flex-wrap align-items-center gap-17">
                                <div class="icon">
                                    <i class="ri-luggage-cart-line"></i>
                                </div>
                                <div class="cat-caption">
                                    <p class="pera font-600">{{ _trans('common.Product in Cart') }}</p>
                                    <!-- Counter -->
                                    <div class="single-counter">
                                        <p class="amount">{{ number_format($data['cart']) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-sm-6">
                            <div class="single-dashboard-card single-dashboard-card2 h-calc d-flex flex-wrap align-items-center gap-17">
                                <div class="icon">
                                    <i class="ri-git-repository-line"></i>
                                </div>
                                <div class="cat-caption">
                                    <p class="pera font-600">{{ _trans('common.Coupon Used') }}</p>
                                    <!-- Counter -->
                                    <div class="single-counter">
                                        <p class="amount">{{ number_format($data['coupon']) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-sm-6">
                            <div class="single-dashboard-card single-dashboard-card2  h-calc d-flex flex-wrap align-items-center gap-17">
                                <div class="icon">
                                    <i class="ri-government-line"></i>
                                </div>
                                <div class="cat-caption">
                                    <p class="pera font-600">{{ _trans('common.Completed Order') }}</p>
                                    <!-- Counter -->
                                    <div class="single-counter">
                                        <p class="amount">{{ number_format($data['complete_order']) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            @endif

        <!-- End-of card -->

        <!-- Purchase History Table S t a r t -->
        @if(auth()->user()->role_id == 5 && (auth()->user()->address_verify == 1))
        <section class="Purchase History mb-20">
            <div class="row">
                <div class="col-xl-12">
                    <div class="ot-cardd">

                        <div class="d-flex align-items-center justify-content-between flex-wrap mb-10">
                            <!-- Section Tittle -->
                            <div class="section-tittle-two pb-0">
                                <h5 class="title font-600 text-capitalize">{{ _trans('common.Purchase History') }}</h5>
                            </div>
                        </div>

                        <div class="data-show-table">
                            <table class="table-responsive">
                                <thead>
                                    <tr>
                                        <th>{{ _trans('common.Order NO') }} </th>
                                        <th>{{ _trans('common.Date') }} </th>
                                        <th>{{ _trans('common.Amount') }} </th>
                                        <th>{{ _trans('common.Discount') }} </th>
                                        <th>{{ _trans('common.Paid') }} </th>
                                        <th>{{ _trans('common.Due') }} </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data['order_history'] as $history)
                                        <tr>
                                            <td>{{ @$history->invoice_no }}</td>
                                            <td>{{ @$history->date }}</td>
                                            <td>{{ priceFormat(@$history->grand_total) }}</td>
                                            <td>{{ priceFormat(@$history->discount_amount) }}</td>
                                            <td>{{ priceFormat(@$history->paid_amount) }}</td>
                                            <td>{{ priceFormat(@$history->due_amount) }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7">
                                                <div class="d-flex justify-content-center p-3">
                                                    <p>{{ _trans("common.No data found") }}</p>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif
        <!-- End-of Purchase History Table -->

                        </div>
@endsection
