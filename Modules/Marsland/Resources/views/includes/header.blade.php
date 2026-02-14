<header>
    <div class="header-area">
        <div class="header-top py-2 border-bottom">
            <div class="container">
               <div class="row">
                   <div class="col-lg-12">
                       <div class="d-flex aligin-items-center justify-content-between flex-wrap gap-3">
                           <div class="left ">
                               <div class="single d-flex aligin-items-center gap-3">
                                   <i class="ri-phone-line text-white"></i>
                                   <span class="text-white">{{ setting('phone_number') }}</span>
                               </div>
                           </div>
                           <div class="right d-flex aligin-items-center gap-3 flex-wrap">
                               <a href="javascript:" data-bs-toggle="modal" data-bs-target="#bookEvaluation" class="text-black">{{ _trans('landlord.Book free evaluation') }}</a>
                               <span class="text-white">|</span>
                               <a href="{{ route('upload_property') }}" class="text-black">{{ _trans('landlord.Upload your Property') }}</a>
                           </div>
                       </div>
                   </div>
               </div>
            </div>
        </div>
        <div class="main-header header-sticky">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="menu-wrapper d-flex align-items-center justify-content-between">
                            <div class="header-left d-flex align-items-center justify-content-between">
                                <!-- Logo ( Dark-mode )-->
                                <div class="logo logo-large dark-logo">
                                    <a href="{{ route('home') }}"><img src="{{ @globalAsset(setting('dark_logo')) }}" alt="logo"></a>
                                </div>
                                <!-- White Logo ( light-mode )-->
                                <div class="logo logo-large  light-logo">
                                    <a href="{{ route('home') }}"><img src="{{ @globalAsset(setting('light_logo')) }}" alt="logo"></a>
                                </div>
                                <!-- Logo Mobile-->
                                <div class="logo logo-mobile light-logo">
                                    <a href="{{ route('home') }}"><img src="{{ @globalAsset(setting('light_logo')) }}" alt="logo"></a>
                                </div>
                                <!-- Logo Mobile ( Dark-mode ) -->
                                <div class="logo logo-mobile dark-logo">
                                    <a href="{{ route('home') }}"><img src="{{ @globalAsset(setting('dark_logo')) }} }}" alt="logo"></a>
                                </div>
                            </div>
                            <div class="header-right d-flex align-items-center justify-content-between">
                                <div class="main-menu d-none d-lg-block">
                                    <nav>
                                        <ul class="listing" id="navigation">
                                            <li class="single-list"><a href="/" class="single {{ frontendActiveMenu('home') }}">{{ _trans('landlord.Home') }}</a></li>
                                            <li class="single-list">
                                                <a href="{{ route('properties') }}" class="single {{ frontendActiveMenu('properties') }}">{{ _trans('landlord.properties') }}</a>
                                                <ul class="mega-menu">
                                                    <li>
                                                        <section class="our-all-porduct our-best-product">
                                                            <div class="row align-items-center" id="fiveProperties">
                                                               <!-- Data will load from Javascript -->
                                                            </div>
                                                        </section>
                                                        <!-- End-of All Product -->
                                                    </li>
                                                </ul>
                                            </li>
                                            @foreach($menus as $main_menus)
                                                <li class="single-list">
                                                    <a href="{{ route('view-page', $main_menus->slug ?? '') }}"
                                                       class="single {{ set_menu(['page'], 'active') }}">{{ $main_menus->title }}</a>
                                                    @if(count($main_menus->children) > 0)
                                                        <ul class="submenu mega_width_menu">
                                                            @foreach($main_menus->children as $sub_menu)
                                                                <li class="pt-0">
                                                                <span><a class="p-0 pb-2 mb-2 border-bottom"
                                                                         href="{{ isset($sub_menu->slug) ? route('view-page', $sub_menu->slug) : '#' }}">{{ $sub_menu->title }}</a></span>
                                                                    @if(count($sub_menu->children) > 0)
                                                                        <ul>
                                                                            @foreach($sub_menu->children as $child)
                                                                                <li>
                                                                                    <a href="{{ route('view-page', $child->slug ?? '') }}">{{ $child->title }}</a>
                                                                                </li>
                                                                            @endforeach
                                                                        </ul>
                                                                    @endif
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                            @endforeach
                                            <li class="single-list"><a href="{{ route('blogs') }}" class="single {{ frontendActiveMenu('blogs') }}">{{ _trans('landlord.blogs') }}</a></li>

                                            <li class="single-list"><a href="{{ route('contact_us') }}" class="single {{ frontendActiveMenu('contact_us') }}">{{ _trans('landlord.contact us') }}</a></li>
                                        </ul>
                                    </nav>
                                </div>
                                <!-- Right button -->
                                <ul class="cart">
                                    <!-- Mode Change -->
                                    <li class="cart-list">
                                        <button class="single change-mode m-0 p-2 border-0">
                                            <i class="ri-sun-line"></i>
                                        </button>
                                    </li>
                                    <!-- Cart -->
                                    <li class="cart-list d-none shopping-cart position-relative">
                                        <a href="{{ route('cart.cart_list') }}" class="cart-items">
                                            <i class="ri-shopping-cart-line"></i>
                                            <span class="count">{{ @\Modules\Marsland\Entities\Cart::cartCount() }}</span>
                                        </a>
                                    </li>
                                    <li class="cart-list shopping-cart position-relative">
                                        <a href="{{ route('cart.cart_list') }}" class="cart-items">
                                            <i class="ri-shopping-cart-line"></i>
                                            <span class="count">{{ @\Modules\Marsland\Entities\Cart::cartCount() }}</span>
                                        </a>
                                    </li>
                                    @if(auth()->check())
                                        <li class="cart-list onhover-dropdown">
                                            <!-- User Profile -->
                                            <div class="user-info ml-10">
                                                <div class="user-img">
                                                    <img src="{{ @globalAsset(@auth()->user()->image->path) }}" class="img-cover" alt="img">
                                                </div>
                                            </div>
                                            <div class="onhover-dropdown-show dropdown-list-style white-bg">

                                                <!-- Profile List -->
                                                <ul class="profileListing mb-20">
                                                    <li class="list">
                                                        <a class="list-items" href="{{ route('customer.profile') }}">
                                                            <i class="ri-contacts-line"></i> {{ _trans('landlord.My Profile') }}
                                                        </a>
                                                    </li>
                                                    <li class="list">
                                                        <a class="list-items" href="{{ route('customer.orders') }}">
                                                            <i class="ri-shopping-cart-2-line"></i> {{ _trans('landlord.Purchase history') }} </a>
                                                    </li>
                                                    <li class="list">
                                                        <a class="list-items" href="{{ route('customer.settings') }}">
                                                            <i class="ri-settings-2-line"></i> {{ _trans('landlord.Settings') }}
                                                        </a>
                                                    </li>
                                                </ul>
                                                <!-- Log Out -->
                                                <form action="{{ route('customer.logout') }}" id="logoutForm" method="post">
                                                    @csrf
                                                </form>
                                                <a href="javascript:" onclick="($('#logoutForm').submit())" class="signout-btn">
                                                    <span class="title"><i class="ri-logout-circle-r-line"></i></span>
                                                    <span class="title">{{ _trans('landlord.sign out') }}</span>
                                                </a>
                                            </div>
                                        </li>
                                    @else
                                        <!-- Without Login -->
                                        <li class="cart-list">
                                            <a href="{{ route('customer.dashboard') }}" class="btn-primary-fill ml-20 mr-15">{{ _trans('landlord.my account') }}</a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="div">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
