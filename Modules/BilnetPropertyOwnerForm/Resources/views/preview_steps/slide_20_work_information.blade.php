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
                        <h2 class="title">{{ _trans('Work Information') }}</h2>
                    </div>
{{--
                    @dd($data) --}}

                    <!-- profile body form start -->
                    <div class="profile-body-form">
                        <!-- Work Hours -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Work Hours') }}</h2>
                                    <p class="paragraph" data-name="work_hours" data-type="text">
                                        {{ @$data['work_hours'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Work Days -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Work Days') }}</h2>
                                    <p class="paragraph" data-name="work_days" data-type="text">
                                        {{ @$data['work_days'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Work Weeks -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Work Weeks') }}</h2>
                                    <p class="paragraph" data-name="work_weeks" data-type="text">
                                        {{ @$data['work_weeks'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Work Months -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Work Months') }}</h2>
                                    <p class="paragraph" data-name="work_months" data-type="text">
                                        {{ @$data['work_months'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Specific Day Work Hours -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Monday Work Hours') }}</h2>
                                    <p class="paragraph" data-name="monday_hours_from" data-type="text">
                                        {{ @$data['monday_hours_from'] ?? 'N/A' }} -
                                        {{ @$data['monday_hours_to'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Monday Activities -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Monday Activities') }}</h2>
                                    <p class="paragraph" data-name="monday_morning_activity" data-type="text">
                                        {{ @$data['monday_morning_activity'] ?? 'N/A' }}</p>
                                    <p class="paragraph" data-name="monday_afternoon_activity" data-type="text">
                                        {{ @$data['monday_afternoon_activity'] ?? 'N/A' }}</p>
                                    <p class="paragraph" data-name="monday_evening_activity" data-type="text">
                                        {{ @$data['monday_evening_activity'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Income Details -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Income Details') }}</h2>
                                    <p class="paragraph" data-name="income_details" data-type="text">
                                        {{ @$data['income_details'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Income Amount -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Income Amount') }}</h2>
                                    <p class="paragraph" data-name="income_details_amount" data-type="text">
                                        {{ @$data['income_details_amount'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Conditionally render the loan-related income fields if incomeDetailsonLoan is Yes -->
                        @if (@$data['incomeDetailsonLoan'] === 'Yes')
                            <!-- Loan Start Date -->
                            <div class="form-item">
                                <div class="d-flex justify-content-between align-content-center">
                                    <div class="align-self-center">
                                        <h2 class="title">{{ _trans('common.Loan Start Date') }}</h2>
                                        <p class="paragraph" data-name="loanStartDate" data-type="text">
                                            {{ @$data['loanStartDate'] ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Loan Percentage -->
                            <div class="form-item">
                                <div class="d-flex justify-content-between align-content-center">
                                    <div class="align-self-center">
                                        <h2 class="title">{{ _trans('common.Loan Percentage') }}</h2>
                                        <p class="paragraph" data-name="incomeDetailsloanPercentage" data-type="text">
                                            {{ @$data['incomeDetailsloanPercentage'] ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Lender Name -->
                            <div class="form-item">
                                <div class="d-flex justify-content-between align-content-center">
                                    <div class="align-self-center">
                                        <h2 class="title">{{ _trans('common.Lender Name') }}</h2>
                                        <p class="paragraph" data-name="incomeDetailslenderName" data-type="text">
                                            {{ @$data['incomeDetailslenderName'] ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Lender Address -->
                            <div class="form-item">
                                <div class="d-flex justify-content-between align-content-center">
                                    <div class="align-self-center">
                                        <h2 class="title">{{ _trans('common.Lender Address') }}</h2>
                                        <p class="paragraph" data-name="incomeDetailslenderAddress" data-type="text">
                                            {{ @$data['incomeDetailslenderAddress'] ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Lender Phone -->
                            <div class="form-item">
                                <div class="d-flex justify-content-between align-content-center">
                                    <div class="align-self-center">
                                        <h2 class="title">{{ _trans('common.Lender Phone') }}</h2>
                                        <p class="paragraph" data-name="incomeDetailslenderPhone" data-type="text">
                                            {{ @$data['incomeDetailslenderPhone'] ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif


                    </div>

                    <x-navigation-links :previous="19" :next="21" />

                </div>
                <!-- profile body form end -->
            </div>
            <!-- profile body end -->
        </div>

    </div>
@endsection
