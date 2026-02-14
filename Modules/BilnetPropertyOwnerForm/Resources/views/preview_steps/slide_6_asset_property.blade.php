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
                        <h2 class="title">{{ _trans('Property/Asset Information') }}</h2>
                    </div>


                    <!-- profile body form start -->
                    <div class="profile-body-form">
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Type of Property') }}</h2>
                                    <p class="paragraph" data-name="type_of_propery" data-type="text">
                                        {{ implode(', ', json_decode($data['type_of_propery'] ?? '[]')) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @if (in_array('Bare land', json_decode($data['type_of_propery'])) &&
                                in_array('Building', json_decode($data['type_of_propery'])))
                            <div class="form-item">
                                <div class="d-flex justify-content-between align-content-center">
                                    <div class="align-self-center">
                                        <h2 class="title">{{ _trans('common.Asset Address') }}</h2>
                                        <p class="paragraph" data-name="asset_address" data-type="text">
                                            {{ @$data['asset_address'] ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="form-item">
                                <div class="d-flex justify-content-between align-content-center">
                                    <div class="align-self-center">
                                        <h2 class="title">{{ _trans('common.Asset House Number') }}</h2>
                                        <p class="paragraph" data-name="asset_house_number" data-type="text">
                                            {{ @$data['asset_house_number'] ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="form-item">
                                <div class="d-flex justify-content-between align-content-center">
                                    <div class="align-self-center">
                                        <h2 class="title">{{ _trans('common.Asset Locality') }}</h2>
                                        <p class="paragraph" data-name="asset_locality" data-type="text">
                                            {{ @$data['asset_locality'] ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="form-item">
                                <div class="d-flex justify-content-between align-content-center">
                                    <div class="align-self-center">
                                        <h2 class="title">{{ _trans('common.Asset Town') }}</h2>
                                        <p class="paragraph" data-name="asset_town" data-type="text">
                                            {{ @$data['asset_town'] ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="form-item">
                                <div class="d-flex justify-content-between align-content-center">
                                    <div class="align-self-center">
                                        <h2 class="title">{{ _trans('common.Asset District') }}</h2>
                                        <p class="paragraph" data-name="asset_district" data-type="text">
                                            {{ @$data['asset_district'] ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="form-item">
                                <div class="d-flex justify-content-between align-content-center">
                                    <div class="align-self-center">
                                        <h2 class="title">{{ _trans('common.Property Asset Region') }}</h2>
                                        <p class="paragraph" data-name="property_asset_region" data-type="text">
                                            {{ @$data['property_asset_region'] ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="form-item">
                                <div class="d-flex justify-content-between align-content-center">
                                    <div class="align-self-center">
                                        <h2 class="title">{{ _trans('common.Other Asset Region') }}</h2>
                                        <p class="paragraph" data-name="other_asset_region" data-type="text">
                                            {{ @$data['other_asset_region'] ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="form-item">
                                <div class="d-flex justify-content-between align-content-center">
                                    <div class="align-self-center">
                                        <h2 class="title">{{ _trans('common.Asset Digital Address') }}</h2>
                                        <p class="paragraph" data-name="asset_digital_address" data-type="text">
                                            {{ @$data['asset_digital_address'] ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="form-item">
                                <div class="d-flex justify-content-between align-content-center">
                                    <div class="align-self-center">
                                        <h2 class="title">{{ _trans('common.Asset Longitude') }}</h2>
                                        <p class="paragraph" data-name="asset_longitude" data-type="text">
                                            {{ @$data['asset_longitude'] ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="form-item">
                                <div class="d-flex justify-content-between align-content-center">
                                    <div class="align-self-center">
                                        <h2 class="title">{{ _trans('common.Asset Latitude') }}</h2>
                                        <p class="paragraph" data-name="asset_latitude" data-type="text">
                                            {{ @$data['asset_latitude'] ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="form-item">
                                <div class="d-flex justify-content-between align-content-center">
                                    <div class="align-self-center">
                                        <h2 class="title">{{ _trans('common.Asset PO Box') }}</h2>
                                        <p class="paragraph" data-name="asset_po_box" data-type="text">
                                            {{ @$data['asset_po_box'] ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="form-item">
                                <div class="d-flex justify-content-between align-content-center">
                                    <div class="align-self-center">
                                        <h2 class="title">{{ _trans('common.Asset Site Plan Number') }}</h2>
                                        <p class="paragraph" data-name="asset_site_plan_number" data-type="text">
                                            {{ @$data['asset_site_plan_number'] ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="form-item">
                                <div class="d-flex justify-content-between align-content-center">
                                    <div class="align-self-center">
                                        <h2 class="title">{{ _trans('common.Asset Land Size') }}</h2>
                                        <p class="paragraph" data-name="asset_land_size" data-type="text">
                                            {{ @$data['asset_land_size'] ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="form-item">
                                <div class="d-flex justify-content-between align-content-center">
                                    <div class="align-self-center">
                                        <h2 class="title">{{ _trans('common.Asset Site Plan QR Image') }}</h2>
                                        <p class="paragraph" data-name="assset_site_plan_qr_image" data-type="text">
                                            {{ @$data['assset_site_plan_qr_image'] ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="form-item">
                                <div class="d-flex justify-content-between align-content-center">
                                    <div class="align-self-center">
                                        <h2 class="title">{{ _trans('common.Asset Attach Site Plan') }}</h2>
                                        <p class="paragraph" data-name="assset_attach_site_plan" data-type="text">
                                            {{ @$data['assset_attach_site_plan'] ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="form-item">
                                <div class="d-flex justify-content-between align-content-center">
                                    <div class="align-self-center">
                                        <h2 class="title">{{ _trans('common.Site Plan Attachment') }}</h2>
                                        <div class="preview-image-container">
                                            <div class="image-item">
                                                <img
                                                    src="{{ asset('storage/' . $data['assset_site_plan_qr_image']) }}"alt="">
                                                <span>Site Plan QR Image</span>
                                            </div>
                                            <div class="image-item">
                                                <img
                                                    src="{{ asset('storage/' . $data['assset_attach_site_plan']) }}"alt="">
                                                <span>Attach Site Plan</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Completion Status') }}</h2>
                                    <p class="paragraph" data-name="completion_status" data-type="text">
                                        {{ @$data['completion_status'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <x-navigation-links :previous="5" :next="7" />

                </div>
                <!-- profile body form end -->
            </div>
            <!-- profile body end -->
        </div>

    </div>
@endsection
