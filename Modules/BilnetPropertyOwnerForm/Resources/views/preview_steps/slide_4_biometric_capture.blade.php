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

                <!-- profile body start -->
                <div class="profile-body">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="title">{{ _trans('Biometric Capture') }}</h2>
                    </div>

                    <!-- profile body form start -->
                    <div class="profile-body-form">
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.ID Attachment') }}</h2>
                                    <div class="preview-image-container">
                                        <div class="image-item">
                                            <img
                                                src="{{ asset('storage/' . @$data['id_attachment_4_left_fpc_front']) }}"alt="">
                                            <span>Four Left fingers & Palm</span>
                                        </div>
                                        <div class="image-item">
                                            <img
                                                src="{{ asset('storage/' . @$data['id_attachment_left_tfc_back']) }}"alt="">
                                            <span>Left Thumb fingers Capture</span>
                                        </div>
                                        <div class="image-item">
                                            <img
                                                src="{{ asset('storage/' . @$data['id_attachment_4_right_fpc_front_hold']) }}"alt="">
                                            <span>Four Right Fingers & Palm</span>
                                        </div>
                                        <div class="image-item">
                                            <img
                                                src="{{ asset('storage/' . @$data['id_attachment_left_tfc_back_hold']) }}"alt="">
                                            <span>Four Right fingers & Palm</span>
                                        </div>
                                        <div class="image-item">
                                            <img
                                                src="{{ asset('storage/' . @$data['id_attachment_fic_back_hold']) }}"alt="">
                                            <span>Face ID capture/span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Digital Signature') }}</h2>
                                    <p class="paragraph" data-name="digital_signature" data-type="text">
                                        {{ $data['digital_signature'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>


                    </div>

                    <x-navigation-links :previous="3" :next="5" />

                </div>
                <!-- profile body form end -->
            </div>
            <!-- profile body end -->
        </div>

    </div>
@endsection
