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
                        <h2 class="title">{{ _trans('Building Plan Details (Continued)') }}</h2>
                    </div>

                    <!-- profile body form start -->
                    <div class="profile-body-form">
                        <!-- Sanitation Type -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Sanitation Type') }}</h2>
                                    <p class="paragraph" data-name="sanitation_type" data-type="text">
                                        {{ @$data['sanitation_type'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Sanitation Other -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Sanitation Other') }}</h2>
                                    <p class="paragraph" data-name="sanitation_other" data-type="text">
                                        {{ @$data['sanitation_other'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Sanitation Trash Bin Number -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Sanitation Trash Bin Number') }}</h2>
                                    <p class="paragraph" data-name="sanitation_trash_bin_number" data-type="text">
                                        {{ @$data['sanitation_trash_bin_number'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Sanitation QR Code -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Sanitation QR Code') }}</h2>
                                    @if (!empty(@$data['sanitation_qr_code']))
                                        <div class="preview-image-container">
                                            @foreach (json_decode(@$data['sanitation_qr_code'], true) as $image)
                                                <div class="image-item">
                                                    <img src="{{ asset('storage/' . $image) }}" alt="Sanitation QR Code"
                                                        class="img-fluid mb-2">
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <p class="paragraph">{{ _trans('common.No QR Code Images Available') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Internet Type -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Internet Type') }}</h2>
                                    <p class="paragraph" data-name="internet_type" data-type="text">
                                        {{ @$data['internet_type'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Security Type -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Security Type') }}</h2>
                                    @if (!empty(@$data['security_type']))
                                        <ul>
                                            @foreach (json_decode(@$data['security_type'], true) as $security)
                                                <li>{{ $security }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p class="paragraph">{{ _trans('common.No Security Details') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Service Provider -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Service Provider') }}</h2>
                                    @if (!empty(@$data['service_provider']))
                                        <ul>
                                            @foreach (json_decode(@$data['service_provider'], true) as $provider)
                                                <li>{{ $provider }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p class="paragraph">{{ _trans('common.No Service Provider Details') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>

                    <x-navigation-links :previous="14" :next="16" />

                </div>
                <!-- profile body form end -->
            </div>
            <!-- profile body end -->
        </div>

    </div>
@endsection
