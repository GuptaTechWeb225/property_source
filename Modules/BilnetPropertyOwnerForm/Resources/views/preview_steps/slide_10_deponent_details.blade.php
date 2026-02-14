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
                        <h2 class="title">{{ _trans('Deponent Details') }}</h2>
                    </div>

                    <!-- profile body form start -->
                    <div class="profile-body-form">

                        <!-- Deponent Details -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Name') }}</h2>
                                    <p class="paragraph" data-name="deponent_name" data-type="text">
                                        {{ @$data['deponent_name'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Deponent Digital Address -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Digital Address') }}</h2>
                                    <p class="paragraph" data-name="deponent_digital_address" data-type="text">
                                        {{ @$data['deponent_digital_address'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Deponent ID Number -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.ID Number') }}</h2>
                                    <p class="paragraph" data-name="deponent_id_number" data-type="text">
                                        {{ @$data['deponent_id_number'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Deponent Phone -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Phone') }}</h2>
                                    <p class="paragraph" data-name="deponent_phone" data-type="text">
                                        {{ @$data['deponent_phone'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Deponent Email -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Email') }}</h2>
                                    <p class="paragraph" data-name="deponent_email" data-type="text">
                                        {{ @$data['deponent_email'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Deponent Email -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Living') }}</h2>
                                    <p class="paragraph" data-name="deponent_living" data-type="text">
                                        {{ @$data['deponent_living'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Term -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Digital Signature') }}</h2>
                                    <p class="paragraph" data-name="deponent_digital_signature" data-type="text">
                                        {{ @$data['deponent_digital_signature'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Term -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h3>{{ _trans('common.Indenture Details') }}</h3>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Indenture Files') }}</h2>
                                    <!-- Check if there are any files in the indenture_files array -->
                                    @if (!empty($data['indenture_files']) && is_array($data['indenture_files']))
                                        @foreach ($data['indenture_files'] as $file)
                                            <!-- Check if the file is an image -->
                                            @if (in_array(pathinfo($file, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif']))
                                                <div class="preview-image-container">
                                                    <div class="image-item">
                                                        <img src="{{ asset('storage/' . $file) }}" alt="Indenture File"
                                                            class="img-fluid mb-2">
                                                    </div>
                                                </div>
                                            @else
                                                <a href="{{ asset('storage/' . $file) }}"
                                                    target="_blank">{{ _trans('common.Download Indenture File') }}</a>
                                            @endif
                                        @endforeach
                                    @else
                                        <p>{{ _trans('common.No Indenture Files Available') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <!-- Term -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Term') }}</h2>
                                    <p class="paragraph" data-name="term" data-type="text">{{ @$data['term'] ?? 'N/A' }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Start Period -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Start Period') }}</h2>
                                    <p class="paragraph" data-name="start_period" data-type="text">
                                        {{ @$data['start_period'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- End Period -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.End Period') }}</h2>
                                    <p class="paragraph" data-name="end_period" data-type="text">
                                        {{ @$data['end_period'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Agreement Files') }}</h2>
                                    <!-- Check if there are any files in the agreement_files array -->
                                    @if (!empty($data['agreement_files']) && is_array($data['agreement_files']))
                                        @foreach ($data['agreement_files'] as $file)
                                            <!-- Check if the file is an image -->
                                            @if (in_array(pathinfo($file, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif']))
                                                    <div class="preview-image-container">
                                                        <div class="image-item">
                                                            <img src="{{ asset('storage/' . $file) }}" alt="Agreement File"
                                                            class="img-fluid mb-2">
                                                        </div>
                                                    </div>

                                            @else
                                                <a href="{{ asset('storage/' . $file) }}"
                                                    target="_blank">{{ _trans('common.Download Agreement File') }}</a>
                                            @endif
                                        @endforeach
                                    @else
                                        <p>{{ _trans('common.No Agreement Files Available') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>



                        <!-- Agreement Text -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Agreement Text') }}</h2>
                                    <p class="paragraph" data-name="agreement_text" data-type="text">
                                        {{ @$data['agreement_text'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>


                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h3>{{ _trans("common.Solicitor's Personal Details") }}</h3>
                                </div>
                            </div>
                        </div>


                        <!-- Solicitor Name -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Name') }}</h2>
                                    <p class="paragraph" data-name="solicitor_name" data-type="text">
                                        {{ @$data['solicitor_name'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Solicitor Digital Address -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Digital Address') }}</h2>
                                    <p class="paragraph" data-name="solicitor_digital_address" data-type="text">
                                        {{ @$data['solicitor_digital_address'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Solicitor ID Number -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.ID Number') }}</h2>
                                    <p class="paragraph" data-name="solicitor_id_number" data-type="text">
                                        {{ @$data['solicitor_id_number'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Solicitor Phone -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Phone') }}</h2>
                                    <p class="paragraph" data-name="solicior_phone" data-type="text">
                                        {{ @$data['solicior_phone'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Solicitor Phone -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Email') }}</h2>
                                    <p class="paragraph" data-name="solicior_email" data-type="text">
                                        {{ @$data['solicior_email'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Solicitor Digital Signature -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Digital Signature') }}</h2>
                                    <p class="paragraph" data-name="solicitor_digital_signature" data-type="text">
                                        {{ @$data['solicitor_digital_signature'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <x-navigation-links :previous="9" :next="11" />

                </div>
                <!-- profile body form end -->
            </div>
            <!-- profile body end -->
        </div>

    </div>
@endsection
