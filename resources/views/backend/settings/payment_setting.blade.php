@extends('backend.master')

@section('title')
    {{ @$data['title'] }}
@endsection
@section('content')
    <div class="page-content">
        {{-- bradecrumb Area S t a r t --}}
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="bradecrumb-title mb-1">{{ $data['title'] }}</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                    href="{{ route('dashboard') }}">{{ _trans('common.home') }}</a>
                            </li>
                            <li class="breadcrumb-item">{{ $data['title'] }}</li>
                        </ol>
                </div>
            </div>
        </div>
        {{-- bradecrumb Area E n d --}}
        <div class="row">
            <div class="col-lg-6 mb-3">
                <div class="card ot-card">
                    <div class="card-header">
                        <h4>{{ _trans('settings.Paypal Setting') }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('settings.paypal-payment-setting') }}" enctype="multipart/form-data" method="post" id="visitForm">
                            @csrf
                            <x-forms.input
                                :required="true"
                                col="col-lg-12"
                                inputsInline
                                label="PAYPAL_CLIENT_ID"
                                name="PAYPAL_CLIENT_ID"
                                value="{{ setting('PAYPAL_CLIENT_ID') }}">
                            </x-forms.input>

                            <x-forms.input
                                :required="true"
                                col="col-lg-12"
                                inputsInline
                                label="PAYPAL_SECRET"
                                name="PAYPAL_SECRET"
                                value="{{ setting('PAYPAL_SECRET') }}">
                            </x-forms.input>
                            <x-forms.input
                                :required="true"
                                col="col-lg-12"
                                inputsInline
                                label="PAYPAL_APP_ID"
                                name="PAYPAL_APP_ID"
                                value="{{ setting('PAYPAL_APP_ID') }}">
                            </x-forms.input>
                            <x-forms.select
                                :required="true"
                                col="col-lg-12"
                                inputsInline
                                label="PAYPAL_MODE"
                                name="PAYPAL_MODE"
                                value="{{ setting('PAYPAL_MODE') }}">
                                <option {{ setting('PAYPAL_MODE') == 'live' ? 'selected':'' }} value="live">{{ _trans('common.live') }}</option>
                                <option {{ setting('PAYPAL_MODE') == 'sandbox' ? 'selected':'' }} value="sandbox">{{ _trans('common.sandbox') }}</option>
                            </x-forms.select>
                            <x-button title="Update"></x-button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
