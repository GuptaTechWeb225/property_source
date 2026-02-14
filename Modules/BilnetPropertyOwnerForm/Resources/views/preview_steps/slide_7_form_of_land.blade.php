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
                        <h2 class="title">{{ _trans('Land Details') }}</h2>
                    </div>

                    <div class="profile-body-form">
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Plan For') }}</h2>
                                    <p class="paragraph" data-name="plan_for" data-type="text">
                                        {{ $data['plan_for'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Scale') }}</h2>
                                    <p class="paragraph" data-name="scale" data-type="text">{{ $data['scale'] ?? 'N/A' }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Area') }}</h2>
                                    <p class="paragraph" data-name="area" data-type="text">{{ $data['area'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Locality') }}</h2>
                                    <p class="paragraph" data-name="locality" data-type="text">
                                        {{ $data['locality'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Plan For District') }}</h2>
                                    <p class="paragraph" data-name="plan_for_district" data-type="text">
                                        {{ $data['plan_for_district'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Plan For Region') }}</h2>
                                    <p class="paragraph" data-name="plan_for_region" data-type="text">
                                        {{ $data['plan_for_region'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Surveyor Name') }}</h2>
                                    <p class="paragraph" data-name="surveyor_name" data-type="text">
                                        {{ $data['surveyor_name'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Surveyor Date') }}</h2>
                                    <p class="paragraph" data-name="surveyor_date" data-type="text">
                                        {{ $data['surveyor_date'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Property Asset Signature') }}</h2>
                                    <div class="preview-image-container">
                                        @if ($data['property_asset_signature'])
                                        <div class="image-item">
                                            <img src="{{ asset('storage/' . @$data['property_asset_signature']) }}"
                                                alt="Property Asset Signature">
                                        </div>
                                        @else
                                            <span>N/A</span>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.License Number') }}</h2>
                                    <p class="paragraph" data-name="license_number" data-type="text">
                                        {{ $data['license_number'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Ghana Card') }}</h2>
                                    <p class="paragraph" data-name="ghana_card" data-type="text">
                                        {{ $data['ghana_card'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        @for ($i = 1; $i <= 5; $i++)
                            @php
                                $pillarNumber = "pillar_number_$i";
                                $pillarAddress = "pillar_address_$i";
                                $pillarImage = "pillar_image_$i";
                            @endphp

                            @if (isset($data[$pillarNumber]) && isset($data[$pillarAddress]))
                                <h2 class="title">{{ _trans("common.Pillar $i") }}</h2>

                                <div class="form-item ms-2">
                                    <div class="d-flex justify-content-between align-content-center">
                                        <div class="align-self-center">
                                            <h5>{{ _trans('common.Number') }}</h5>
                                            <p class="paragraph" data-name="{{ $pillarNumber }}" data-type="text">
                                                {{ $data[$pillarNumber] ?? 'N/A' }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-item ms-2">
                                    <div class="d-flex justify-content-between align-content-center">
                                        <div class="align-self-center">
                                            <h5>{{ _trans('common.Address') }}</h5>
                                            <p class="paragraph" data-name="{{ $pillarAddress }}" data-type="text">
                                                {{ $data[$pillarAddress] ?? 'N/A' }}</p>
                                        </div>
                                    </div>
                                </div>

                                @if (isset($data[$pillarImage]) && is_array(json_decode($data[$pillarImage])))
                                    <div class="form-item ms-2">
                                        <div class="d-flex justify-content-between align-content-center">
                                            <div class="align-self-center">
                                                <h2 class="title">{{ _trans('common.Images') }}</h2>
                                                <div class="preview-image-container">
                                                    @foreach (json_decode($data[$pillarImage]) as $image)
                                                        <div class="image-item">
                                                            <img src="{{ asset('storage/' . $image) }}"
                                                                alt="Pillar Image">
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        @endfor

                    </div>

                    <x-navigation-links :previous="6" :next="8" />

                </div>
                <!-- profile body form end -->
            </div>
            <!-- profile body end -->
        </div>

    </div>
@endsection
