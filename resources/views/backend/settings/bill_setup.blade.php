@extends('backend.master')
@section('title')
    {{ @$title }}
@endsection
@section('content')
    <x-container title="{{ @$title }}" :breadcrumbs="[['title' => 'Settings'],['title' => @$title]]">
        <div class="table-content table-basic mt-20">
            <div class="row">
                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">{{ _trans('common.Bill Setup Settings') }}</h4>
                        </div>
                        <div class="card-body ot-card">
                            <div class="col-lg-12">
                                <form action="{{ route('settings.billsetup') }}" method="post" class="row">
                                    @csrf
                                    <x-forms.input
                                        col="col-lg-12"
                                        inputsInline
                                        type="number"
                                        label="Last Payment Day"
                                        name="last_payment_day"
                                        value="{{ Setting('last_payment_day') }}">
                                    </x-forms.input>
                                    <x-forms.input
                                        col="col-lg-12"
                                        inputsInline
                                        min="1" max="100"
                                        type="number"
                                        label="Fine Percentage (%)"
                                        name="fine_percentage"
                                        value="{{ Setting('fine_percentage') }}">
                                    </x-forms.input>
                                    <x-forms.input
                                        col="col-lg-12"
                                        inputsInline
                                        type="number"
                                        label="Payment Due Alert Day"
                                        name="payment_due_alert_day"
                                        value="{{ Setting('payment_due_alert_day') }}">
                                    </x-forms.input>

                                    <x-button title="Update"></x-button>
                                </form>
                            </div>


                        </div>
                    </div>
                </div>


                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">{{ _trans('common.Month Rent Expiration Notification Setup') }}</h4>
                        </div>
                        <div class="card-body ot-card">
                            <div class="col-lg-12">
                                <form action="{{ route('settings.billCronSetup') }}" method="post" class="row">
                                    @csrf

                                    <p> Shortcodes : <code>[name] , [expire_date] , [due_amount] , [fine] , [property_name]</code></p>
                                    <x-forms.textarea
                                        col="col-lg-12"
                                        inputsInline
                                        label="SMS Content"
                                        name="sms_body_content"
                                        value="{{ Setting('sms_body_content') }}">
                                    </x-forms.textarea>

                                    <p> Cron Job Command : <b><code>{{base_path()}} rent:notice >> /dev/null 2>&1</code></b></p>

                                    <p class="text-danger"><b>For successfully run cron job task you must setup Bill Setup Setting</b></p>

                                    <x-button title="Update"></x-button>
                                </form>
                            </div>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </x-container>
@endsection
