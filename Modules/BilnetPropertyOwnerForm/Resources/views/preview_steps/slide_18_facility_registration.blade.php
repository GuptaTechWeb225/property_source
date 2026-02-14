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

                @include('bilnetpropertyownerform::preview_steps.profile_menu')
                <!-- profile menu end -->

                <!-- profile body start -->
                <div class="profile-body">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="title">{{ _trans('Facility Registration') }}</h2>
                    </div>

                    <!-- profile body form start -->
                    <div class="profile-body-form">

                        <!-- Facility Name -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Facility Name') }}</h2>
                                    <p class="paragraph" data-name="facility_name" data-type="text">
                                        {{ @$data['facility_name'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Facility Type -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Facility Type') }}</h2>
                                    <p class="paragraph" data-name="facility_type" data-type="text">
                                        {{ @$data['facility_type'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Facility Make -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Facility Make') }}</h2>
                                    <p class="paragraph" data-name="facility_make" data-type="text">
                                        {{ @$data['facility_make'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Facility Model -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Facility Model') }}</h2>
                                    <p class="paragraph" data-name="facility_model" data-type="text">
                                        {{ @$data['facility_model'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Facility Serial Number -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Facility Serial Number') }}</h2>
                                    <p class="paragraph" data-name="facility_serial_number" data-type="text">
                                        {{ @$data['facility_serial_number'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Facility Manufacturing Date -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Facility Manufacturing Date') }}</h2>
                                    <p class="paragraph" data-name="facility_manufacturing_date" data-type="text">
                                        {{ @$data['facility_manufacturing_date'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Facility Expiry Date -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Facility Expiry Date') }}</h2>
                                    <p class="paragraph" data-name="facility_expiry_date" data-type="text">
                                        {{ @$data['facility_expiry_date'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Facility Media File -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Facility Media File') }}</h2>
                                    <div class="preview-image-container">
                                        <div class="image-item">
                                            <img src="{{ asset('storage/' . @$data['facility_media_file']) }}"
                                                alt="Facility Media" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Serial Number of Facilities -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Serial Number of Facilities') }}</h2>
                                    <p class="paragraph" data-name="serial_number_of_facilities" data-type="text">
                                        {{ @$data['serial_number_of_facilities'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Receipt Number of Facility -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Receipt Number of Facility') }}</h2>
                                    <p class="paragraph" data-name="receipt_number_of_facility" data-type="text">
                                        {{ @$data['receipt_number_of_facility'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <x-navigation-links :previous="17" :next="19" />

                </div>
                <!-- profile body form end -->
            </div>
            <!-- profile body end -->
        </div>

    </div>
@endsection
