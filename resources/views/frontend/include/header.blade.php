<header class="o_land_header">
    <div id="sticky-header" class="header_area">
        <div class="header_topbar_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 d-bock d-lg-none">
                        <div class="text-center mt-3 mb-3">
                            <div class="single_wishcart_lists">
                                <a href="tel:{{ setting('phone_number') }}">
                                    <h4 class="mb-0 text-theme-color fw-bold">{{ setting('phone_number') }}</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="header__wrapper">
                            <!-- header__left__start  -->
                            <div class="header__left d-flex align-items-center d-none d-lg-flex">
                                <a href="#" class="single_top_lists d-flex align-items-center">
                                    <img src="{{ url('frontend/img/o_land_icon') }}/playstore.svg" alt="">
                                    <span>{{ _trans('landlord.Playstore') }}</span>
                                </a>
                                <span class="vertical_line style2 d-none d-lg-inline-flex"></span>
                                <a href="#"
                                   class="single_top_lists d-flex align-items-center d-none d-md-inline-flex">
                                    <img src="{{ url('frontend/img/o_land_icon') }}/apple.svg" alt="">
                                    <span>{{ _trans('landlord.App Store') }}</span>
                                </a>
                            </div>
                            <!-- header__left__end  -->
                            <!-- header__right_start  -->
                            <div class="header_top_area_right border-top-0 border-bottom-0 flex-wrap">
                                <a href="javascript:void(0)"
                                   class="single_top_lists d-flex align-items-center d-lg-inline-flex">
                                    <img src="{{ url('frontend/img/o_land_icon') }}/phone.svg" alt="">
                                    <span>{{ Setting('phone_number') }}</span>
                                </a>
                                <span class="vertical_line style2 d-none d-lg-inline-flex"></span>
                                @if (Auth::check())
                                    @php
                                        $totalItemCount = 0;
                                        if (Auth::check()) {
                                            $wishItems = \App\Models\Wishlist::where('user_id', @Auth::user()->id)->get();
                                        } else {
                                            $wishItems = Session::get('cart');
                                        }

                                        $wishItemsCount = !blank($wishItems) ? $wishItems->count() : 0;
                                    @endphp
                                    <a href="{{ route('customer.myWishlist') }}"
                                       class="single_top_lists d-flex align-items-center">
                                        <img src="{{ url('frontend/img/o_land_icon') }}/wishlist.svg" alt="">
                                        <span>{{ _trans('landlord.Wistlist') }} @if ($wishItemsCount > 0)
                                                (<span class="wish-view">{{ $wishItemsCount }}</span>)
                                            @else
                                                <span class="wish-view">(0) </span>
                                        </span>
                                        @endif
                                    </a>
                                    <span class="vertical_line style2 d-none d-lg-inline-flex"></span>
                                    @php
                                        $totalItemCount = 0;
                                        if (Auth::check()) {
                                            $cartItems = \App\Models\Cart::where('tenant_id', @Auth::user()->id)->get();
                                        } else {
                                            $cartItems = Session::get('cart');
                                        }

                                        $totalItemCount = !blank($cartItems) ? $cartItems->count() : 0;
                                    @endphp

                                    <a href="{{ route('customer.cart') }}"
                                       class="single_top_lists d-flex align-items-center">
                                        <img src="{{ url('frontend/img/o_land_icon') }}/cart.svg" alt="">
                                        <span>{{ _trans('landlord.Book List') }} @if ($totalItemCount > 0)
                                                (<span class="cart-view">{{ $totalItemCount }}</span>)
                                            @else
                                                <span class="cart-view">(0) </span>
                                            @endif
                                    </span>
                                    </a>
                                @else
                                    <a href="{{ route('login') }}"
                                       class="single_top_lists d-flex align-items-center">
                                        <img src="{{ url('frontend/img/o_land_icon') }}/wishlist.svg" alt="">
                                        <span>{{ _trans('landlord.Wishlist') }} (0)</span>
                                    </a>
                                    <span class="vertical_line style2 d-none d-lg-inline-flex"></span>
                                    <a href="{{ route('login') }}"
                                       class="single_top_lists d-flex align-items-center">
                                        <img src="{{ url('frontend/img/o_land_icon') }}/cart.svg" alt="">
                                        <span>{{ _trans('landlord.Book') }} (<span id="cart-view"></span>)</span>
                                    </a>
                                @endif
                                <span class="vertical_line style2 d-none d-md-block"></span>
                                <div
                                    class="single_top_lists position-relative  d-flex align-items-center shoping_language">
                                    <div class="">

                                        <div
                                            class=" gj-cursor-pointer d-flex align-items-center gap_10 ">
                                            <div class="social__Links">
                                                <a href="#">
                                                    <i class="fab fa-twitter"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="fab fa-linkedin-in"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="fab fa-instagram"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="fab fa-facebook"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- header__right_end  -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header_top_area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="header__wrapper bottom-header">
                            <!-- header__left__start  -->
                            <div class="header__left d-flex align-items-center">
                                <div class="logo_img">
                                    <a href="{{ route('home') }}">
                                        <img src="{{ @globalAsset(setting('light_logo')) }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <!-- header__left__end  -->
                        {{--                            <div class="header_middle d-flex">--}}
                        {{--                                <form action="{{ route('properties') }}">--}}
                        {{--                                    <div class="input-group header_search_field ">--}}
                        {{--                                        <input type="text" class="form-control" name="search"--}}
                        {{--                                            value="{{ request()->search }}"--}}
                        {{--                                            placeholder="{{ _trans('landlord.Search for Property, Land and more') }}"--}}
                        {{--                                            id="topSearchBar">--}}
                        {{--                                        <div class="input-group-prepend">--}}
                        {{--                                            <button class="btn" type="button" id="button-addon1"> <i--}}
                        {{--                                                    class="ti-search"></i> </button>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                </form>--}}
                        {{--                            </div>--}}
                        <!-- header__right_start  -->
                            <div class="header_top_area_right">
                                <div class="wish_cart">
                                    <div class="single_wishcart_lists me-5 d-none d-lg-block">
                                        <a href="tel:{{ setting('phone_number') }}">
                                            <h4 class="mb-0 text-theme-color fw-bold">{{ setting('phone_number') }}</h4>
                                        </a>
                                    </div>
                                @guest
                                    <!-- will conditionaly render  -->
                                        <div class="single_wishcart_lists d-none d-lg-block">
                                            <div class="icon d-inline-block lh-1">
                                                <img src="{{ url('frontend/img/o_land_icon') }}/user.svg" alt="">
                                            </div>
                                            <span class="d-inline-block lh-1 ">
                                                <a href="{{ route('login') }}">{{ _trans('landlord.Login') }}</a>
                                                <a href="{{ route('register') }}">/ {{ _trans('landlord.Register') }}</a>
                                            </span>
                                        </div>
                                    @endguest

                                    @auth
                                        <div class="menu_profile_warpper position-relative d-none d-lg-block">
                                            <a href="javascript:void(0)"
                                               class="menu_profile_warpper_inner d-flex align-items-center gap-2">

                                                <x-logged-user-profile :user="$user"/>
                                                {{-- <h4 class="font_14 f_w_500 text-uppercase text-nowrap m-0">
                                                    {{ auth()->user()->name }}</h4> --}}
                                            </a>
                                            <div class="menu_profile_warpper_hover">
                                                <ul>
                                                    @if (Auth::user()->role_id != 5)
                                                        <li><a
                                                                href="{{ url('dashboard') }}">{{ _trans('landlord.Dashboard') }}</a>
                                                        </li>
                                                        <li>
                                                            <form action="{{ route('logout') }}" method="POST"
                                                                  id="logout">
                                                                @csrf
                                                                <a href="javascript:void(0)"
                                                                   onclick="submitForm()">{{ _trans('landlord.Logout') }}</a>
                                                            </form>
                                                        </li>
                                                    @else
                                                        <li><a
                                                                href="{{ url('customer/dashboard') }}">{{ _trans('landlord.Dashboard') }}</a>
                                                        </li>
                                                        <li>
                                                            <form action="{{ route('customer.logout') }}" method="POST"
                                                                  id="logout">
                                                                @csrf
                                                                <a href="javascript:void(0)"
                                                                   onclick="submitForm()">{{ _trans('landlord.Logout') }}</a>
                                                            </form>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    @endauth

                                </div>
                                <div class="wish_cart_mobile">
                                    <div class="home6_search_toggle ">
                                        <i class="ti-search"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- header__right_end  -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main_header_area  -->
        <div class="main_header_area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="shop_header_wrapper d-flex align-items-center justify-content-between">
                            <div class="menu_logo">
                                <a href="{{ route('home') }}">
                                    <img src="{{ @globalAsset(setting('light_logo')) }}" alt="logo">
                                </a>
                            </div>
                            <!-- main_menu_start  -->
                            <div class="main_menu  d-none d-lg-block">
                                <nav>
                                    <ul id="mobile-menu">
                                        <li><a href="{{ route('home') }}"
                                               class="{{ set_menu(['home'], 'active') }}">{{ _trans('landlord.Home') }}</a>
                                        </li>
                                        @foreach($menus as $main_menus)
                                            <li>
                                                <a href="{{ blank($main_menus->page_url) ? route('view-page', $main_menus->slug ?? '')  : url($main_menus->page_url) }}"
                                                   class="{{ set_menu(['page'], 'active') }}">{{ $main_menus->title }}</a>
                                                @if(count($main_menus->children) > 0)
                                                    <ul class="submenu mega_width_menu">
                                                        @foreach($main_menus->children as $sub_menu)
                                                            <li class="pt-0">
                                                                <span>
                                                                    <a class="p-0 pb-2 mb-2 border-bottom"
                                                                       href="{{ !blank($sub_menu->page_url) ? url($sub_menu->page_url) : (isset($sub_menu->slug) ? route('view-page', $sub_menu->slug):'#')  }}">
                                                                        {{ $sub_menu->title }}
                                                                    </a>
                                                                </span>
                                                                @if(count($sub_menu->children) > 0)
                                                                    <ul>
                                                                        @foreach($sub_menu->children as $child)
                                                                            <li>
                                                                                <a href="{{ !blank($child->page_url) ? url($child->page_url) : (isset($child->slug) ? route('view-page', $child->slug):'#')  }}">{{ $child->title }}</a>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                @endif
                                                            </li>
                                                        @endforeach
                                                        <div class="w-100 mb-4 pr-4">
                                                            <div class="right-buttons d-flex aligin-items-center gap-3">
                                                                <a href="javascript:"
                                                                   class="btn btn-sm btn-dark btn-theme-bg rounded-3 w-100 m-0"
                                                                   data-bs-toggle="modal"
                                                                   data-bs-target="#bookEvaluation">{{ _trans('landlord.Book free evaluation') }}</a>
                                                                <a href="{{ route('upload_property') }}"
                                                                   class="btn btn-sm btn-dark btn-theme-bg rounded-3 w-100 m-0">{{ _trans('landlord.Upload your Property') }}</a>
                                                            </div>
                                                        </div>
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach


                                    
                                        <li>
                                            <a href="{{ route('contact') }}"
                                               class="{{ set_menu(['contact'], 'active') }}">{{ _trans('landlord.Contact Us') }}</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="main_header_media d-none d-xl-flex justify-content-end">
                                @if (env('HUBOFHOMES_THEME'))
                                    <div class="right d-flex aligin-items-center gap-3 flex-wrap">
                                        <a href="javascript:" class="btn btn-sm btn-dark btn-theme-bg rounded-3"
                                           data-bs-toggle="modal"
                                           data-bs-target="#bookEvaluation">{{ _trans('landlord.Book free evaluation') }}</a>
                                        <span class="text-white">|</span>
                                        <a href="{{ route('upload_property') }}"
                                           class="btn btn-sm btn-dark btn-theme-bg rounded-3">{{ _trans('landlord.Upload your Property') }}</a>
                                    </div>
                                @else
                                    @guest
                                        <a href="{{ route('register') }}?type=Tenant"
                                           class="single_top_lists d-flex align-items-center d-none d-lg-inline-flex">
                                            <img src="{{ url('frontend/img/o_land_icon/new_user.svg') }}" alt="">
                                            <span>{{ _trans('landlord.Become Tenant') }}</span>
                                        </a>
                                        <span class="vertical_line style2 d-none d-lg-inline-flex"></span>

                                        <a href="{{ route('register') }}?type=Landlord"
                                           class="single_top_lists d-flex align-items-center d-none d-lg-inline-flex">
                                            <img src="{{ url('frontend/img/o_land_icon/new_user.svg') }}" alt="">
                                            <span>{{ _trans('landlord. Become a Landlord') }}</span>
                                        </a>
                                        <span class="vertical_line style2 d-none d-lg-inline-flex"></span>
                                        <a href="{{ route('register') }}?type=Landlord"
                                           class="single_top_lists d-flex align-items-center d-none d-md-inline-flex">
                                            <img src="{{ url('frontend/img/o_land_icon/new_user.svg') }}" alt="">
                                            <span>{{ _trans('landlord.Upload Your Property') }}</span>
                                        </a>
                                    @endguest
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="mobile_menu d-block d-lg-none"></div>
                </div>
            </div>
        </div>
        <div class="menu_search_popup">
            <form class="menu_search_popup_field">
                <input type="text" placeholder="Search products...">
                <button type="submit">
                    <i class="ti-search"></i>
                </button>
            </form>
            <span class="search_close home6_search_hide">
                <i class="fas fa-times"></i>
            </span>
        </div>
    </div>

    <ul class="short_curt_icons">
        <li>
            <a href="{{ route('home') }}" class="{{ Route::is('home') ? 'active' : '' }}">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M13.717 15.2913C14.921 15.2913 15.901 16.2643 15.901 17.4603V20.5363C15.901 20.7933 16.107 20.9993 16.371 21.0053H18.277C19.779 21.0053 21 19.7993 21 18.3173V9.59325C20.993 9.08325 20.75 8.60325 20.333 8.28425L13.74 3.02625C12.855 2.32525 11.617 2.32525 10.729 3.02825L4.181 8.28225C3.748 8.61125 3.505 9.09125 3.5 9.61025V18.3173C3.5 19.7993 4.721 21.0053 6.223 21.0053H8.147C8.418 21.0053 8.638 20.7903 8.638 20.5263C8.638 20.4683 8.645 20.4103 8.657 20.3553V17.4603C8.657 16.2713 9.631 15.2993 10.826 15.2913H13.717ZM18.277 22.5053H16.353C15.251 22.4793 14.401 21.6143 14.401 20.5363V17.4603C14.401 17.0913 14.094 16.7913 13.717 16.7913H10.831C10.462 16.7933 10.157 17.0943 10.157 17.4603V20.5263C10.157 20.6013 10.147 20.6733 10.126 20.7413C10.018 21.7313 9.172 22.5053 8.147 22.5053H6.223C3.894 22.5053 2 20.6263 2 18.3173V9.60325C2.01 8.60925 2.468 7.69925 3.259 7.10025L9.794 1.85525C11.233 0.71525 13.238 0.71525 14.674 1.85325L21.256 7.10325C22.029 7.69225 22.487 8.60025 22.5 9.58225V18.3173C22.5 20.6263 20.606 22.5053 18.277 22.5053Z"
                          fill="white"/>
                </svg>
            </a>
        </li>
        <li>
            <a href="{{ route('customer.myWishlist') }}"
               class="{{ Route::is('customer.myWishlist') ? 'active' : '' }}">
                <svg width="27" height="24" viewBox="0 0 27 24" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_28_1481)">
                        <path
                            d="M13.368 23.999C13.0051 24.0057 12.6437 23.9509 12.299 23.837C7.55001 22.209 1.07944e-05 16.426 1.07944e-05 7.88301C-0.00344176 5.79696 0.821448 3.79488 2.29341 2.31674C3.76537 0.838587 5.76397 0.00530538 7.85001 6.96896e-06C8.87559 -0.00389899 9.89168 0.196397 10.8391 0.589218C11.7864 0.982039 12.6461 1.55952 13.368 2.28801C14.0903 1.55916 14.9504 0.981469 15.8984 0.588637C16.8463 0.195805 17.8629 -0.00429772 18.889 6.96896e-06C20.9741 0.00821106 22.9708 0.842656 24.4417 2.32048C25.9126 3.7983 26.7376 5.79895 26.736 7.88401C26.736 16.439 19.188 22.209 14.436 23.838C14.0916 23.9514 13.7305 24.0059 13.368 23.999ZM7.85001 1.86501C6.25937 1.87215 4.73647 2.5098 3.61527 3.63812C2.49407 4.76645 1.86608 6.29335 1.86901 7.88401C1.86901 16.377 10.039 21.103 12.911 22.084C13.2175 22.1587 13.5375 22.1587 13.844 22.084C16.704 21.102 24.886 16.384 24.886 7.88401C24.8889 6.29335 24.261 4.76645 23.1398 3.63812C22.0186 2.5098 20.4957 1.87215 18.905 1.86501C17.9755 1.86306 17.0586 2.08048 16.2289 2.49959C15.3992 2.91869 14.6801 3.52767 14.13 4.27701C14.0397 4.38764 13.9259 4.4768 13.7969 4.53803C13.6679 4.59926 13.5268 4.63103 13.384 4.63103C13.2412 4.63103 13.1002 4.59926 12.9711 4.53803C12.8421 4.4768 12.7283 4.38764 12.638 4.27701C12.0853 3.5273 11.3639 2.91828 10.532 2.49924C9.70022 2.0802 8.78142 1.86293 7.85001 1.86501Z"
                            fill="white"/>
                    </g>

                </svg>
            </a>
        </li>
        <li>
            <a href="{{ route('customer.myOrders') }}" class="{{ Route::is('customer.myOrders') ? 'active' : '' }}">
                <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_28_1473)">
                        <path
                            d="M4.41728 5.69398C4.19556 5.69165 3.98336 5.60348 3.82528 5.44798C3.66944 5.29036 3.58203 5.07764 3.58203 4.85598C3.58203 4.63432 3.66944 4.4216 3.82528 4.26398L7.87828 0.214979C8.03741 0.0715441 8.24549 -0.00541206 8.45966 -4.19008e-05C8.67382 0.00532826 8.87778 0.092616 9.02952 0.243846C9.18126 0.395076 9.26924 0.598735 9.27533 0.812883C9.28143 1.02703 9.20518 1.23536 9.06228 1.39498L5.00928 5.44898C4.84991 5.60238 4.63845 5.6899 4.41728 5.69398Z"
                            fill="white"/>
                        <path
                            d="M19.6172 5.69398C19.5071 5.69438 19.3981 5.67284 19.2964 5.6306C19.1948 5.58836 19.1026 5.52628 19.0252 5.44798L14.9712 1.39498C14.8283 1.23536 14.7521 1.02703 14.7582 0.812883C14.7642 0.598735 14.8522 0.395076 15.004 0.243846C15.1557 0.092616 15.3597 0.00532826 15.5738 -4.19008e-05C15.788 -0.00541206 15.9961 0.0715441 16.1552 0.214979L20.2082 4.26498C20.364 4.4226 20.4515 4.63532 20.4515 4.85698C20.4515 5.07864 20.364 5.29136 20.2082 5.44898C20.0502 5.60387 19.8384 5.69166 19.6172 5.69398Z"
                            fill="white"/>
                        <path
                            d="M21.1826 10.407H3.08762C2.6779 10.4663 2.26034 10.4403 1.86112 10.3307C1.46189 10.2211 1.08962 10.0302 0.767622 9.76998C0.484966 9.43579 0.272816 9.04789 0.143928 8.62961C0.0150395 8.21132 -0.0279234 7.77129 0.0176223 7.33598C0.0176223 4.26398 2.26162 4.26398 3.33262 4.26398H20.7026C21.7746 4.26398 24.0176 4.26398 24.0176 7.33498C24.0635 7.76953 24.0206 8.20887 23.8917 8.62639C23.7628 9.04391 23.5505 9.43092 23.2676 9.76398C22.9818 10.0068 22.6496 10.189 22.2912 10.2996C21.9327 10.4101 21.5556 10.4467 21.1826 10.407ZM3.33262 8.73198H20.9586C21.4586 8.74298 21.9296 8.74298 22.0856 8.58698C22.1636 8.50898 22.3316 8.24098 22.3316 7.33598C22.3316 6.07398 22.0186 5.93598 20.6906 5.93598H3.33262C2.00462 5.93598 1.69162 6.06998 1.69162 7.33598C1.69162 8.23598 1.87062 8.50798 1.93762 8.58698C2.29557 8.73163 2.68475 8.78157 3.06762 8.73198H3.33262Z"
                            fill="white"/>
                        <path
                            d="M9.51669 19.003C9.29527 19.0011 9.08343 18.9124 8.92686 18.7558C8.77029 18.5992 8.68152 18.3874 8.67969 18.166V14.201C8.67969 13.9788 8.76792 13.7658 8.92498 13.6088C9.08205 13.4517 9.29507 13.3635 9.51719 13.3635C9.73931 13.3635 9.95233 13.4517 10.1094 13.6088C10.2665 13.7658 10.3547 13.9788 10.3547 14.201V18.165C10.355 18.2751 10.3335 18.3842 10.2914 18.486C10.2494 18.5878 10.1877 18.6802 10.1098 18.7581C10.032 18.836 9.93948 18.8977 9.83769 18.9397C9.7359 18.9817 9.62681 19.0032 9.51669 19.003Z"
                            fill="white"/>
                        <path
                            d="M14.652 19.003C14.4305 19.0012 14.2187 18.9124 14.0621 18.7558C13.9056 18.5992 13.8168 18.3874 13.815 18.166V14.201C13.8111 14.0886 13.8299 13.9765 13.8702 13.8715C13.9105 13.7665 13.9716 13.6707 14.0498 13.5898C14.1279 13.5089 14.2215 13.4446 14.3251 13.4006C14.4286 13.3567 14.54 13.334 14.6525 13.334C14.7649 13.334 14.8763 13.3567 14.9798 13.4006C15.0834 13.4446 15.177 13.5089 15.2552 13.5898C15.3333 13.6707 15.3944 13.7665 15.4347 13.8715C15.4751 13.9765 15.4938 14.0886 15.49 14.201V18.165C15.4902 18.2751 15.4687 18.3842 15.4267 18.486C15.3847 18.5878 15.323 18.6803 15.2451 18.7581C15.1672 18.836 15.0747 18.8977 14.973 18.9397C14.8712 18.9818 14.7621 19.0033 14.652 19.003Z"
                            fill="white"/>
                        <path
                            d="M15.2433 23.972H8.51435C4.51435 23.972 3.62535 21.594 3.27935 19.528L1.70535 9.869C1.68509 9.7594 1.68693 9.64685 1.71075 9.53797C1.73458 9.42908 1.77991 9.32605 1.84409 9.23492C1.90828 9.14379 1.99001 9.0664 2.08451 9.00729C2.179 8.94818 2.28435 8.90853 2.39437 8.89068C2.5044 8.87284 2.61688 8.87714 2.72521 8.90335C2.83355 8.92956 2.93556 8.97714 3.02526 9.04331C3.11496 9.10947 3.19054 9.19288 3.24756 9.28865C3.30459 9.38442 3.34191 9.49062 3.35735 9.601L4.93135 19.247C5.25535 21.223 5.92435 22.295 8.51435 22.295H15.2433C18.1123 22.295 18.4353 21.295 18.8043 19.347L20.6793 9.577C20.7006 9.46925 20.7429 9.36675 20.8038 9.27534C20.8647 9.18394 20.943 9.10542 21.0342 9.04427C21.1254 8.98312 21.2278 8.94054 21.3355 8.91897C21.4432 8.89739 21.5541 8.89723 21.6618 8.9185C21.7696 8.93978 21.8721 8.98207 21.9635 9.04295C22.0549 9.10384 22.1334 9.18214 22.1946 9.27337C22.2557 9.36461 22.2983 9.46699 22.3199 9.57468C22.3415 9.68237 22.3416 9.79325 22.3203 9.901L20.4433 19.673C20.0113 21.94 19.2863 23.972 15.2433 23.972Z"
                            fill="white"/>
                    </g>

                </svg>
            </a>
        </li>
        <li>

            @if (Auth::check())
                <a href="{{ route('customer.profile') }}"
                   class="{{ Route::is('customer.profile') ? 'active' : '' }}">
                    @else
                        <a href="{{ route('login') }}" class="{{ Route::is('login') ? 'active' : '' }}">
                            @endif


                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_28_1483)">
                                    <path
                                        d="M12.1321 13.708H11.9421C10.7709 13.6787 9.65833 13.189 8.84558 12.3452C8.03282 11.5013 7.58529 10.3712 7.59996 9.19964C7.61462 8.02811 8.0903 6.90954 8.92393 6.08629C9.75756 5.26303 10.882 4.80139 12.0536 4.80139C13.2252 4.80139 14.3497 5.26303 15.1833 6.08629C16.0169 6.90954 16.4926 8.02811 16.5073 9.19964C16.5219 10.3712 16.0744 11.5013 15.2616 12.3452C14.4489 13.189 13.3364 13.6787 12.1651 13.708H12.1321ZM11.9981 6.385C11.6232 6.3709 11.2492 6.43164 10.898 6.56366C10.5468 6.69568 10.2254 6.89634 9.95256 7.15392C9.67975 7.41151 9.46098 7.72086 9.30903 8.06392C9.15708 8.40697 9.07498 8.77686 9.06755 9.15199C9.06011 9.52712 9.12747 9.89998 9.2657 10.2488C9.40393 10.5976 9.61026 10.9154 9.87265 11.1836C10.135 11.4518 10.4482 11.665 10.7939 11.8109C11.1396 11.9567 11.5109 12.0322 11.8861 12.033C11.9714 12.0212 12.0578 12.0212 12.1431 12.033C12.8781 11.9939 13.5688 11.6695 14.0684 11.129C14.5679 10.5884 14.8369 9.87426 14.818 9.13846C14.7991 8.40267 14.4939 7.70327 13.9672 7.18905C13.4406 6.67483 12.7341 6.38635 11.9981 6.385Z"
                                        fill="white"/>
                                    <path
                                        d="M12.0015 24C9.00466 24.0021 6.11632 22.8786 3.90852 20.852C3.81289 20.7639 3.73894 20.6549 3.69245 20.5334C3.64595 20.412 3.62818 20.2815 3.64052 20.152C3.75019 19.4345 4.01721 18.7502 4.42246 18.148C4.8277 17.5458 5.36113 17.0408 5.98452 16.669C7.80391 15.5842 9.88277 15.0115 12.001 15.0115C14.1193 15.0115 16.1981 15.5842 18.0175 16.669C18.64 17.0419 19.1727 17.5473 19.5778 18.1492C19.9829 18.7512 20.2505 19.435 20.3615 20.152C20.3774 20.2817 20.3613 20.4133 20.3146 20.5353C20.2679 20.6574 20.192 20.7661 20.0935 20.852C17.886 22.8783 14.998 24.0018 12.0015 24ZM5.39352 19.925C7.24675 21.4752 9.58594 22.3245 12.002 22.3245C14.4181 22.3245 16.7573 21.4752 18.6105 19.925C18.3303 19.1435 17.7907 18.4817 17.0815 18.05C15.538 17.1507 13.7835 16.6769 11.997 16.6769C10.2106 16.6769 8.45609 17.1507 6.91252 18.05C6.20556 18.4817 5.66907 19.1439 5.39352 19.925Z"
                                        fill="white"/>
                                    <path
                                        d="M12 24C9.62663 24 7.30655 23.2962 5.33316 21.9776C3.35977 20.6591 1.8217 18.7849 0.913451 16.5922C0.00519949 14.3995 -0.232441 11.9867 0.230582 9.65892C0.693605 7.33115 1.83649 5.19295 3.51472 3.51472C5.19295 1.83649 7.33115 0.693605 9.65892 0.230582C11.9867 -0.232441 14.3995 0.00519949 16.5922 0.913451C18.7849 1.8217 20.6591 3.35977 21.9776 5.33316C23.2962 7.30655 24 9.62663 24 12C24 15.1826 22.7357 18.2349 20.4853 20.4853C18.2349 22.7357 15.1826 24 12 24ZM12 1.67501C9.95763 1.67481 7.96107 2.28027 6.26281 3.41483C4.56456 4.54939 3.24089 6.16208 2.45922 8.04895C1.67754 9.93583 1.47297 12.0121 1.87137 14.0153C2.26977 16.0184 3.25324 17.8584 4.69742 19.3026C6.1416 20.7468 7.98161 21.7302 9.98475 22.1286C11.9879 22.527 14.0642 22.3225 15.9511 21.5408C17.8379 20.7591 19.4506 19.4355 20.5852 17.7372C21.7197 16.0389 22.3252 14.0424 22.325 12C22.3247 9.26173 21.2368 6.63568 19.3006 4.69942C17.3643 2.76316 14.7383 1.67527 12 1.67501Z"
                                        fill="white"/>
                                </g>
                            </svg>
                        </a>
        </li>
    </ul>
</header>
<!--/ HEADER::END -->
