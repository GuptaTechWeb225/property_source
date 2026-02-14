@extends('layouts.marsland')

@section('content')

    <main>
        <!-- login area S t a r t  -->
        <div class="ot-login-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-8 col-sm-10">
                        <div class="ot-login-card">
                            <!-- <div class="logo logo-large dark-logo mb-40">
                                <a href="{{ route('home') }}">
                                    <img src="{{ @globalAsset(setting('light_logo')) }}" alt="logo">
                                </a>
                            </div>
                            <div class="logo logo-large  light-logo mb-40">
                                <a href="{{ route('home') }}">
                                    <img src="{{ @globalAsset(setting('dark_logo')) }}" alt="logo">
                                </a>
                            </div> -->
                              <!-- dark Logo ( dark-mode )-->
                               <div class="logo logo-large dark-logo mb-40">
                                        <a href="{{ route('home') }}">
                                            <img src="{{ @globalAsset(setting('dark_logo')) }}" alt="logo">
                                        </a>
                                    </div>
                                    <!-- White Logo ( light-mode )-->
                                    <div class="logo logo-large  light-logo mb-40">
                                        <a href="{{ route('home') }}">
                                            <img src="{{ @globalAsset(setting('light_logo')) }}" alt="logo">
                                        </a>
                                    </div>

                            <form action="{{ route('forgot.password') }}" method="POST">
                                @csrf

                                <div class="position-relative ot-contact-form mb-24">
                                    <label class="ot-contact-label">{{ _trans('common.Email Address') }} <span class="text-white">*</span></label>
                                    <input class="form-control ot-contact-input" name="email" type="text" placeholder="{{ _trans('common.Enter Email') }}" aria-label="default input example" required="">
                                </div>
                                <button class="btn-primary-submit w-100" name="submit" type="submit">{{ _trans('common.Reset') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End-of Login -->
    </main>

@endsection
