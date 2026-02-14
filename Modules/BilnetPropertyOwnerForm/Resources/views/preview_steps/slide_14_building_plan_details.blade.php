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
                        <h2 class="title">{{ _trans('Building Plan Details') }}</h2>
                    </div>


                    <!-- profile body form start -->
                    <div class="profile-body-form">
                        <!-- Building Plan Images -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Building Plan Images') }}</h2>
                                    @if (!empty(@$data['building_plan_images']))
                                        <div class="preview-image-container">
                                            @foreach (json_decode(@$data['building_plan_images'], true) as $image)
                                                <div class="image-item">
                                                    <img src="{{ asset('storage/' . $image) }}" alt="Building Plan Image"
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

                        <!-- Storey -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Storey') }}</h2>
                                    <p class="paragraph" data-name="storey" data-type="text">{{ @$data['storey'] ?? 'N/A' }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- BOQ Images -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.BOQ Images') }}</h2>
                                    @if (!empty(@$data['boq_images']))
                                        <div class="preview-image-container">
                                            @foreach (json_decode(@$data['boq_images'], true) as $image)
                                                <div class="image-item">
                                                    <img src="{{ asset('storage/' . $image) }}" alt="BOQ Image"
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

                        <!-- Current Building Status -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Current Building Status') }}</h2>
                                    <p class="paragraph" data-name="current_building_status" data-type="text">
                                        {{ @$data['current_building_status'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Architect Details -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title mb-3">{{ _trans('common.Architect Details') }}</h2>
                                    <p class="paragraph"><strong>{{ _trans('common.First Name') }}:</strong>
                                        {{ @$data['architect_first_name'] ?? 'N/A' }}</p>
                                    <p class="paragraph"><strong>{{ _trans('common.Last Name') }}:</strong>
                                        {{ @$data['architect_last_name'] ?? 'N/A' }}</p>
                                    <p class="paragraph"><strong>{{ _trans('common.Other Name') }}:</strong>
                                        {{ @$data['architect_other_name'] ?? 'N/A' }}</p>
                                    <p class="paragraph"><strong>{{ _trans('common.ID Number') }}:</strong>
                                        {{ @$data['architect_id_number'] ?? 'N/A' }}</p>
                                    <p class="paragraph"><strong>{{ _trans('common.Phone') }}:</strong>
                                        {{ @$data['architech_phone'] ?? 'N/A' }}</p>
                                    <p class="paragraph"><strong>{{ _trans('common.Email') }}:</strong>
                                        {{ @$data['architech_email'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Exterior Colors -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Exterior Colors') }}</h2>
                                    @if (!empty(@$data['exteriorColors']))
                                        <ul>
                                            @foreach (json_decode(@$data['exteriorColors'], true) as $color)
                                                <li>{{ $color }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p class="paragraph">{{ _trans('common.No Colors Specified') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Interior Colors -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Interior Colors') }}</h2>
                                    @if (!empty(@$data['interiorColors']))
                                        <ul>
                                            @foreach (json_decode(@$data['interiorColors'], true) as $color)
                                                <li>{{ $color }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p class="paragraph">{{ _trans('common.No Colors Specified') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Electricity Supply -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Electricity Supply') }}</h2>
                                    @if (!empty(@$data['electricitySupply']))
                                        <ul>
                                            @foreach (json_decode(@$data['electricitySupply'], true) as $supply)
                                                <li>{{ $supply }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p class="paragraph">{{ _trans('common.No Electricity Supply Details') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Electricity Meter -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Electricity Meter') }}</h2>
                                    @if (!empty(@$data['electricityMeter']))
                                        <ul>
                                            @foreach (json_decode(@$data['electricityMeter'], true) as $meter)
                                                <li>{{ $meter }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p class="paragraph">{{ _trans('common.No Meter Details') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Water Supply -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Water Supply') }}</h2>
                                    @if (!empty(@$data['waterSupply']))
                                        <ul>
                                            @foreach (json_decode(@$data['waterSupply'], true) as $supply)
                                                <li>{{ $supply }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p class="paragraph">{{ _trans('common.No Water Supply Details') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Water Meter -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Water Meter') }}</h2>
                                    @if (!empty(@$data['waterMeter']))
                                        <ul>
                                            @foreach (json_decode(@$data['waterMeter'], true) as $meter)
                                                <li>{{ $meter }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p class="paragraph">{{ _trans('common.No Meter Details') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Gas Supply -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Gas Supply') }}</h2>
                                    @if (!empty(@$data['gasSupply']))
                                        <ul>
                                            @foreach (json_decode(@$data['gasSupply'], true) as $supply)
                                                <li>{{ $supply }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p class="paragraph">{{ _trans('common.No Gas Supply Details') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Gas Meter -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Gas Meter') }}</h2>
                                    @if (!empty(@$data['gasMeter']))
                                        <ul>
                                            @foreach (json_decode(@$data['gasMeter'], true) as $meter)
                                                <li>{{ $meter }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p class="paragraph">{{ _trans('common.No Meter Details') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>

                    <x-navigation-links :previous="13" :next="15" />

                </div>
                <!-- profile body form end -->
            </div>
            <!-- profile body end -->
        </div>

    </div>
@endsection
