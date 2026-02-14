@extends('marsland::layouts.customer')
@section('title', _trans('common.Orders'))

@section('customer-content')
    <div class="sidebar-content-wrap flex-fill ot-card white-bg border-0">
        <!-- My Orders S t a r t -->
        <section class="my-orders">
            <div class="row">
                <div class="col-xl-12">

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
                                    <th class="text-capitalize">{{ _trans('common.Order Number') }} </th>
                                    <th class="text-capitalize">{{ _trans('common.Date') }} </th>
                                    <th class="text-capitalize">{{ _trans('common.Amount') }} </th>
                                    <th class="text-capitalize">{{ _trans('common.Discount') }} </th>
                                    <th class="text-capitalize">{{ _trans('common.Paid') }} </th>
                                    <th class="text-capitalize">{{ _trans('common.Due') }} </th>
                                    <th class="text-capitalize">{{ _trans('common.Action') }} </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders as $order)
                                    <tr>
                                        <td>{{ $order->invoice_no }}</td>
                                        <td>{{ $order->date }}</td>
                                        <td>{{ priceFormat($order->grand_total) }}</td>
                                        <td>{{ priceFormat($order->discount_amount) }}</td>
                                        <td>{{ priceFormat($order->paid_amount) }}</td>
                                        <td>{{ priceFormat($order->due_amount) }}</td>
                                        <td>
                                            <a href="{{ route('customer.property.details', $order->id) }}" class="btn btn-primary btn-sm btn-rounded" title="{{ _trans('common.View Details') }}">
                                                <i class="ri-eye-line"></i>
                                            </a>
                                            <a href="{{ route('customer.order_invoice', $order->id) }}" class="btn btn-dark btn-sm btn-rounded" title="{{ _trans('common.Invoice') }}">
                                                <i class="ri-printer-line"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">
                                            <div class="d-flex justify-content-center p-3">
                                                <p>{{ _trans("common.No data found") }}</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {!! $orders->links() !!}
                    </div>
                </div>
            </div>
        </section>
        <!-- End-of My Orders -->
    </div>
@endsection
