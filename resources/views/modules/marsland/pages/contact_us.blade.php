@extends('marsland::layouts.master')
@section('title', _trans('Contact us'))
@section('marsland-content')
    <!-- Breadcrumb Area S t a r t-->
    <section class="ot-breadcrumb-area breadcrumb-gradient">
        <div class="container">
            <div class="ot-breadcrumb-inner">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="ot-breadcrumb-inner-wrapper text-center">
                            <div class="breadcrumb-text">
                                <h3 class="title font-700">{{ _trans('common.contact') }}</h3>
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
    <!-- End-of Breadcrumb-->

    <!-- Get-in touch S t a r t-->
    <section class="ot-courses-area section-padding3 section-bg-two border-top">
        <div class="container">
            <div class="white-bg contact-padding radius-8">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="mb-40">
                            <h2 class="text-capitalize font-700 text-title">{{ _trans('landlord.Send a message to get your free quote ') }}</h2>
                            <p class="pera text-16">Lorem ipsum dolor sit amet consectetur. Est commodo pharetra ac netus enim a eget. Tristique malesuada donec condimentum mi quis porttitor non vitae ultrices.</p>
                        </div>

                        <div class="row">
                            <div class="col-xl-8 col-lg-6">
                                <div class="d-flex align-items-center p-3 section-bg-two mb-32 radius-4">
                                    <div class="contact-icon radius-4 white-bg mr-24">
                                        <i class="ri-mail-fill"></i>
                                    </div>
                                    <div class="contact-info ">
                                        <h5 class="text-18 font-600 mb-6">{{ _trans('common.Email Address') }}</h5>
                                        <p class="text-16 font-400 m-0">{{ setting('email') }}</p>
                                    </div>
                                </div>
                                <div class="d-flex p-3 section-bg-two  mb-32 radius-4">
                                    <div class="contact-icon radius-4 white-bg mr-24">
                                        <i class="ri-map-pin-line"></i>
                                    </div>
                                    <div class="contact-info ">

                                        <p class="text-16 font-400 m-0">{{ setting('address') }}</p>
                                    </div>
                                </div>
                                <div class="d-flex p-3 section-bg-two  mb-32 radius-4">
                                    <div class="contact-icon radius-4 white-bg mr-24">
                                        <i class="ri-phone-fill"></i>
                                    </div>
                                    <div class="contact-info ">
                                        <h5 class="text-18 font-600 mb-6">{{ _trans('common.phone number') }}</h5>
                                        <p class="text-16 font-400 m-0">{{ setting('phone_number') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="from-wraps section-bg-two p-5 radius-6">
                            <form action="{{ route('contact_store') }}" method="post">
                                @csrf
                                <div class="ot-contact-form">
                                    <div class="ot-contact-form">
                                        <label  class="ot-contact-label">{{ _trans('landlord.What Are You looking for') }}?</label>
                                        <div class="ot-contact-form mb-24">
                                            <select class="select2 ot-input" name="reason">
                                                <option value="Support">{{ _trans('landlord.Support')}}</option>
                                                <option value="Issue">{{ _trans('landlord.Issue')}}</option>
                                                <option value="Query">{{ _trans('landlord.Query')}}</option>
                                                <option value="Others">{{ _trans('landlord.Others')}}</option>
                                            </select>
                                            @error('reason')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="position-relative ot-contact-form mb-15 row">
                                    <div class="col-lg-6">
                                        <label class="ot-contact-label">{{ _trans('common.First name') }}</label>
                                        <input class="form-control ot-contact-input" name="f_name" type="text" placeholder="{{ _trans('landlord.Enter here') }}" >
                                        @error('f_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6">
                                        <label class="ot-contact-label">{{ _trans('common.Last name') }}</label>
                                        <input class="form-control ot-contact-input" name="l_name" type="text" placeholder="{{ _trans('landlord.Enter here') }}" >
                                        @error('l_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="position-relative ot-contact-form mb-15">
                                    <label class="ot-contact-label">{{ _trans('common.Email Address') }}</label>
                                    <input class="form-control ot-contact-input" name="email" type="text" placeholder="{{ _trans('common.Ex. jone@example.com') }}" >
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="position-relative ot-contact-form mb-15 row">
                                    <div class="col-lg-6">
                                        <label class="ot-contact-label">{{ _trans('common.Phone') }}</label>
                                        <input class="form-control ot-contact-input" name="phone_number" type="text" placeholder="{{ _trans('landlord.Enter here') }}" >
                                        @error('phone_number')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6">
                                        <label class="ot-contact-label">{{ _trans('common.Order Number') }} ({{ _trans('common.optional') }})</label>
                                        <input class="form-control ot-contact-input" name="order_no" type="number" placeholder="{{ _trans('landlord.Enter here') }}" >
                                        @error('order_no')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="position-relative ot-contact-form mb-15">
                                    <label class="ot-contact-label">{{ _trans('common.Message') }}</label>
                                    <textarea class="ot-contact-textarea" name="message" placeholder="{{ _trans('landlord.Enter here') }}" cols="3" rows="3"></textarea>
                                    @error('message')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button class="btn-primary-fill" type="submit">{{ _trans('common.Submit') }} <i class="ri-arrow-right-line"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End-of get-in touch-->
@endsection
