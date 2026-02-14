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
                        <h2 class="title">{{ _trans('Building Permit Details') }}</h2>
                    </div>



                    <!-- profile body form start -->
                    <div class="profile-body-form">
                        <!-- Land Title Number -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Land Title Number') }}</h2>
                                    <p class="paragraph" data-name="land_title_number" data-type="text">
                                        {{ $data['land_title_number'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Building Permit Images -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Building Permit Images') }}</h2>
                                    @if (!empty($data['building_permit_images']))
                                        <div class="preview-image-container">
                                            @foreach (json_decode($data['building_permit_images'], true) as $image)
                                                <div class="image-item">
                                                    <img src="{{ asset('storage/' . $image) }}" alt="Building Permit Image"
                                                        class="img-fluid mb-2">
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <p class="paragraph">{{ _trans('common.No Images Available') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Building Permit Status -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Building Permit Status') }}</h2>
                                    <p class="paragraph" data-name="building_permit_status" data-type="text">
                                        {{ $data['building_permit_status'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Payment Code for Permit -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Payment Code for Permit') }}</h2>
                                    <p class="paragraph" data-name="payment_code_for_permit" data-type="text">
                                        {{ $data['payment_code_for_permit'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Permits -->
                        @php
                            $permitIndex = 1;
                        @endphp

                        @while (isset($data["permit_name_{$permitIndex}"]))
                            <div class="form-item">
                                <div class="d-flex justify-content-between align-content-center">
                                    <div class="align-self-center">
                                        <h2 class="title">{{ _trans('common.Permit Details') }} #{{ $permitIndex }}</h2>
                                        <p class="paragraph" data-name="permit_name_{{ $permitIndex }}" data-type="text">
                                            <strong>{{ _trans('common.Name') }}:</strong>
                                            {{ $data["permit_name_{$permitIndex}"] ?? 'N/A' }}
                                        </p>
                                        <p class="paragraph" data-name="permit_issuer_{{ $permitIndex }}"
                                            data-type="text">
                                            <strong>{{ _trans('common.Issuer') }}:</strong>
                                            {{ $data["permit_issuer_{$permitIndex}"] ?? 'N/A' }}
                                        </p>
                                        <p class="paragraph" data-name="permit_region_{{ $permitIndex }}"
                                            data-type="text">
                                            <strong>{{ _trans('common.Region') }}:</strong>
                                            {{ $data["permit_region_{$permitIndex}"] ?? 'N/A' }}
                                        </p>
                                        <p class="paragraph" data-name="permit_district_{{ $permitIndex }}"
                                            data-type="text">
                                            <strong>{{ _trans('common.District') }}:</strong>
                                            {{ $data["permit_district_{$permitIndex}"] ?? 'N/A' }}
                                        </p>
                                        <p class="paragraph" data-name="permit_purpose_{{ $permitIndex }}"
                                            data-type="text">
                                            <strong>{{ _trans('common.Purpose') }}:</strong>
                                            {{ $data["permit_purpose_{$permitIndex}"] ?? 'N/A' }}
                                        </p>
                                        <p class="paragraph" data-name="permit_issuing_date_{{ $permitIndex }}"
                                            data-type="text">
                                            <strong>{{ _trans('common.Issuing Date') }}:</strong>
                                            {{ $data["permit_issuing_date_{$permitIndex}"] ?? 'N/A' }}
                                        </p>
                                        <p class="paragraph" data-name="permit_expiry_date_{{ $permitIndex }}"
                                            data-type="text">
                                            <strong>{{ _trans('common.Expiry Date') }}:</strong>
                                            {{ $data["permit_expiry_date_{$permitIndex}"] ?? 'N/A' }}
                                        </p>
                                        <p class="paragraph" data-name="permit_cost_{{ $permitIndex }}"
                                            data-type="text">
                                            <strong>{{ _trans('common.Cost') }}:</strong>
                                            {{ $data["permit_cost_{$permitIndex}"] ?? 'N/A' }}
                                        </p>
                                        <p class="paragraph" data-name="payment_code_for_permit_{{ $permitIndex }}"
                                            data-type="text">
                                            <strong>{{ _trans('common.Payment Code') }}:</strong>
                                            {{ $data["payment_code_for_permit_{$permitIndex}"] ?? 'N/A' }}
                                        </p>
                                        <p class="paragraph" data-name="permit_issuing_officer_{{ $permitIndex }}"
                                            data-type="text">
                                            <strong>{{ _trans('common.Issuing Officer') }}:</strong>
                                            {{ $data["permit_issuing_officer_{$permitIndex}"] ?? 'N/A' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @php
                                $permitIndex++;
                            @endphp
                        @endwhile

                    </div>

                    <x-navigation-links :previous="12" :next="14" />
                </div>
                <!-- profile body form end -->
            </div>
            <!-- profile body end -->
        </div>

    </div>
@endsection
