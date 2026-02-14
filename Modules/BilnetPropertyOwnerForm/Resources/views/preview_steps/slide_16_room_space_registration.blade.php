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
                        <h2 class="title">{{ _trans('Room Space Registration') }}</h2>
                    </div>

                    <!-- profile body form start -->
                    <div class="profile-body-form">
                        <!-- Number of Rooms -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Number of Rooms') }}</h2>
                                    <p class="paragraph" data-name="number_of_rooms" data-type="text">
                                        {{ @$data['number_of_rooms'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Room Name -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Room Name') }}</h2>
                                    <p class="paragraph" data-name="room_name" data-type="text">
                                        {{ @$data['room_name'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Room Name Other -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Room Name Other') }}</h2>
                                    <p class="paragraph" data-name="room_name_other" data-type="text">
                                        {{ @$data['room_name_other'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Digital Address -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Digital Address') }}</h2>
                                    <p class="paragraph" data-name="digital_address" data-type="text">
                                        {{ @$data['digital_address'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Longitude -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Longitude') }}</h2>
                                    <p class="paragraph" data-name="longitude" data-type="text">
                                        {{ @$data['longitude'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Latitude -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Latitude') }}</h2>
                                    <p class="paragraph" data-name="latitude" data-type="text">
                                        {{ @$data['latitude'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Room Size -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Room Size') }}</h2>
                                    <p class="paragraph" data-name="room_size" data-type="text">
                                        {{ @$data['room_size'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Space Room Images -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Space Room Images') }}</h2>
                                    @if (!empty(@$data['space_room_images']))
                                        <div class="preview-image-container">
                                            @foreach (json_decode(@$data['space_room_images'], true) as $image)
                                                <div class="image-item">
                                                    <img src="{{ asset('storage/' . $image) }}" alt="Space Room Image"
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

                        <!-- Space Room Videos -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Space Room Videos') }}</h2>
                                    @if (!empty(@$data['space_room_videos']))
                                        <div class="preview-image-container">
                                            @foreach (json_decode(@$data['space_room_videos'], true) as $video)
                                                <div class="image-item">

                                                    <video controls class="mb-2">
                                                        <source src="{{ asset('storage/' . $video) }}" type="video/mp4">
                                                        {{ _trans('common.Your browser does not support the video tag.') }}
                                                    </video>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <p class="paragraph">{{ _trans('common.No Videos Available') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <!-- Sanitation Facility QR Code -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Sanitation Facility QR Code') }}</h2>
                                    @if (!empty(@$data['sanitation_facility_qrcode']))
                                    <div class="preview-image-container">
                                        @foreach (json_decode(@$data['sanitation_facility_qrcode'], true) as $image)
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

                        <!-- Room Space Colors -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Room Space Colors') }}</h2>
                                    @if (!empty(@$data['roomSpaceColors']))
                                        <ul>
                                            @foreach (json_decode(@$data['roomSpaceColors'], true) as $color)
                                                <li>{{ $color }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p class="paragraph">{{ _trans('common.No Colors Available') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Floor Type -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Floor Type') }}</h2>
                                    @if (!empty(@$data['floorType']))
                                        <ul>
                                            @foreach (json_decode(@$data['floorType'], true) as $floor)
                                                <li>{{ $floor }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p class="paragraph">{{ _trans('common.No Floor Types Available') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Roof Type -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Roof Type') }}</h2>
                                    @if (!empty(@$data['roofType']))
                                        <ul>
                                            @foreach (json_decode(@$data['roofType'], true) as $roof)
                                                <li>{{ $roof }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p class="paragraph">{{ _trans('common.No Roof Types Available') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Ceiling Type -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Ceiling Type') }}</h2>
                                    @if (!empty(@$data['ceilingType']))
                                        <ul>
                                            @foreach (json_decode(@$data['ceilingType'], true) as $ceiling)
                                                <li>{{ $ceiling }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p class="paragraph">{{ _trans('common.No Ceiling Types Available') }}</p>
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
