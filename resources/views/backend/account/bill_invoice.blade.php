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
                        <h5 class="m-0 py-3">
                            <b>{{ _trans('common.Date') }}</b>: {{ date('F d,Y', strtotime($invoice->date)) }}
                        </h5>
                    </td>
                    <td class="text-end">
                        <h5 class="">{{ _trans('common.Month Of Bill') }} : {{ date('F Y', strtotime($invoice->month)) }}</h5>
                    </td>
                </tr>
            </table>
            <table class="table table-borderless">
                <tr class="">
                    <td class="text-start">
                        <div class="">
                            <strong class="text-color">{{ _trans('common.Bill To:') }}</strong><br>
                            <span>{{ $invoice->tenant->name }}</span><br>
                            <span>{{ $invoice->tenant->phone }}</span><br>
                            <span>{{ $invoice->tenant->email }}</span><br>
                            <address>{{ $invoice->tenant->address }}
                                , {{ $invoice->tenant->zip_code }}{{ @$invoice->tenant->country->name }}</address>
                        </div>
                    </td>
                    <td class="text-end">
                        <div class="">
                            <strong class="text-color">{{ _trans('common.Bill From:') }}</strong><br>
                            <span>{{ setting('application_name') }}</span><br>
                            <span>{{ setting('phone_number') }}</span><br>
                            <span>{{ setting('email') }}</span><br>
                            <address>{{ setting('address') }}
                                , {{ $invoice->tenant->zip_code }}{{ @$invoice->tenant->country->name }}</address>
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
                $subtotal = 0;
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
                @forelse($invoice->property->orderDetails as $item)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $item->property->name }}</td>
                        <td>{{ priceFormat($item->price) }}</td>
                        <td>{{ priceFormat($item->dicount_amount) }}</td>
                        <td class="text-end">{{ priceFormat($item->total_amount) }}</td>
                        @php $subtotal += $item->price @endphp
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
                    <th class="text-end">{{ _trans('common.Subtotal') }}</th>
                    <td>:</td>
                    <td class="text-end">{{ priceFormat($subtotal) }}</td>
                </tr>
                <tr>
                    <td></td>
                    <th class="text-end">{{ _trans('landlord.Fine Amount') }}</th>
                    <td>:</td>
                    <td class="text-end">{{ priceFormat($invoice->fine_amount) }}</td>
                </tr>
                <tr>
                    <td></td>
                    <th class="text-end">{{ _trans('landlord.Total Amount') }}</th>
                    <td>:</td>
                    <td class="text-end">{{ priceFormat($invoice->total_amount) }}</td>
                </tr>
            </table>
            <table class="table  table-borderless">
                <tr>
                    <td>
                        <h5 class="">{{ _trans('common.Payment Status') }} :
                            <span class="badge text-capitalize bg-{{ $invoice->payment_status == 'paid' ? 'success':($invoice->payment_status == 'unpaid' ? 'warning': 'danger') }}">{{ $invoice->payment_status }}</span>
                        </h5>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h5 class="">{{ _trans('common.Due Date') }} : {{ date('F d Y', strtotime($invoice->due_date)) }}</h5>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h5 class="text-color">{{ _trans('common.Thank You') }}</h5>
                    </td>
                </tr>
                <tr>
                    <td><b>{{ _trans('common.Notes') }}: </b>{{ setting('invoice_note') }}</td>
                </tr>
            </table>
        </div>
        <br>
        <div class="card-footer text-center bg-transparent border-0 d-flex align-items-center justify-content-between">
            <p class="m-0"><b>{{ _trans('common.Date') }}</b>: {{ date('F d,Y', time()) }}</p>
            <p class="m-0">{{ config('app.url') }}</p>
        </div>
        <br><br>
    </div>
@endsection
