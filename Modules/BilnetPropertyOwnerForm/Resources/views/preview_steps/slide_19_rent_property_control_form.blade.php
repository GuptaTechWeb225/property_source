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
                        <h2 class="title">{{ _trans('Rent & Property Control Tenant Online Form') }}</h2>
                    </div>


                    <!-- profile body form start -->
                    <div class="profile-body-form">

                        <!-- Facility Property Address -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Facility Property Address') }}</h2>
                                    <p class="paragraph" data-name="facility_property_address" data-type="text">
                                        {{ @$data['facility_property_address'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Primary Tenant ID -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Tenant ID') }}</h2>
                                    <p class="paragraph" data-name="primay_tenant_id" data-type="text">
                                        {{ @$data['primay_tenant_id'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Primary Tenant Phone -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Tenant Phone') }}</h2>
                                    <p class="paragraph" data-name="primay_tenant_phone" data-type="text">
                                        {{ @$data['primay_tenant_phone'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Primary Tenant Email -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Tenant Email') }}</h2>
                                    <p class="paragraph" data-name="primay_tenant_email" data-type="text">
                                        {{ @$data['primay_tenant_email'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- How You Earn -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.How You Earn') }}</h2>
                                    <p class="paragraph" data-name="how_you_earn" data-type="text">
                                        {{ @$data['how_you_earn'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Amount Range -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Amount Range') }}</h2>
                                    <p class="paragraph" data-name="amount_range" data-type="text">
                                        {{ @$data['amount_range'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- On Loan -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Are you on Loan?') }}</h2>
                                    <p class="paragraph" data-name="onLoan" data-type="text">{{ @$data['onLoan'] ?? 'N/A' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @if(@$data['onLoan'] === 'Yes')
                        <!-- Loan Amount -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Loan Amount') }}</h2>
                                    <p class="paragraph" data-name="loanAmount" data-type="text">
                                        {{ @$data['loanAmount'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Loan Interest -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Loan Interest') }}</h2>
                                    <p class="paragraph" data-name="loanInterest" data-type="text">
                                        {{ @$data['loanInterest'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

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

                        <!-- Loan End Date -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Loan End Date') }}</h2>
                                    <p class="paragraph" data-name="loanEndDate" data-type="text">
                                        {{ @$data['loanEndDate'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Payment Date -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Payment Date') }}</h2>
                                    <p class="paragraph" data-name="paymentDate" data-type="text">
                                        {{ @$data['paymentDate'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Amount Paid -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Amount Paid') }}</h2>
                                    <p class="paragraph" data-name="amountPaid" data-type="text">
                                        {{ @$data['amountPaid'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Remaining Balance -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Remaining Balance') }}</h2>
                                    <p class="paragraph" data-name="remainingBalance" data-type="text">
                                        {{ @$data['remainingBalance'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Estimated Finish Date -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Estimated Finish Date') }}</h2>
                                    <p class="paragraph" data-name="estimatedFinishDate" data-type="text">
                                        {{ @$data['estimatedFinishDate'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Proof Attachment -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Proof Attachment') }}</h2>
                                    <p class="paragraph" data-name="proofAttachment" data-type="text">
                                        {{ @$data['proofAttachment'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Lender Name -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Lender Name') }}</h2>
                                    <p class="paragraph" data-name="lenderName" data-type="text">
                                        {{ @$data['lenderName'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Lender Address -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Lender Address') }}</h2>
                                    <p class="paragraph" data-name="lenderAddress" data-type="text">
                                        {{ @$data['lenderAddress'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Lender Phone -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Lender Phone') }}</h2>
                                    <p class="paragraph" data-name="lenderPhone" data-type="text">
                                        {{ @$data['lenderPhone'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        @endif

                    </div>

                    <x-navigation-links :previous="18" :next="20" />

                </div>
                <!-- profile body form end -->
            </div>
            <!-- profile body end -->
        </div>

    </div>
@endsection
