<footer>
    <div class="footer-wrapper bg-black">
        <div class="footer-area footer-padding">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-xl-3 col-lg-5 col-md-6 col-sm-8">
                        <div class="footer-caption mb-50">
                            <div class="logo-wrap mb-25 wow fadeInUp" data-wow-delay="0.0s">
                                <!-- Logo ( Dark-mode )-->
                                <div class="logo logo-large dark-logo mb-10">
                                    <a href="{{ route('home') }}"><img src="{{ @globalAsset(setting('dark_logo')) }}"
                                                                       alt="logo"></a>
                                </div>
                                <!-- White Logo ( light-mode )-->
                                <div class="logo logo-large light-logo mb-10">
                                    <a href="{{ route('home') }}"><img src="{{ @globalAsset(setting('light_logo')) }}"
                                                                       alt="logo"></a>
                                </div>
                                <p class="pera2 wow fadeInUp" data-wow-delay="0.0s">
                                </p>
                            </div>


                            <!-- Portfolio link -->
                            <div class="apps_boxs  wow fadeInUp" data-wow-delay="0.1s">
                                <a href="#" class="app-box d-flex align-items-center mb-10">
                                    <div class="icon">
                                        <img src="{{ asset('frontend/img/o_land_icon/google_play.svg') }}" alt="">
                                    </div>
                                    <div class="app-text">
                                        <span>{{ _trans('common.Get it on') }}</span>
                                        <h4 class="text-nowrap">{{ _trans('common.Google Play') }}</h4>
                                    </div>
                                </a>
                                <a href="#" class="app-box d-flex align-items-center">
                                    <div class="icon">
                                        <img src="{{ asset('frontend/img/o_land_icon/apple_icon.svg') }}" alt="">
                                    </div>
                                    <div class="app-text">
                                        <span>{{ _trans('common.Download on') }}</span>
                                        <h4 class="text-nowrap">{{ _trans('common.Apple Store') }}</h4>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    @foreach ($pages ?? [] as $menus)
                        <div class="col-xl-3 col-lg-4 col-md-5 col-sm-8">
                            <div class="footer-caption mb-50">
                                <h4 class="title font-700 wow fadeInUp"
                                    data-wow-delay="0.0s">{{ $menus->title }}</h4>
                                @if(count($menus['children']) > 0)
                                    <ul class="listing">
                                        @foreach($menus['children'] ?? [] as $child)
                                            <li class="list">
                                                <a href="{{ route('view-page',$child->slug) }}"
                                                   class="">{{ $child->title }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                    @endforeach
                    <div class="col-xl-4 col-lg-6 col-md-7 col-sm-10">
                        <div class="footer-caption mb-50">
                            <h4 class="title text-capitalize font-700 wow fadeInUp"
                                data-wow-delay="0.0s">{{ _trans('common.Contact Us') }}</h4>
                            <ul class="listing">
                                <li class="list"><a href="#" class="text-normal wow fadeInUp"
                                                    data-wow-delay="0.1s"><i
                                            class="ri-mail-send-line"></i> {{ setting('email') }}</a></li>
                                <li class="list"><a href="#" class="wow fadeInUp" data-wow-delay="0.1s"> <i
                                            class="ri-phone-fill"></i> {{ setting('phone_number') }}</a></li>
                                <li class="list"><a href="#" class="wow fadeInUp" data-wow-delay="0.3s"> <i
                                            class="ri-map-pin-fill"></i>
                                        {{ setting('address') }}
                                    </a>
                                </li>
                            </ul>
                            <!-- Social -->
                            <div class="footer-social  mt-20 ">
                                <ul>
                                    <li class="wow fadeInUp" data-wow-delay="0.0s">
                                        <a href="{{ setting('facebook_link') }}" target="_blank">
                                            <span class="first ri-facebook-fill"></span>
                                            <span class="second ri-facebook-fill"></span>
                                        </a>
                                    </li>
                                    <li class="wow fadeInUp" data-wow-delay="0.0s">
                                        <a href="{{ setting('linkedin_link') }}" target="_blank">
                                            <span class="first ri-linkedin-fill"></span>
                                            <span class="second ri-linkedin-fill"></span>
                                        </a>
                                    </li>
                                    <li class="wow fadeInUp" data-wow-delay="0.0s">
                                        <a href="{{ setting('twitter_link') }}" target="_blank">
                                            <span class="first ri-twitter-line"></span>
                                            <span class="second ri-twitter-line"></span>
                                        </a>
                                    </li>
                                    <li class="wow fadeInUp" data-wow-delay="0.1s">
                                        <a href="{{ setting('instagram_link') }}" target="_blank">
                                            <span class="first ri-instagram-line"></span>
                                            <span class="second ri-instagram-line"></span>
                                        </a>
                                    </li>
                                    <li class="wow fadeInUp" data-wow-delay="0.2s">
                                        <a href="#" target="_blank">
                                            <span class="first ri-youtube-fill"></span>
                                            <span class="second ri-youtube-fill"></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Payment -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="payment text-center mb-20 wow fadeInUp" data-wow-delay="0.0s">
                            <img src="{{ asset('marsland/assets/images/gallery/payment-method.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer-bottom area -->
        <div class="footer-bottom-area">
            <div class="container">
                <div class="footer-border">
                    <div class="row">
                        <div class="col-xl-12 ">
                            <div class="footer-copy-right text-center">
                                <p class="pera">{{ setting('footer_text') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
