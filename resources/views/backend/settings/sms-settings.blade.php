@extends('backend.master')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <x-container title="{{ $title }}" :breadcrumbs="[['title' => 'Settings'], ['title' => $title]]">
        <div class="table-content table-basic mt-20">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">{{ _trans('common.SMS Settings') }}</h4>
                </div>
                <div class="card-body ot-card">
                    <div class="row">
                        <div class="col-lg-7">
                            <form action="{{ route('settings.sms-setting') }}" method="Post" class="row">
                                @csrf
                                <x-forms.input name="twilio_sid" value="{{ setting('twilio_sid') }}"
                                    label="Twilio Account SID" col="col-lg-12 mb-3"></x-forms.input>
                                <x-forms.input name="twilio_auth_token" value="{{ setting('twilio_auth_token') }}"
                                    label="Authentication Token" col="col-lg-12 mb-3"></x-forms.input>
                                <x-forms.input name="twilio_registered_phone"
                                    value="{{ setting('twilio_registered_phone') }}" label="Registered Phone Number"
                                    col="col-lg-12 mb-3"></x-forms.input>
                                <x-forms.input name="twilio_whatsapp_number_from"
                                    value="{{ setting('twilio_whatsapp_number_from') }}" label="Twilio Whatsapp number from"
                                    col="col-lg-12 mb-3"></x-forms.input>
                                <x-forms.input name="twilio_whatsapp_number_to"
                                    value="{{ setting('twilio_whatsapp_number_to') }}" label="Twilio Whatsapp number to"
                                    col="col-lg-12 mb-3"></x-forms.input>
                                <x-forms.input name="default_reply_for_request"
                                    value="{{ empty(setting('default_reply_for_request')) ? 'Thank you for contacting ARVIPOA, we will get in process your request and deliver at the agreed time.' : setting('default_reply_for_request') }}"
                                    label="Default reply for request" col="col-lg-12 mb-3"></x-forms.input>
                                    <x-forms.input name="otp_request_default_content_start"
                                        value="{{ empty(setting('otp_request_default_content_start')) ? 'Your otp is' : setting('otp_request_default_content_start') }}"
                                        label="OTP request default content" col="col-lg-12"></x-forms.input>
                                    <span class="my-2">{otp}</span>
                                    <x-forms.input name="otp_request_default_content_end"
                                        value="{{ empty(setting('otp_request_default_content_end')) ? '- ARVIPOA' : setting('otp_request_default_content_end') }}"
                                        placeholder="End" col="col-lg-12"></x-forms.input>
                                <x-button></x-button>
                            </form>
                        </div>

                        {{-- <div class="col-lg-5 text-center">
                            <a href="https://www.twilio.com/en-us?v=t">
                                <img src="{{ asset('backend/images/twilio.png') }}" alt="">
                                <p>https://www.twilio.com/en-us?v=t</p>
                            </a>

                            <br><br><br><br>
                            <a href="{{ route('message-sender') }}"
                                class="btn btn-info">{{ _trans('landlord.Send SMS') }}</a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </x-container>
@endsection
