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
                        <h2 class="title">{{ _trans('Indenture Details (B)') }}</h2>
                    </div>

                    <!-- profile body form start -->
                    <div class="profile-body-form">
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <small>This indenture is in between</small>
                                    <h1>{{ _trans('common.PARTY "B" REP') }}</h1>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Representing As') }}</h2>
                                    <p class="paragraph" data-name="representing_as_b" data-type="text">{{ @$data['representing_as_b'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Representing For') }}</h2>
                                    <p class="paragraph" data-name="representing_for_b" data-type="text">{{ @$data['representing_for_b'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Title') }}</h2>
                                    <p class="paragraph" data-name="rep_title_b" data-type="text">{{ @$data['rep_title_b'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Title Numerals') }}</h2>
                                    <p class="paragraph" data-name="rep_title_numerals_b" data-type="text">{{ @$data['rep_title_numerals_b'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Name') }}</h2>
                                    <p class="paragraph" data-name="rep_name_b" data-type="text">{{ @$data['rep_name_b'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Digital Address') }}</h2>
                                    <p class="paragraph" data-name="rep_digital_address_b" data-type="text">{{ @$data['rep_digital_address_b'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.ID Number') }}</h2>
                                    <p class="paragraph" data-name="rep_id_number_b" data-type="text">{{ @$data['rep_id_number_b'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Phone') }}</h2>
                                    <p class="paragraph" data-name="rep_phone_b" data-type="text">{{ @$data['rep_phone_b'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Email') }}</h2>
                                    <p class="paragraph" data-name="rep_email_b" data-type="text">{{ @$data['rep_email_b'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Living') }}</h2>
                                    <p class="paragraph" data-name="living_b" data-type="text">{{ @$data['living_b'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Digital Signature B') }}</h2>
                                    <p class="paragraph" data-name="digital_signature_b" data-type="text">{{ @$data['digital_signature_b'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h1>{{ _trans('common.PARTY "B" REP Witnesses') }}</h1>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Name') }}</h2>
                                    <p class="paragraph" data-name="rep_witness_name_b" data-type="text">{{ @$data['rep_witness_name_b'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Digital Address') }}</h2>
                                    <p class="paragraph" data-name="rep_witness_digital_address_b" data-type="text">{{ @$data['rep_witness_digital_address_b'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.ID Number') }}</h2>
                                    <p class="paragraph" data-name="rep_witness_id_number_b" data-type="text">{{ @$data['rep_witness_id_number_b'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Phone') }}</h2>
                                    <p class="paragraph" data-name="rep_witness_phone_b" data-type="text">{{ @$data['rep_witness_phone_b'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Email') }}</h2>
                                    <p class="paragraph" data-name="rep_witness_email_b" data-type="text">{{ @$data['rep_witness_email_b'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Living') }}</h2>
                                    <p class="paragraph" data-name="living_witness_b" data-type="text">{{ @$data['living_witness_b'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Digital Signature') }}</h2>
                                    <p class="paragraph" data-name="witness_digital_signature_b" data-type="text">{{ @$data['witness_digital_signature_b'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <x-navigation-links :previous="8" :next="10" />

                </div>
                <!-- profile body form end -->
            </div>
            <!-- profile body end -->
        </div>

    </div>
@endsection
