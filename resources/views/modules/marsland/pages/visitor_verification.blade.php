@extends('marsland::layouts.master')
@section('title', _trans('About Us'))
@section('marsland-content')
    <!-- Breadcrumb Area S t a r t-->
    <section class="ot-breadcrumb-area breadcrumb-gradient">
        <div class="container">
            <div class="ot-breadcrumb-inner">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="ot-breadcrumb-inner-wrapper text-center">
                            <div class="breadcrumb-text">
                                <h3 class="title font-700">{{ _trans('landlord.Properties') }}</h3>
                                <div class="line-dro mt-20">
                                    <span class="line-left diamond-square-shape"></span>
                                    <span class="line-circle"></span>
                                    <span class="line-right diamond-square-shape2"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Product S t a r t-->
    <div class="ot-sidebar-overlay"></div>
    <section class="ot-filter-course section-padding3  section-bg-two">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 position-relative">
                    <div class="row g-24 justify-content-center">
                        <div class="col-lg-5">
                            <div class="card card-body border-0 shadow-sm bg-white p-5">
                                <form action="{{ route('verifyVisitorProcess') }}" class="py-5" method="post">
                                    @csrf
                                    <div class="text-center mb-4">
                                        <h3>Verify</h3>
                                        <p>Enter your one-time password</p>
                                    </div>
                                    <input type="hidden" name="tenant_id" value="{{ $tenant_id }}">
                                    <div class="row ot-contact-form mb-3">
                                        <div class="col">
                                            <input class="form-control ot-contact-input text-center" name="otp_code" type="number" >
                                            @error('otp_code')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 text-end">
                                            <a href="" type="submit">{{ _trans('Common.Resend') }}</a>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-lg-4">
                                            <button class="btn btn-primary my-3" type="submit">{{ _trans('Common.Verified Now') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
