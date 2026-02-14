<aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <div class="sidebar-logo">
            <a href="{{ route('dashboard') }}">
                <input type="hidden" name="global_light_logo" id="global_light_logo"
                    value="{{ @globalAsset(setting('light_logo'), '154x38.png') }}" />
                <input type="hidden" name="global_dark_logo" id="global_dark_logo"
                    value="{{ @globalAsset(setting('dark_logo'), '154x38.png') }}" />

                <img id="sidebar_full_logo" class="full-logo setting-image"
                    src="{{ userTheme() == 'default-theme' ? @globalAsset(setting('light_logo'), '154x38.png') : @globalAsset(setting('dark_logo'), '154x38.png') }}"
                    alt="" />

                <img class="half-logo" src="{{ globalAsset(setting('favicon'), '38x38.png') }}" alt="" />
            </a>
        </div>

        <button class="half-expand-toggle sidebar-toggle">
            <img src="{{ asset('backend') }}/assets/images/icons/collapse-arrow.svg" alt="" />
        </button>
        <button class="close-toggle sidebar-toggle">
            <img src="{{ asset('backend') }}/assets/images/icons/collapse-arrow.svg" alt="" />
        </button>
    </div>

    <div class="sidebar-menu srollbar">
        <div class="sidebar-menu-section">


            <!-- parent menu list start  -->
            <ul class="sidebar-dropdown-menu parent-menu-list">
                <li class="sidebar-menu-item {{ set_menu(['dashboard']) }}">
                    <a href="{{ route('dashboard') }}" class="parent-item-content">
                        {{-- <img src="{{ asset('backend') }}/assets/images/icons/notification-status.svg"
                        alt="Dashboard" /> --}}
                        <i class="las la-tachometer-alt"></i>
                        <span class="on-half-expanded">{{ _trans('landlord.Dashboard') }}</span>
                    </a>
                </li>
                @if (hasPermission('order_read'))
                    <li class="sidebar-menu-item">
                        <a class="parent-item-content has-arrow">
                            <i class="las la-city"></i>
                            <span class="on-half-expanded">{{ _trans('common.Orders') }}</span>
                        </a>
                        <ul class="child-menu-list">
                            <li class="sidebar-menu-item {{ set_menu(['orders*']) }}">
                                <a href=" {{ route('orders.index') }}">{{ _trans('landlord.Order List') }}</a>
                            </li>

                        </ul>
                    </li>
                @endif
                @if (hasPermission('mailbox_read'))
                    @include('backend.partials.mailbox_sidebar')
                @endif
                @if (hasPermission('sms_read'))
                    @include('backend.partials.smsbox_sidebar')
                @endif
                @if (hasPermission('user_read') || hasPermission('role_read'))
                    <li class="sidebar-menu-item {{ set_menu(['users*', 'roles*']) }}">
                        <a class="parent-item-content has-arrow">
                            {{-- <img src="{{ asset('backend') }}/assets/images/icons/clipboard.svg" alt="Dashboard" /> --}}
                            <i class="las la-user-tag"></i>
                            <span class="on-half-expanded">{{ _trans('landlord.Users & Roles') }}</span>
                        </a>

                        <!-- second layer child menu list start  -->

                        <ul class="child-menu-list">
                            @if (hasPermission('role_read'))
                                <li class="sidebar-menu-item {{ set_menu(['roles*']) }}">
                                    <a href="{{ route('roles.index') }}">{{ _trans('landlord.Roles') }}</a>
                                </li>
                            @endif
                            @if (hasPermission('user_read'))
                                <li class="sidebar-menu-item {{ set_menu(['users*']) }}">
                                    <a href="{{ route('users.index') }}">{{ _trans('landlord.Users') }}</a>
                                </li>
                            @endif


                        </ul>
                    </li>
                @endif

                @if (hasPermission('appointment_read') || hasPermission('timeslot_read'))
                    <li class="sidebar-menu-item">
                        <a class="parent-item-content has-arrow">
                            <i class="las la-calendar-check"></i>
                            <span class="on-half-expanded">{{ _trans('landlord.Appointment') }}</span>
                        </a>
                        <ul class="child-menu-list">
                            @if (hasPermission('appointment_read'))
                                <li class="sidebar-menu-item {{ set_menu(['backend.appointment.index']) }}">
                                    <a
                                        href=" {{ route('backend.appointment.index') }}">{{ _trans('landlord.Appointment List') }}</a>
                                </li>
                            @endif
                            @if (hasPermission('timeslot_read'))
                                <li class="sidebar-menu-item {{ set_menu(['backend.timeslot.index']) }}">
                                    <a
                                        href="{{ route('backend.timeslot.index') }}">{{ _trans('landlord.Time Slot') }}</a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                @if (hasPermission('profile_read') || hasPermission('profile_update'))
                    <!-- User Profile Layout Start -->
                    <li class="sidebar-menu-item">
                        <a class="parent-item-content has-arrow">
                            <i class="las la-user-circle"></i>
                            <span class="on-half-expanded">{{ _trans('landlord.Profile') }}</span>
                        </a>
                        <ul class="child-menu-list">
                            @if (hasPermission('profile_read'))
                                <li class="sidebar-menu-item {{ set_menu(['my.profile']) }}">
                                    <a href=" {{ route('my.profile') }}">{{ _trans('landlord.My Profile') }}</a>
                                </li>
                            @endif
                            @if (hasPermission('profile_update'))
                                <li class="sidebar-menu-item {{ set_menu(['my.profile.edit']) }}">
                                    <a
                                        href="{{ route('my.profile.edit') }}">{{ _trans('landlord.Edit My Profile') }}</a>
                                </li>
                            @endif
                            @if (hasPermission('profile_update'))
                                <li class="sidebar-menu-item {{ set_menu(['passwordUpdate']) }}">
                                    <a
                                        href="{{ route('passwordUpdate') }}">{{ _trans('landlord.Update Password') }}</a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                <!-- User Profile Layout End -->

                <!-- Committee layout start -->
                @if (hasPermission('committee_read'))
                    <li class="sidebar-menu-item {{ set_menu(['committees*']) }}">
                        <a href="{{ route('committees.index') }}" class="parent-item-content">
                            <i class="las la-users"></i>
                            <span class="on-half-expanded">{{ _trans('landlord.Committee') }}</span>
                        </a>
                    </li>
                @endif
                @if (hasPermission('landlord_read'))
                    <li class="sidebar-menu-item {{ set_menu(['landlord*']) }}">
                        <a href="{{ route('landlord.index') }}" class="parent-item-content">
                            <i class="las la-users"></i>
                            <span class="on-half-expanded">{{ _trans('landlord.Landlord') }}</span>
                        </a>
                    </li>
                @endif

                @if (hasPermission('tenant_read'))
                    <li class="sidebar-menu-item {{ set_menu(['tenants*']) }}">
                        <a href="{{ route('tenants.index') }}" class="parent-item-content">
                            <i class="las la-users"></i>
                            <span class="on-half-expanded">{{ _trans('landlord.Tenant') }}</span>
                        </a>
                    </li>
                @endif

                @if (hasPermission('rental_read'))
                    <li class="sidebar-menu-item {{ set_menu(['rental*']) }}">
                        <a href="{{ route('rental.index') }}" class="parent-item-content">
                            <i class="las la-users"></i>
                            <span class="on-half-expanded">{{ _trans('landlord.Rental') }}</span>
                        </a>
                    </li>
                @endif

                <!-- Language layout start -->
                @if (hasPermission('language_read'))
                    <li class="sidebar-menu-item {{ set_menu(['languages*']) }}">
                        <a href="{{ route('languages.index') }}" class="parent-item-content">
                            <i class="las la-language"></i>
                            <span class="on-half-expanded">{{ _trans('landlord.Language') }}</span>
                        </a>
                    </li>
                @endif
                <!-- Language layout end -->


                @if (hasPermission('account_read') ||
                        hasPermission('account_category_read') ||
                        hasPermission('payment_read') ||
                        hasPermission('income_read') ||
                        hasPermission('expense_read'))
                    <li class="sidebar-menu-item">
                        <a class="parent-item-content has-arrow">
                            <i class="las la-city"></i>
                            <span class="on-half-expanded">{{ _trans('landlord.Account') }}</span>
                        </a>
                        <ul class="child-menu-list">
                            @if (hasPermission('account_category_read'))
                                <li class="sidebar-menu-item {{ set_menu(['account-category*']) }}">
                                    <a href="{{ route('account_category.index') }}">
                                        {{ _trans('landlord.Category') }}
                                    </a>
                                </li>
                            @endif
                            @if (hasPermission('account_read'))
                                <li class="sidebar-menu-item {{ set_menu(['account']) }}">
                                    <a href="{{ route('account.index') }}">
                                        {{ _trans('landlord.Account List') }}
                                    </a>
                                </li>
                            @endif
                            @if (hasPermission('payment_read'))
                                <li class="sidebar-menu-item {{ set_menu(['account/payment']) }}">
                                    <a href="{{ route('account.payment') }}">
                                        {{ _trans('landlord.Payment') }}
                                    </a>
                                </li>
                            @endif
                            @if (hasPermission('income_read'))
                                <li class="sidebar-menu-item {{ set_menu(['income']) }}">
                                    <a href="{{ route('income.index') }}">
                                        {{ _trans('landlord.Income') }}
                                    </a>
                                </li>
                            @endif
                            @if (hasPermission('expense_read'))
                                <li class="sidebar-menu-item {{ set_menu(['expense']) }}">
                                    <a href="{{ route('expense.index') }}">
                                        {{ _trans('landlord.Expenses') }}
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif

                @if (hasPermission('bill_read') || hasPermission('bill_create'))
                    <li class="sidebar-menu-item">
                        <a class="parent-item-content has-arrow">
                            <i class="las la-receipt"></i>
                            <span class="on-half-expanded">{{ _trans('landlord.Managing Bill') }}</span>
                        </a>
                        <ul class="child-menu-list">
                            @if (hasPermission('bill_read'))
                                <li class="sidebar-menu-item {{ set_menu(['bill']) }}">
                                    <a href="{{ route('bill.index') }}">
                                        {{ _trans('landlord.Bill List') }}
                                    </a>
                                </li>
                            @endif
                            @if (hasPermission('bill_create'))
                                <li class="sidebar-menu-item {{ set_menu(['bill/create']) }}">
                                    <a href="{{ route('bill.create') }}">
                                        {{ _trans('landlord.Generate Bill') }}
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif

                <!-- Category layout end -->

                <!-- Category layout start -->
                @if (hasPermission('property_read') || hasPermission('property_advertisement_read'))
                    <li class="sidebar-menu-item">
                        <a class="parent-item-content has-arrow">
                            <i class="las la-building"></i>
                            <span class="on-half-expanded">{{ _trans('common.Property') }}</span>
                        </a>
                        <ul class="child-menu-list">
                            <li class="sidebar-menu-item {{ set_menu(['properties*']) }}">
                                <a href=" {{ route('properties.index') }}">{{ _trans('landlord.Property') }}</a>
                            </li>
                            @if (hasPermission('property_category_read'))
                                <li class="sidebar-menu-item {{ set_menu(['property/categories*']) }}">
                                    <a
                                        href=" {{ route('properties.categories.index') }}">{{ _trans('landlord.Property Category') }}</a>
                                </li>
                            @endif
                            @if (hasPermission('property_facility_type_read'))
                                <li class="sidebar-menu-item {{ set_menu(['property/facility-types']) }}">
                                    <a
                                        href=" {{ route('properties.facilityType.index') }}">{{ _trans('landlord.Property Facility Type') }}</a>
                                </li>
                            @endif
                            @if (hasPermission('property_advertisement_read'))
                                <li class="sidebar-menu-item {{ set_menu(['advertisements*']) }}">
                                    <a
                                        href=" {{ route('advertisements.index') }}">{{ _trans('landlord.Advertisements') }}</a>
                                </li>
                            @endif

                        </ul>
                    </li>
                @endif

                @if (hasPermission('tenant_report') || hasPermission('room_report') || hasPermission('payment_report'))
                    <li class="sidebar-menu-item">
                        <a class="parent-item-content has-arrow">
                            <i class="las la-chart-area"></i>
                            <span class="on-half-expanded">{{ _trans('common.Reports') }}</span>
                        </a>
                        <ul class="child-menu-list">
                            @if (hasPermission('tenant_report'))
                                <li class="sidebar-menu-item {{ set_menu(['report/tenant']) }}">
                                    <a
                                        href=" {{ route('report.tenant') }}">{{ _trans('landlord.Tenant Report') }}</a>
                                </li>
                            @endif
                            @if (hasPermission('room_report'))
                                <li class="sidebar-menu-item {{ set_menu(['report/room']) }}">
                                    <a href=" {{ route('report.room') }}">{{ _trans('landlord.Room Report') }}</a>
                                </li>
                            @endif
                            @if (hasPermission('tenant_report'))
                                <li class="sidebar-menu-item {{ set_menu(['report/apartment']) }}">
                                    <a href=" {{ route('report.apartment') }}">{{ _trans('landlord.Apartments Report') }}
                                    </a>
                                </li>
                            @endif
                            @if (hasPermission('payment_report'))
                                <li class="sidebar-menu-item {{ set_menu(['report/payment']) }}">
                                    <a
                                        href=" {{ route('report.payment') }}">{{ _trans('landlord.Payment Report') }}</a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif


                <!-- Category layout end -->

                <!-- Blog Layout Start -->
                @if (hasPermission('blogs_read'))
                    <li class="sidebar-menu-item">
                        <a class="parent-item-content has-arrow">
                            <i class="lab la-blogger"></i>
                            <span class="on-half-expanded">{{ _trans('landlord.Blog') }}</span>
                        </a>
                        <ul class="child-menu-list">
                            <li
                                class="sidebar-menu-item {{ set_menu(['blogs.category.index']) }} {{ set_menu(['blogs.category.create']) }} {{ set_menu(['blogs.category.edit']) }}">
                                <a href="{{ route('blogs.category.index') }}">{{ _trans('landlord.Category') }}</a>
                            </li>
                            <li
                                class="sidebar-menu-item {{ set_menu(['blogs.index']) }} {{ set_menu(['blogs.category.create']) }} {{ set_menu(['blogs.edit']) }}">
                                <a href=" {{ route('blogs.index') }}">{{ _trans('common.blog') }}</a>
                            </li>

                            <li
                                class="sidebar-menu-item {{ set_menu(['case_studies.index']) }} {{ set_menu(['case_studies.create']) }} {{ set_menu(['blogs.edit']) }}">
                                <a href=" {{ route('case_studies.index') }}">{{ _trans('common.case_study') }}</a>
                            </li>

                        </ul>
                    </li>
                @endif

                <!-- Category layout start -->

                <!-- Category layout end -->

                @if (hasPermission('section_titles_update'))
                    <!-- Home Section layout start -->
                    <li class="sidebar-menu-item">
                        <a class="parent-item-content has-arrow">
                            <i class="las la-user-circle"></i>
                            <span class="on-half-expanded">{{ _trans('landlord.Home Page') }}</span>
                        </a>
                        <ul class="child-menu-list">
                            <li class="sidebar-menu-item {{ set_menu(['home.section-titles.index']) }}">
                                <a
                                    href="{{ route('home.section-titles.index') }}">{{ _trans('landlord.Section Titles') }}</a>
                            </li>
                            <li class="sidebar-menu-item {{ set_menu(['hero-sections*']) }}">
                                <a
                                    href=" {{ route('hero-sections.index') }}">{{ _trans('landlord.Hero Section') }}</a>
                            </li>
                            <li class="sidebar-menu-item {{ set_menu(['homepage/faqs*']) }}">
                                <a href=" {{ route('faq.index') }}">{{ _trans('landlord.Faq') }}</a>
                            </li>
                            <li
                                class="sidebar-menu-item {{ set_menu(['home.partners.index']) }}{{ set_menu(['home.partners.create']) }}{{ set_menu(['home.partners.edit']) }}">
                                <a href="{{ route('home.partners.index') }}">{{ _trans('landlord.Partners') }}</a>
                            </li>
                            <li class="sidebar-menu-item {{ set_menu(['business-models*']) }}">
                                <a
                                    href="{{ route('business-models.index') }}">{{ _trans('landlord.Business Model') }}</a>
                            </li>
                            <li class="sidebar-menu-item {{ set_menu(['features*']) }}">
                                <a href="{{ route('features.index') }}">{{ _trans('landlord.Features') }}</a>
                            </li>
                            <li class="sidebar-menu-item {{ set_menu(['how-it-works*']) }}">
                                <a
                                    href="{{ route('how-it-works.index') }}">{{ _trans('landlord.How It Works') }}</a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a
                                    href="{{ route('home.section-titles.index') }}#download_app">{{ _trans('landlord.Download Apps') }}</a>
                            </li>
                            <li class="sidebar-menu-item {{ set_menu(['testimonials*']) }}">
                                <a
                                    href="{{ route('testimonials.index') }}">{{ _trans('landlord.Testimonial') }}</a>
                            </li>
                            <li class="sidebar-menu-item {{ set_menu(['leaderships*']) }}">
                                <a href="{{ route('leaderships.index') }}">{{ _trans('landlord.Leaderships') }}</a>
                            </li>
                        </ul>
                    </li>
                    <!-- Home Section layout end -->
                @endif
                @if (hasPermission('contact_read'))
                    <!-- Home Section layout start -->
                    <li class="sidebar-menu-item">
                        <a class="parent-item-content has-arrow">
                            <i class="las la-id-card"></i>
                            <span class="on-half-expanded">{{ _trans('landlord.contact Us') }}</span>
                        </a>
                        <ul class="child-menu-list">
                            <li class="sidebar-menu-item {{ set_menu(['contact.index']) }}">
                                <a href="{{ route('contact.index') }}">{{ _trans('landlord.Get in Touch') }}</a>
                            </li>
                        </ul>
                    </li>
                    <!-- Home Section layout end -->
                @endif

                @if (hasPermission('about_update'))
                    <!-- Home Section layout start -->
                    <li class="sidebar-menu-item">
                        <a class="parent-item-content has-arrow">
                            <i class="las la-id-card"></i>
                            <span class="on-half-expanded">{{ _trans('landlord.About Us') }}</span>
                        </a>
                        <ul class="child-menu-list">
                            <li class="sidebar-menu-item {{ set_menu(['contact.index']) }}">
                                <a
                                    href="{{ route('about.section-titles.index') }}">{{ _trans('landlord.About') }}</a>
                            </li>
                        </ul>
                    </li>
                    <!-- Home Section layout end -->
                @endif

                @if (hasPermission('frontend_pages_list') ||
                        hasPermission('frontend_pages_edit') ||
                        hasPermission('frontend_pages_delete'))
                    <li class="sidebar-menu-item {{ set_menu(['frontend_pages*']) }}">
                        <a href="{{ route('frontend_pages.index') }}" class="parent-item-content">
                            <i class="las la-file"></i>
                            <span class="on-half-expanded">{{ _trans('landlord.Pages') }}</span>
                        </a>
                    </li>
                @endif



                <!-- SMS Alert Logs layout start -->
                <li class="sidebar-menu-item {{ set_menu(['sms-alert-logs*']) }}">
                    <a href="{{ route('sms-alert-logs.index') }}" class="parent-item-content">
                        <i class="las la-sms"></i>
                        <span class="on-half-expanded">{{ _trans('landlord.SMS Alert Log') }}</span>
                    </a>
                </li>
                <!-- SMS Alert Logs layout end -->

                <!-- Settings layout start -->
                @if (hasPermission('general_settings_read') ||
                        hasPermission('storage_settings_read') ||
                        hasPermission('recaptcha_settings_read') ||
                        hasPermission('email_settings_read'))
                    <li class="sidebar-menu-item {{ set_menu(['setting*']) }}">
                        <a href="#" class="parent-item-content has-arrow">
                            <i class="las la-cog"></i>
                            <span class="on-half-expanded"> {{ _trans('landlord.Settings') }}</span>
                        </a>

                        <!-- second layer child menu list start  -->
                        <ul class="child-menu-list">
                            @if (hasPermission('general_settings_read'))
                                <li class="sidebar-menu-item {{ set_menu(['settings.general-settings']) }}">
                                    <a
                                        href="{{ route('settings.general-settings') }}">{{ _trans('landlord.General Settings') }}</a>
                                </li>
                            @endif
                            <li class="sidebar-menu-item {{ set_menu(['settings.billsetup']) }}">
                                <a href="{{ route('settings.billsetup') }}">{{ _trans('landlord.Bill Setup') }}</a>
                            </li>
                            @if (hasPermission('storage_settings_read'))
                                <li class="sidebar-menu-item {{ set_menu(['settings.storagesetting']) }}">
                                    <a
                                        href="{{ route('settings.storagesetting') }}">{{ _trans('landlord.Storage Settings') }}</a>
                                </li>
                            @endif
                            @if (hasPermission('db_backup_read'))
                                <li
                                    class="sidebar-menu-item sidebar-menu-item {{ set_menu(['settings.database-backups']) }}">
                                    <a href="{{ route('settings.database-backups') }}">
                                        <span
                                            class="on-half-expanded">{{ _trans('landlord.Database Backup') }}</span>
                                    </a>
                                </li>
                            @endif

                            <li class="sidebar-menu-item sidebar-menu-item {{ set_menu(['countries*']) }}">
                                <a href="{{ route('countries.index') }}">
                                    <span class="on-half-expanded">{{ _trans('landlord.Country') }}</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item sidebar-menu-item {{ set_menu(['states*']) }}">
                                <a href="{{ route('states.index') }}">
                                    <span class="on-half-expanded">{{ _trans('landlord.State') }}</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item sidebar-menu-item {{ set_menu(['cities*']) }}">
                                <a href="{{ route('cities.index') }}">
                                    <span class="on-half-expanded">{{ _trans('landlord.City') }}</span>
                                </a>
                            </li>

                            @if (hasPermission('recaptcha_settings_read'))
                                <li class="sidebar-menu-item {{ set_menu(['settings.recaptcha-setting']) }}">
                                    <a
                                        href="{{ route('settings.recaptcha-setting') }}">{{ _trans('landlord.Recaptcha Settings') }}</a>
                                </li>
                            @endif

                            @if (hasPermission('email_settings_read'))
                                <li class="sidebar-menu-item {{ set_menu(['settings.mail-setting']) }}">
                                    <a
                                        href="{{ route('settings.mail-setting') }}">{{ _trans('landlord.Email Settings') }}</a>
                                </li>
                            @endif

                            <li class="sidebar-menu-item {{ set_menu(['settings.mail-setting']) }}">
                                <a
                                    href="{{ route('settings.payment-setting') }}">{{ _trans('landlord.Payment Settings') }}</a>
                            </li>
                            <li class="sidebar-menu-item {{ set_menu(['settings.sms-setting']) }}">
                                <a
                                    href="{{ route('settings.sms-setting') }}">{{ _trans('landlord.SMS Settings') }}</a>
                            </li>
                        </ul>
                        <!-- second layer child menu list end  -->
                    </li>
                @endif
            </ul>
        </div>

    </div>
</aside>
