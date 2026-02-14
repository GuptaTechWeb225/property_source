<div class="sidebar-wrap">
    <!-- Sidebar Start -->
    <div class="sidebar-body-overlay"></div>
    <div class="panel-sidebar">
        <div class="panel-sidebar-close-main">
            <!-- Mobile Device Close Icon -->
            <div class="close-sidebar"><i class="ri-close-line"></i></div>

            <!-- Top -->
            <div class="panel-sidebar-top mb-30 position-relative">
                <div class="thumb">
                    <a href="#">
                        <img src="{{ @globalAsset(auth()->user()->image?->path) }}" alt="img" class="img-cover">
                    </a>
                </div>
                <div class="d-flex justify-content-center gap-4">
                    <h5 class="title mb-20 text-capitalize">{{ auth()->user()->name }}</h5>
                    <a href="{{ route('customer.notifications') }}" class="btn btn-primary btn-sm btn-rounded position-relative">
                        <i class="ri-notification-3-fill"></i>
                        @if(count(notifications()) > 0)
                            <span class="badge bg-danger position-absolute rounded bottom-50 start-50">
                                {{ count(notifications()) }}
                            </span>
                        @endif
                    </a>
                </div>
                <span class="badges text-uppercase badge-bg-green start-0  position-absolute"> {{ _trans('common.Tenant') }} </span>
                <form action="{{ route('customer.logout') }}" method="POST">
                    @csrf
                    <button class="btn-primary-fill">{{ _trans('common.logout') }}</button>
                </form>
            </div>

            <!-- Page List -->
            <div class="panel-sidebar-mid nice-scroll">
                <ul class="panel-sidebar-list">
                    @if(auth()->user()->role_id == 5 && (auth()->user()->address_verify == 1))

                    <li class="list {{ request()->routeIs('customer.dashboard') ? 'active' : '' }}">
                        <a href="{{ route('customer.dashboard') }}" class="single">
                            <i class="ri-dashboard-line"></i> {{ _trans('common.Dashboard') }}
                        </a>
                    </li>
                    <li class="list {{ request()->routeIs('customer.profile') ? 'active' : '' }}">
                        <a href="{{ route('customer.profile') }}" class="single">
                            <i class="ri-user-line"></i> {{ _trans('common.My Profile') }}
                        </a>
                    </li>
                    <li class="list {{ request()->routeIs('customer.orders') ? 'active' : '' }}">
                        <a href="{{ route('customer.orders') }}" class="single">
                            <i class="ri-tv-line"></i> {{ _trans('common.Purchase History') }}
                        </a>
                    </li>

                    <li class="list {{ request()->routeIs('customer.properties') ? 'active' : '' }}">
                        <a href="{{ route('customer.properties') }}" class="single">
                            <i class="ri-building-line"></i> {{ _trans('common.Properties') }}
                        </a>
                    </li>
                    <li class="list {{ request()->routeIs('customer.wishlists') ? 'active' : '' }}">
                        <a href="{{ route('customer.wishlists') }}" class="single">
                            <i class="ri-heart-2-line"></i> {{ _trans('common.My Wishlist') }}
                        </a>
                    </li>
                    <li class="list {{ request()->routeIs('customer.due.payments') ? 'active' : '' }}">
                        <a href="{{ route('customer.due.payments') }}" class="single">
                            <i class="ri-paypal-line"></i> {{ _trans('common.Due payment') }}
                        </a>
                    </li>
                    <li class="list">
                        <a href="#" class="single">
                            <i class="ri-notification-4-line"></i> {{ _trans('common.Notifications') }}
                        </a>
                    </li>
                    <li class="list">
                        <a href="{{ route('customer.account_category.index') }}" class="single">
                            <i class="ri-building-3-line"></i> {{ _trans('common.Account Category') }}
                        </a>
                    </li>
                    <li class="list">
                        <a href="{{ route('customer.account.index') }}" class="single">
                            <i class="ri-community-line"></i> {{ _trans('common.Accounts') }}
                        </a>
                    </li>
                    <li class="list {{ request()->routeIs('customer.settings') ? 'active' : '' }}">
                        <a href="{{ route('customer.settings') }}" class="single">
                            <i class="ri-settings-4-line"></i> {{ _trans('common.Settings') }}
                        </a>
                    </li>
                    @else
                    <li class="list {{ request()->routeIs('customer.verifyAddress') ? 'active' : '' }}">
                        <a href="{{route('customer.verifyAddress')}}" class="single">
                            <i class="ri-map-line"></i> {{ _trans('common.Verify Address') }}
                        </a>
                    </li>

                    @endif
                </ul>
            </div>
        </div>
    </div>
    <!-- End-of Panel Sidebar -->
</div>
