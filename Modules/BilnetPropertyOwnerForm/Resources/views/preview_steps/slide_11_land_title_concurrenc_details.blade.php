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
                        <h2 class="title">{{ _trans('Land Title/Concurrence Details (Optional)') }}</h2>
                    </div>
                    <!-- profile body form start -->
                    <div class="profile-body-form">
                        <!-- Land Title Number -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Land Title Number') }}</h2>
                                    <p class="paragraph" data-name="landTitleNumber" data-type="text">
                                        {{ @$data['landTitleNumber'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>


                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Land Title Images') }}</h2>
                                    <!-- Display the image for landTitle_images -->
                                    @if (@$data['landTitle_images'])
                                        @php
                                            $images = is_array(json_decode($data['landTitle_images'], true))
                                                ? json_decode($data['landTitle_images'], true)
                                                : [$data['landTitle_images']];
                                        @endphp
                                        <div class="preview-image-container">
                                            @foreach ($images as $image)
                                                <div class="image-item">
                                                    <img src="{{ asset('storage/' . $image) }}" alt="Land Title Image"
                                                        class="img-fluid">
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <p>{{ _trans('common.No Land Title Images Available') }}</p>
                                    @endif

                                </div>
                            </div>
                        </div>



                        <!-- Land Title Status -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Land Title Status') }}</h2>
                                    <p class="paragraph" data-name="land_title_status" data-type="text">
                                        {{ @$data['land_title_status'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Yellow Card Date -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Yellow Card Date') }}</h2>
                                    <p class="paragraph" data-name="yellow_card_date" data-type="text">
                                        {{ @$data['yellow_card_date'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Land Title Time -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Land Title Time') }}</h2>
                                    <p class="paragraph" data-name="land_title_time" data-type="text">
                                        {{ @$data['land_title_time'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Payment Code -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Payment Code') }}</h2>
                                    <p class="paragraph" data-name="paymentCode" data-type="text">
                                        {{ @$data['paymentCode'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <x-navigation-links :previous="10" :next="12" />

                </div>
                <!-- profile body form end -->
            </div>
            <!-- profile body end -->
        </div>

    </div>
@endsection
