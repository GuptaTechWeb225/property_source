@extends('layouts.print_layout')
@section('title', 'Income Invoice')

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
                            <b>{{ _trans('common.Date') }}</b>: {{ date('F d,Y', strtotime($invoice->date)) }}
                        </h4>
                    </td>
                    <td class="text-end">
                        <h4 class="m-0 py-3">{{ _trans('common.Invoice No') }}: {{ $invoice->invoice_no }}</h4>
                    </td>
                </tr>
            </table>
            <table class="table table-borderless">
                <tr class="">
                    <td class="text-start">
                        <div class="">
                            <strong class="text-color">{{ _trans('common.Expense To:') }}</strong><br>
                            <span>{{ @$invoice->account->user->name }}</span><br>
                            <span>{{ $invoice->account->user->phone }}</span><br>
                            <span>{{ $invoice->account->user->email }}</span><br>
                            <address>{{ $invoice->account->user->address }}
                                , {{ $invoice->account->user->zip_code }}{{ @$invoice->account->user->country->name }}</address>
                        </div>
                    </td>
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
                        <h2 class="text-color">{{ _trans('common.Income') }}</h2>
                    </td>
                </tr>
            </table>
            @php
                $paid_amount = 0;
            @endphp
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>{{ _trans('common.SR No.') }}</th>
                    <th>{{ _trans('common.Account') }}</th>
                    <th>{{ _trans('common.Category') }}</th>
                    <th>{{ _trans('common.Reference') }}</th>
                    <th>{{ _trans('common.Amount') }}</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>{{ $invoice->account->name }}</td>
                        <td>{{ $invoice->category->name }}</td>
                        <td>{{ $invoice->reference }}</td>
                        <td>{{ $invoice->amount }}</td>
                    </tr>
                </tbody>
            </table>
            <table class="table  table-borderless">
                <tr>
                    <td><b>{{ _trans('common.-Payment Method') }}</b> : {{ @$invoice->transaction->payment_method }}</td>
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
            <p class="m-0"><b>{{ _trans('common.Created By') }}</b>: {{ @$invoice->createdby->name }}</p>
            <p class="m-0">{{ config('app.url') }}</p>
        </div>
        <br><br>
    </div>
@endsection
