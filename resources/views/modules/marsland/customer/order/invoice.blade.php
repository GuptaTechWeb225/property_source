@extends('layouts.print_layout')
@section('title', 'Order Invoice')

@section('print-content')
    <div id="invoice" class="card bg-white border-0">
        <div class="card-body">
            <table class="table table-borderless">
                <tr>
                    <td class="text-start">
                        <div class="company-logo">
                            <img
                                src="{{ userTheme() == 'default-theme' ? @globalAsset(setting('light_logo'), '154x38.png') : @globalAsset(setting('dark_logo'), '154x38.png') }}"
                                alt=""/>
                        </div>
                    </td>
                    <td class="text-end">
                        <h1 class="m-0 text-uppercase text-color">{{ _trans('common.Invoice') }}</h1>
                    </td>
                </tr>
            </table>
            <table class="table table-borderless border-top border-bottom ">
                <tr class="">
                    <td class="text-start">
                        <h4 class="m-0 py-3">
                            <b>{{ _trans('common.Date') }}</b>: {{ date('F d,Y', strtotime($order->date)) }}
                        </h4>
                    </td>
                    <td class="text-end">
                        <h4 class="m-0 py-3">{{ _trans('common.Invoice No') }}: {{ $order->invoice_no }}</h4>
                    </td>
                </tr>
            </table>
            <table class="table table-borderless">
                <tr class="">
                    <td class="text-start">
                        <div class="">
                            <strong class="text-color">{{ _trans('common.Invoiced To:') }}</strong><br>
                            <span>{{ $order->tenant->name }}</span><br>
                            <span>{{ $order->tenant->phone }}</span><br>
                            <span>{{ $order->tenant->email }}</span><br>
                            <address>{{ $order->tenant->address }}
                                , {{ $order->tenant->zip_code }}{{ @$order->tenant->country->name }}</address>
                        </div>
                    </td>
                    <td class="text-end">
                        <div class="">
                            <strong class="text-color">{{ _trans('common.Invoiced From:') }}</strong><br>
                            <span>{{ setting('application_name') }}</span><br>
                            <span>{{ setting('phone_number') }}</span><br>
                            <span>{{ setting('email') }}</span><br>
                            <address>{{ setting('address') }}
                                , {{ $order->tenant->zip_code }}{{ @$order->tenant->country->name }}</address>
                        </div>
                    </td>
                </tr>
            </table>
            <table class="table table-borderless">
                <tr>
                    <td class="text-center">
                        <h2 class="text-color">{{ _trans('common.Propeties') }}</h2>
                    </td>
                </tr>
            </table>
            @php
                $paid_amount = 0;
            @endphp
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>{{ _trans('landlord.SR No.') }}</th>
                    <th>{{ _trans('landlord.Property') }}</th>
                    <th>{{ _trans('landlord.Price') }}</th>
                    <th>{{ _trans('landlord.Discount') }}</th>
                    <th class="text-end">{{ _trans('landlord.Total Amount') }}</th>
                </tr>
                </thead>
                <tbody>
                @forelse($order->orderDetails as $item)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $item->property->name }}</td>
                        <td>{{ priceFormat($item->price) }}</td>
                        <td>{{ priceFormat($item->dicount_amount) }}</td>
                        <td class="text-end">{{ priceFormat($item->total_amount) }}</td>
                        @php
                            $paid_amount += $item->payments->sum('amount');
                        @endphp
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">
                            <h4 class="py-5">{{ _trans('common.No Data Available!') }}</h4>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>

            <table class="table table-borderless estimate">
                <tr>
                    <td></td>
                    <th class="text-end">{{ _trans('landlord.Subtotal') }}</th>
                    <td>:</td>
                    <td class="text-end">{{ priceFormat($order->subtotal ) }}</td>
                </tr>
                <tr>
                    <td></td>
                    <th class="text-end">{{ _trans('landlord.Total Discount') }}</th>
                    <td>:</td>
                    <td class="text-end">{{ priceFormat($order->discount_amount ) }}</td>
                </tr>
                <tr>
                    <td></td>
                    <th class="text-end">{{ _trans('landlord.Total Amount') }}</th>
                    <td>:</td>
                    <td class="text-end">{{ priceFormat($order->grand_total ) }}</td>
                </tr>
                <tr>
                    <td></td>
                    <th class="text-end">{{ _trans('landlord.Paid Amount') }}</th>
                    <td>:</td>
                    <td class="text-end">{{ priceFormat($paid_amount) }}</td>
                </tr>
                <tr>
                    <td></td>
                    <th class="text-end">{{ _trans('landlord.Due Amount') }}</th>
                    <td>:</td>
                    <td class="text-end">{{ priceFormat($order->grand_total - $paid_amount) }}</td>
                </tr>
            </table>
            <table class="table  table-borderless">
                <tr>
                    <td>
                        <h5 class="text-color">{{ _trans('common.Thank You') }}</h5>
                    </td>
                </tr>
                <tr>
                    <td><b>{{ _trans('common.Notes') }}: </b>{{ Setting('invoice_note') }}</td>
                </tr>
            </table>
        </div>
        <div class="card-footer text-center bg-transparent border-0 d-flex align-items-center justify-content-between">
            <p class="m-0"><b>{{ _trans('common.Date') }}</b>: {{ date('F d,Y', time()) }}</p>
            <p class="m-0">{{ config('app.url') }}</p>
        </div>
    </div>
@endsection
