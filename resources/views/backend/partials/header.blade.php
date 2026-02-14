<header class="header">
    <button class="close-toggle sidebar-toggle p-0">
        <img src="{{ asset('backend') }}/assets/images/icons/hammenu-2.svg" alt="" />
    </button>
    <div class="spacing-icon ms-3">
        <div class="header-search tab-none">
            <div class="search-icon">
                <i class="las la-search"></i>
            </div>
            <input type="text" placeholder="Search property" class="search-field ot-input" id="qickSearch" data-bs-toggle="modal" data-bs-target="#exampleModal">

{{--            <input class="search-field ot-input" type="text" placeholder="{{ _trans('common.search_page') }}"--}}
{{--                id="menuSearch" />--}}
            <div id="autoCompleteData" class="d-nones">
            </div>

        </div>
        <div class="header-controls">
            <div class="header-control-item md-none">
                <div class="item-content language-currceny-container">
                    <button class="language-currency-btn d-flex align-items-center mt-0" type="button"
                        id="language_change" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="icon-flag">
                            <i class="{{ @$data['language']->icon_class }} rounded-circle icon"></i>
                        </div>
                        <h6>{{ @$data['language']->name }}</h6>
                    </button>

                    <div class="language-currency-dropdown dropdown-menu dropdown-menu-end top-navbar-dropdown-menu ot-card"
                        aria-labelledby="language_change">

                        <div class="lanuage-currency-">
                            <div class="dropdown-item-list language-list mb-20">
                                <h5>{{ _trans('common.language') }}</h5>
                                <x-language-dropdown />
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="header-control-item">
                <div class="item-content dropdown md-none">
                    <button class="mt-0" onclick="javascript:toggleFullScreen()">
                        <img class="icon" src="{{ asset('backend/assets/images/icons/full-screen.svg') }}"
                            alt="check in" />
                    </button>
                </div>
            </div>
            <div class="header-control-item md-none d-none">
                <div class="item-content">
                    <button class="mt-0" type="button" id="topbar_messages" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img class="icon" src="{{ asset('backend/assets/images/icons/message-notify.svg') }}"
                            alt="notification" />
                    </button>

                    <div class="dropdown-menu dropdown-menu-end topbar-dropdown-menu ot-card pv-32 ph-16"
                        aria-labelledby="topbar_messages">
                        <div class="topbar-dropdown-header">
                            <h1>{{ _trans('common.messages') }}</h1>
                        </div>
                        <div class="srollbar scroll-fix height-350">
                            {{-- Single --}}
                            <div class="topbar-dropdown-content">
                                <a class="dropdown-item topbar-dropdown-item d-flex align-items-start" href="#">
                                    <div class="item-avater">
                                        <img src="{{ asset('backend/assets/images/icons/user1.png') }}"
                                            alt="User" />
                                        <div class="item-badge active"></div>
                                    </div>
                                    <div class="item-content">
                                        <h6 class="message">
                                            {{ _trans('lanlord.Jarret Waelchi') }}
                                            <span>{{ _trans('lanlord.When do you release the coded template') }}...</span>
                                        </h6>
                                    </div>
                                    <div class="item-status">
                                        <span class="time">{{ _trans('lanlord.03:30PM') }} </span>
                                        <span class="status-dot"></span>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="d-flex align-items-center">
                            <a class="topbar-dropdown-footer ot-btn-primary w-100" href="#">
                                {{ _trans('lanlord.See All Messages') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-control-item md-none">
                <div class="item-content">
                    <button class="mt-0" type="button" id="topbar_notifications" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img class="icon" src="{{ asset('backend/assets/images/icons/notification.svg') }}"
                            alt="notification" />
                    </button>

                    <div class="dropdown-menu dropdown-menu-end topbar-dropdown-menu ot-card pv-32 ph-16"
                        aria-labelledby="topbar_notifications">
                        <div class="topbar-dropdown-header">
                            <h1>{{ _trans('common.Notifications') }}</h1>
                        </div>

                        <div class="srollbar scroll-fix height-350">
                            @forelse(notifications() as $notification)
                            <div class="topbar-dropdown-content">
                                <a class="dropdown-item topbar-dropdown-item d-flex flex-column align-items-start gap-1" href="{{ route('notification.show', $notification->id) }}">
                                    <div class="item-content ">
                                        <h5 class="mb-0 notification {{ $notification->is_read ? 'text-muted': 'fw-bolder text-dark'}} ">
                                            {{ $notification->title }}
                                        </h5>
                                        <small class="message text-truncate {{ $notification->is_read ? 'text-muted': 'fw-bolder text-dark'}}">
                                            {{ \Illuminate\Support\Str::of(strip_tags($notification->message))->words(7) }}
                                        </small>
                                    </div>
                                    <div class="item-status">
                                        <small class="time {{ $notification->is_read ? 'text-muted': 'fw-bolder text-dark'}}"> {{ $notification->created_at }} </small>
                                        <span class="status-dot active"></span>
                                    </div>
                                </a>
                            </div>
                            @empty
                                <h4>No data</h4>
                            @endforelse
                        </div>
                        <div class="d-flex align-items-center">
                            <a class="topbar-dropdown-footer ot-btn-primary w-100" href="{{ route('notification.index') }}">
                                {{ _trans('common.See All Notifications') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="header-control-item">
                <div class="item-content">
                    <button class="profile-navigate mt-0 p-0" type="button" id="profile_expand"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="profile-photo user-card">
                             <img src="{{ @globalAsset(Auth::user()->image->path, 'user2.jpg') }}" alt="{{ Auth::user()->name }}">
                        </div>
                        <div class="profile-info md-none">
                            <h6 class="text-white">{{ Auth::user()->name }}</h6>
                            <p class="text-white">{{ @Auth::user()->role->name }}</p>
                        </div>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end profile-expand-dropdown top-navbar-dropdown-menu ot-card"
                        aria-labelledby="profile_expand">
                        <div class="profile-expand-container">
                            <div class="profile-expand-list d-flex flex-column">
                                <a class="profile-expand-item {{ set_menu(['my.profile'], 'active') }}"
                                    href="{{ route('my.profile') }}">
                                    <span>{{ _trans('common.my_profile') }}</span>
                                </a>
                                <a class="profile-expand-item {{ set_menu(['passwordUpdate'], 'active') }}"
                                    href="{{ route('passwordUpdate') }}">
                                    <span>{{ _trans('common.update_password') }}</span>
                                </a>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="profile-expand-item">
                                        <span>
                                            {{ _trans('common.logout') }}</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</header>
