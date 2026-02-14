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
                        <h2 class="title">{{ _trans('Occupation') }}</h2>
                    </div>

                    <!-- profile body form start -->
                    <div class="profile-body-form">
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Occupation Category') }}</h2>
                                    <p class="paragraph" data-name="occupation_category" data-type="text">
                                        {{ @$data['occupation_category'] }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Business Institution Name') }}</h2>
                                    <p class="paragraph" data-name="business_institution_name" data-type="text">
                                        {{ @$data['business_institution_name'] }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Occupation Sector') }}</h2>
                                    <p class="paragraph" data-name="occupation_sector" data-type="text">
                                        {{ @$data['occupation_sector'] }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.TIN Registration License No') }}</h2>
                                    <p class="paragraph" data-name="tin_reg_lic_no" data-type="text">
                                        {{ @$data['tin_reg_lic_no'] }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Position') }}</h2>
                                    <p class="paragraph" data-name="position" data-type="text">{{ @$data['position'] }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Work ID No') }}</h2>
                                    <p class="paragraph" data-name="work_id_no" data-type="text">{{ @$data['work_id_no'] }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Work Address') }}</h2>
                                    <p class="paragraph" data-name="work_address" data-type="text">
                                        {{ @$data['work_address'] }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Marital Status') }}</h2>
                                    <p class="paragraph" data-name="marital_status" data-type="text">
                                        {{ @$data['marital_status'] }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Knocking Details') }}</h2>
                                    <p class="paragraph" data-name="knockingDetails" data-type="text">
                                        {{ @$data['knockingDetails'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Cohabitation Details') }}</h2>
                                    <p class="paragraph" data-name="cohabitationDetails" data-type="text">
                                        {{ @$data['cohabitationDetails'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Religion Based Faith') }}</h2>
                                    <p class="paragraph" data-name="rbf" data-type="text">{{ @$data['rbf'] }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.RBF Denomination Name') }}</h2>
                                    <p class="paragraph" data-name="rbf_denomination_name" data-type="text">
                                        {{ @$data['rbf_denomination_name'] == 'other' ? $data['other_rbf_denomination'] ?? 'N/A' : $data['rbf_denomination_name'] }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.RBF Branch Name') }}</h2>
                                    <p class="paragraph" data-name="rbf_branch_name" data-type="text">
                                        {{ @$data['rbf_branch_name'] }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.RBF Branch ID No') }}</h2>
                                    <p class="paragraph" data-name="rbf_branch_id_no" data-type="text">
                                        {{ @$data['rbf_branch_id_no'] }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Spoke Languages') }}</h2>
                                    <p class="paragraph" data-name="spoken_languages" data-type="text">
                                        {{ implode(', ', json_decode(@$data['spoken_languages'])) }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.SSNIT No') }}</h2>
                                    <p class="paragraph" data-name="ssnit_no" data-type="text">{{ @$data['ssnit_no'] }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.NHIS No') }}</h2>
                                    <p class="paragraph" data-name="nhis_no" data-type="text">{{ @$data['nhis_no'] }}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <x-navigation-links :previous="2" :next="4" />
                </div>
                <!-- profile body form end -->
            </div>
            <!-- profile body end -->
        </div>

    </div>
@endsection
