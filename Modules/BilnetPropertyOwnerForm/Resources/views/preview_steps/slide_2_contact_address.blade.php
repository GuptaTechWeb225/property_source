@extends('backend.master')

@section('title')
{{ @$title }}
@endsection



@section('content')
    <div class="page-content">
        <div class="profile-content">
            <div class="d-flex flex-column flex-lg-row gap-4 gap-lg-0">
                <!-- profile menu mobile start -->
                <div class="profile-menu-mobile">
                    <button class="btn-menu-mobile" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasWithBothOptionsMenuMobile"
                        aria-controls="offcanvasWithBothOptionsMenuMobile">
                        <span class="icon"><i class="fa-solid fa-bars"></i></span>
                    </button>

                    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1"
                        id="offcanvasWithBothOptionsMenuMobile">
                        <div class="offcanvas-header">
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
                                <span class="icon"><i class="fa-solid fa-xmark"></i></span>
                            </button>
                        </div>
                        <div class="offcanvas-body">
                            <!-- profile menu start -->
                            <div class="profile-menu">
                                <!-- profile menu head start -->
                                <div class="profile-menu-head">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <img class="img-fluid rounded-circle"
                                                src="{{ @globalAsset(Auth::user()->image->path) }}"
                                                alt="{{ Auth::user()->name }}">
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="body">
                                                <h2 class="title">{{ _trans('common.robert_downey') }}</h2>
                                                <p class="paragraph">{{ _trans('common.ui_ux_designer') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- profile menu head end -->

                                <!-- profile menu body start -->
                                <div class="profile-menu-body">
                                    <nav>
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link active" aria-current="page"
                                                    href="./profile">{{ _trans('common.My Profile') }}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link"
                                                    href="./password/update">{{ _trans('common.Update PAssword') }}</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                <!-- profile menu body end -->
                            </div>
                            <!-- profile menu end -->
                        </div>
                    </div>
                </div>
                <!-- profile menu mobile end -->

                <!-- profile menu start -->
                @include("bilnetpropertyownerform::preview_steps.profile_menu")
                <!-- profile menu end -->
                {{-- @dd($data) --}}
                <!-- profile body start -->
                <div class="profile-body">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="title">{{ _trans('Contact Address') }}</h2>
                    </div>

                    <!-- profile body form start -->
                    <div class="profile-body-form">
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.House Number') }}</h2>
                                    <p class="paragraph" data-name="house_number" data-type="text">
                                        {{ @$data['house_number'] }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Digital Address') }}</h2>
                                    <p class="paragraph" data-name="digital_address" data-type="text">
                                        {{ @$data['digital_address'] }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Region') }}</h2>
                                    <p class="paragraph" data-name="region" data-type="text">
                                        {{ @$data['region'] == 'other' ? @$data['other_region'] : $data['region'] }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Municipal District') }}</h2>
                                    <p class="paragraph" data-name="municipal_district" data-type="text">
                                        {{ @$data['municipal_district'] }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Town') }}</h2>
                                    <p class="paragraph" data-name="town" data-type="text">{{ @$data['town'] }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Locality') }}</h2>
                                    <p class="paragraph" data-name="locality" data-type="text">{{ @$data['locality'] }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Street Name') }}</h2>
                                    <p class="paragraph" data-name="street_name" data-type="text">
                                        {{ @$data['street_name'] }}</p>
                                </div>
                            </div>
                        </div>

                        @if ($data['digital_address_qr_front'])
                            <div class="form-item">
                                <div class="d-flex justify-content-between align-content-center">
                                    <div class="align-self-center">
                                        <h2 class="title">{{ _trans('common.Address Image') }}</h2>
                                        <div class="preview-image-container">
                                            <div class="image-item">
                                                <img src="{{ asset('storage/' . $data['digital_address_qr_front']) }}"
                                                    alt="">
                                                <span>Digital Address QR Image</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif


                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Digital Address QR Front') }}</h2>
                                    <p class="paragraph" data-name="digital_address_qr_front" data-type="text">
                                        {{ @$data['digital_address_qr_front'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Tribe') }}</h2>
                                    <p class="paragraph" data-name="tribe" data-type="text">
                                        {{ @$data['tribe'] == 'other' ? @$data['other_tribe'] : $data['tribe'] }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Home Town') }}</h2>
                                    <p class="paragraph" data-name="home_town" data-type="text">{{ @$data['home_town'] }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Hair Color') }}</h2>
                                    <p class="paragraph" data-name="hair_color" data-type="text">
                                        {{ @$data['hair_color'] == 'other' ? @$data['hair_color_specify'] : @$data['hair_color'] }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Disability') }}</h2>
                                    <p class="paragraph" data-name="disability" data-type="text">
                                        {{ @$data['disability'] == 'other' ? @$data['disability_specify'] : $data['disability'] }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Phone') }}</h2>
                                    <p class="paragraph" data-name="phone" data-type="text">{{ @$data['phone'] }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Email') }}</h2>
                                    <p class="paragraph" data-name="email" data-type="text">{{ @$data['email'] }}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <x-navigation-links :previous="1" :next="3" />
                </div>
                <!-- profile body form end -->
            </div>
            <!-- profile body end -->
        </div>

    </div>
@endsection
