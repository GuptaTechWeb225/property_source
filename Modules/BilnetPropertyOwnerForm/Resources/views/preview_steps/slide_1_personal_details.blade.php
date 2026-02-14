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

                @include('bilnetpropertyownerform::preview_steps.profile_menu')
                <!-- profile menu end -->

                <!-- profile body start -->
                <div class="profile-body">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="title">{{ _trans('Personal Details') }}</h2>
                    </div>


                    <div class="profile-body-form">
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Title') }}</h2>
                                    <p class="paragraph" data-name="title" data-type="select">{{ @$data['title'] }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.First Name') }}</h2>
                                    <p class="paragraph" data-name="first_name" data-type="text">{{ @$data['first_name'] }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Last Name') }}</h2>
                                    <p class="paragraph" data-name="last_name" data-type="text">{{ @$data['last_name'] }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Other Names') }}</h2>
                                    <p class="paragraph" data-name="other_names" data-type="text">
                                        {{ @$data['other_names'] }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Date of Birth') }}</h2>
                                    <p class="paragraph" data-name="dob" data-type="date">{{ @$data['dob'] }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Gender') }}</h2>
                                    <p class="paragraph" data-name="gender" data-type="radio">
                                        {{ @$data['gender'] == 'other' ? @$data['gender_other'] : @$data['gender'] }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Nationality') }}</h2>
                                    <p class="paragraph" data-name="nationality" data-type="radio">
                                        {{ @$data['nationality'] }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Dual Citizenship') }}</h2>
                                    <p class="paragraph" data-name="dual_citizenship" data-type="checkbox">
                                        {{ in_array('on', (array) json_decode(@$data['dual_citizenship'], true)) ? 'Yes' : 'No' }}
                                    </p>

                                    @if (in_array('on', (array) json_decode(@$data['dual_citizenship'], true)) &&
                                            !empty(@$data['dual_citizenship_countries']))
                                        <p class="paragraph">
                                            <b>Countries:</b>
                                            {{ is_array(@$data['dual_citizenship_countries']) ? implode(', ', @$data['dual_citizenship_countries']) : implode(', ', json_decode($data['dual_citizenship_countries'], true)) }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Non ID Holder') }}</h2>
                                    <p class="paragraph" data-name="non_id_holder" data-type="checkbox">
                                        {{ in_array('on', json_decode(@$data['non_id_holder'])) ? 'Yes' : 'No' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @if (in_array('on', json_decode(@$data['non_id_holder'])))
                            <div class="form-item">
                                <div class="d-flex justify-content-between align-content-center">
                                    <div class="align-self-center">
                                        <h2 class="title">{{ _trans("common.Non ID Holder Guarantor's Details") }}</h2>
                                        <p class="paragraph">
                                            <b>Name:</b> {{ @$data['guarantor_name'] }}
                                        </p>
                                        <p class="paragraph">
                                            <b>ID No:</b> {{ @$data['guarantor_id_no'] }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.ID Type') }}</h2>
                                    <p class="paragraph" data-name="id_type" data-type="radio">{{ @$data['id_type'] }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.ID Type') }}</h2>
                                    <p class="paragraph" data-name="id_type" data-type="radio">{{ @$data['id_type'] }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        {{-- @dd($data); --}}
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.ID Attachment Card Images') }}</h2>
                                    <div class="preview-image-container">
                                        <div class="image-item">
                                            <img src="{{ asset('storage/' . @$data['id_attachment_card_front']) }}"
                                                alt="">
                                            <span>Card Front</span>
                                        </div>
                                        <div class="image-item">
                                            <img src="{{ asset('storage/' . @$data['id_attachment_card_back']) }}"
                                                alt="">
                                            <span>Card Back</span>
                                        </div>
                                        <div class="image-item">
                                            <img src="{{ asset('storage/' . @$data['id_attachment_card_front_hold']) }}"
                                                alt="">
                                            <span>Card Front Hold</span>
                                        </div>
                                        <div class="image-item">
                                            <img src="{{ asset('storage/' . @$data['id_attachment_card_back_hold']) }}"
                                                alt="">
                                            <span>Card Back Hold</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.ID NO') }}</h2>
                                    <p class="paragraph" data-name="idNo" data-type="text">{{ @$data['idNo'] }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.ID Issuer') }}</h2>
                                    <p class="paragraph" data-name="idIssuer" data-type="text">{{ @$data['idIssuer'] }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Country of Issue') }}</h2>
                                    <p class="paragraph" data-name="countryOfIssue" data-type="select">
                                        {{ @$data['countryOfIssue'] }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.ID Issuing Date') }}</h2>
                                    <p class="paragraph" data-name="idIssuingDate" data-type="date">
                                        {{ @$data['idIssuingDate'] }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.ID Expiry Date') }}</h2>
                                    <p class="paragraph" data-name="idExpiryDate" data-type="date">
                                        {{ @$data['idExpiryDate'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <x-navigation-links :next="2" />

                </div>
                <!-- profile body form end -->
            </div>
            <!-- profile body end -->
        </div>

    </div>
@endsection
