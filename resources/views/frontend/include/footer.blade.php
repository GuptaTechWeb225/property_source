<div class="landlorad_cta">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <a class="cta_btn d-block" href="javascript:" data-bs-toggle="modal" data-bs-target="#bookEvaluation">
                    {{ _trans('landlord.Book free evaluation') }}
                </a>
            </div>
            <div class="col-md-4">
                <a class="cta_btn d-block" href="{{ route('contact') }}">
                    {{ _trans('landlord.Contact Us') }}
                </a>
            </div>
            <div class="col-md-4">
                <a class="cta_btn d-block" href="{{ route('upload_property') }}">
                    {{ _trans('landlord.Upload your Property') }}
                </a>
            </div>
        </div>
    </div>
</div>
<!-- FOOTER::START  -->
<footer class="home_three_footer">
    <div class="main_footer_wrap">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="footer_widget">
                        <img width="150" src="{{ @globalAsset(setting('light_logo')) }}" alt="logo">
                        <ul class="mt-5 footer-ul">
                            <li><span class="icon"><i class="fa fa-location-arrow"></i></span> {{ setting('address') }}</li>
                            <li><span class="icon"><i class="fa fa-phone"></i></span> {{ setting('phone_number') }}</li>
                            <li><span class="icon"><i class="fa fa-envelope"></i></span> {{ setting('email') }}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="footer_widget">
                        <h4 class="text-white fw-bold">Short Links</h4>
                        <ul class="footer_links mt-4">
                            <li><a href="{{ route('properties', ['purpose_type' => 'sell']) }}">{{ _trans('landlord.Property For Sale') }}</a></li>
                            <li><a href="{{ route('properties', ['purpose_type' => 'rent']) }}">{{ _trans('landlord.Property For Rent') }} </a></li>
                            <li><a href="{{ route('upload_property') }}">{{ _trans('landlord.Upload Your Property') }} </a></li>
                            <li><a href="javascript:" data-bs-toggle="modal" data-bs-target="#bookEvaluation" >{{ _trans('landlord.Book An Appointment') }} </a></li>
                            <li><a href="javascript:" data-bs-toggle="modal" data-bs-target="#bookEvaluation">{{ _trans('landlord.Book A Valuation') }} </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="footer_widget">
                        <h4 class="text-white fw-bold">Help Link</h4>
                        <ul class="footer_links mt-4">
                             <li><a href="{{ route('view-page', 'about') }}">{{ _trans('landlord.About')}}</a></li>
                             <li><a href="{{ route('view-page', 'terms-and-conditions') }}">{{ _trans('landlord.Terms And Conditions')}}</a></li>
                            <li><a href="{{ route('view-page', 'our-policy') }}">{{ _trans('landlord.Our Policy') }} </a></li>
                             <li><a href="{{route('faq')}}">{{ _trans('landlord.FAQ')}}</a></li>
                             <li><a href="{{ route('contact') }}">{{ _trans('landlord.Contact Us')}}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-xl-3 col-md-6">
                    <div class="footer_widget">
                        <h4 class="text-white fw-bold">Follow Us</h4>
                        <div class="social__Links">
                            <a href="{{ setting('facebook_link') }}" target="_blank" class="facebook">
                                <i class="fab fa-facebook"></i>
                            </a>
                            <a href="{{ setting('linkedin_link') }}" target="_blank" class="linkedin">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="{{ setting('twitter_link') }}" target="_blank" class="twitter">
                                <i class="fab fa-twitter"></i>
                            </a>

                            <a href="{{ setting('instagram_link') }}" target="_blank" class="instagram">
                                <i class="fab fa-instagram"></i>
                            </a>

                        </div>
                        <div class="apps_boxs mt-4">
                            <a href="#" class="google_play_box d-flex align-items-center mb_10">
                                <div class="icon">
                                    <img src="{{ url('frontend/img/o_land_icon/google_play.svg') }}" alt="">
                                </div>
                                <div class="google_play_text">
                                    <span>{{ _trans('landlord.Get it on') }}</span>
                                    <h4 class="text-nowrap">{{ _trans('landlord.Google Play') }}</h4>
                                </div>
                            </a>
                            <a href="#" class="google_play_box d-flex align-items-center">
                                <div class="icon">
                                    <img src="{{ url('frontend/img/o_land_icon/apple_icon.svg') }}" alt="">
                                </div>
                                <div class="google_play_text">
                                    <span>{{ _trans('landlord.Download on') }}</span>
                                    <h4 class="text-nowrap">{{ _trans('landlord.Apple Store') }}</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12  col-md-12">
                    <div class="subscriber-box">
                        <h3>{{ _trans('landlord.Subscribe Newsletter') }}</h3>
                        <form action="{{ url('/subscribe') }}" method="post" class="subscription relative">
                            @csrf
                            <input name="email" type="email" class="form-control"
                                   placeholder="Type e-mail address…">
                            <button class="" type="submit"><i class="fa fa-angle-right"></i></button>
                            <div class="info"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright_area p-0">
        <div class="container">
            <div class="footer_border m-0"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="copy_right_text d-flex align-items-center gap_20 flex-wrap">
                        <p class="flex-fill text-white">{{ setting('footer_text') }}</p>
                        <div class="payment_imgs text-center">
                            <img height="70 " class="rounded w-100" src="{{ url('frontend/img/payment-method.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
