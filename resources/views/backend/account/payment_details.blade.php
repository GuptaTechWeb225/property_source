@extends('layouts.print_layout')
@section('title', @$title)

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
                            <b>{{ _trans('common.Date') }}</b>: {{ date('F d,Y', strtotime($payment->date)) }}
                        </h5>
                    </td>
                    <td class="text-end">
                        <h5 class="m-0 py-3">{{ _trans('common.Invoice No') }}: {{ $payment->invoice_no }}</h5>
                    </td>
                </tr>
            </table>
            <table class="table table-borderless">
                <tr class="">
                    <td class="text-end">
                        <div class="">
                            <strong class="text-color">{{ _trans('common.Invoiced From:') }}</strong><br>
                            <span>{{ setting('application_name') }}</span><br>
                            <span>{{ setting('phone_number') }}</span><br>
                            <span>{{ setting('email') }}</span><br>
                            <address>{{ setting('address') }}</address>
                        </div>
                    </td>
                </tr>
            </table>
            <table class="table table-borderless">
                <tr>
                    <td class="text-center">
                        <h2 class="text-color">{{ _trans('common.Transactions') }}</h2>
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
                    <th>{{ _trans('landlord.Date') }}</th>
                    <th>{{ _trans('landlord.Account') }}</th>
                    <th>{{ _trans('landlord.Type') }}</th>
                    <th>{{ _trans('landlord.Payment Method') }}</th>
                    <th>{{ _trans('landlord.Amount') }}</th>
                </tr>
                </thead>
                <tbody>
                @forelse($payment->transactions as $item)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $item->date }}</td>
                        <td>{{ @$item->account->name }}</td>
                        <td>{{ $item->type }}</td>
                        <td>{{ $item->payment_method }}</td>
                        <td>{{ priceFormat($item->amount) }}</td>
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
        <br>
        <div class="card-footer text-center bg-transparent border-0 d-flex align-items-center justify-content-between">
            <p class="m-0"><b>{{ _trans('common.Date') }}</b>: {{ date('F d,Y', time()) }}</p>
            <p class="m-0">{{ config('app.url') }}</p>
        </div>
        <br><br>
    </div>
@endsection
