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
                        <h2 class="title">{{ _trans('House/Space Purpose Registration') }}</h2>
                    </div>
                    <!-- profile body form start -->
                    <div class="profile-body-form">
                        <!-- Property Owner -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Property Owner') }}</h2>
                                    <p class="paragraph" data-name="property_owner" data-type="text">
                                        {{ @$data['property_owner'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Owner Name -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Owner Name') }}</h2>
                                    <p class="paragraph" data-name="owner_name" data-type="text">
                                        {{ @$data['owner_name'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Owner ID Number -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Owner ID Number') }}</h2>
                                    <p class="paragraph" data-name="owner_id_number" data-type="text">
                                        {{ @$data['owner_id_number'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Property Purpose -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Property Purpose') }}</h2>
                                    <p class="paragraph" data-name="property_purpose" data-type="text">
                                        {{ @$data['property_purpose'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Commercial Purpose -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Commercial Purpose') }}</h2>
                                    <p class="paragraph" data-name="commercial_purpose" data-type="text">
                                        {{ @$data['commercial_purpose'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Mixed Purpose -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Mixed Purpose') }}</h2>
                                    <p class="paragraph" data-name="mixed_purpose" data-type="text">
                                        {{ @$data['mixed_purpose'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Rent Mode -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Rent Mode') }}</h2>
                                    <p class="paragraph" data-name="rent_mode" data-type="text">
                                        {{ @$data['rent_mode'] ?? 'N/A' }}</p>
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

                        <!-- Rent Currency -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Rent Currency') }}</h2>
                                    <p class="paragraph" data-name="rent_currency" data-type="text">
                                        {{ @$data['rent_currency'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Currency Type -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Currency Type') }}</h2>
                                    <p class="paragraph" data-name="currency_type" data-type="text">
                                        {{ @$data['currency_type'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Other Currency Type -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Other Currency Type') }}</h2>
                                    <p class="paragraph" data-name="currency_other_field_input" data-type="text">
                                        {{ @$data['currency_other_field_input'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Payment Mode -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Payment Mode') }}</h2>
                                    <p class="paragraph" data-name="payment_mode" data-type="text">
                                        {{ @$data['payment_mode'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Momo Network Carrier -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Momo Network Carrier') }}</h2>
                                    <p class="paragraph" data-name="momo_network_carrier" data-type="text">
                                        {{ @$data['momo_network_carrier'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Other Carrier -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Other Carrier') }}</h2>
                                    <p class="paragraph" data-name="other_carrier" data-type="text">
                                        {{ @$data['other_carrier'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Network Carrier Phone -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Network Carrier Phone') }}</h2>
                                    <p class="paragraph" data-name="network_carrier_phone" data-type="text">
                                        {{ @$data['network_carrier_phone'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Network Carrier Phone OTP -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Network Carrier Phone OTP') }}</h2>
                                    <p class="paragraph" data-name="network_carrier_phone_otp" data-type="text">
                                        {{ @$data['network_carrier_phone_otp'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Bank Name -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Bank Name') }}</h2>
                                    <p class="paragraph" data-name="name_of_bank" data-type="text">
                                        {{ @$data['name_of_bank'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Other Bank Name -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Other Bank Name') }}</h2>
                                    <p class="paragraph" data-name="other_bank_name" data-type="text">
                                        {{ @$data['other_bank_name'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Account Name -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Account Name') }}</h2>
                                    <p class="paragraph" data-name="purpose_account_name" data-type="text">
                                        {{ @$data['purpose_account_name'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Account Number -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Account Number') }}</h2>
                                    <p class="paragraph" data-name="purpose_account_number" data-type="text">
                                        {{ @$data['purpose_account_number'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Cheque Number -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Cheque Number') }}</h2>
                                    <p class="paragraph" data-name="purpose_cheque_number" data-type="text">
                                        {{ @$data['purpose_cheque_number'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Cheque Date -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Cheque Date') }}</h2>
                                    <p class="paragraph" data-name="purpose_cheque_date" data-type="text">
                                        {{ @$data['purpose_cheque_date'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Cheque Digital Signature -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Cheque Digital Signature') }}</h2>
                                    <p class="paragraph" data-name="purpose_cheque_digital_signature" data-type="text">
                                        {{ @$data['purpose_cheque_digital_signature'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Cheque QR Image -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Cheque QR Image') }}</h2>
                                    <div class="preview-image-container">
                                        <div class="image-item">
                                            <img src="{{ asset('storage/' . @$data['cheque_qr_image']) }}"
                                                alt="Cheque QR Image" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Cheque Image -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Cheque Image') }}</h2>
                                    <div class="preview-image-container">
                                        <div class="image-item">
                                            <img src="{{  asset('storage/' .@$data['cheque_image']) }}" alt="Cheque Image"
                                                class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tenants Members Mode -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Tenants Members Mode') }}</h2>
                                    <p class="paragraph" data-name="tenants_members_mode" data-type="text">
                                        {{ @$data['tenants_members_mode'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Tenants Sex Mode -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Tenants Sex Mode') }}</h2>
                                    <p class="paragraph" data-name="tenants_sex_mode" data-type="text">
                                        {{ @$data['tenants_sex_mode'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Foreigners Allowed -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Foreigners Allowed') }}</h2>
                                    <p class="paragraph" data-name="foreigners_allowed" data-type="text">
                                        {{ @$data['foreigners_allowed'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Tenants Age Group -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Tenants Age Group') }}</h2>
                                    <p class="paragraph" data-name="tenants_age_group" data-type="text">
                                        {{ @$data['tenants_age_group'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Tenant Amount -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Tenant Amount') }}</h2>
                                    <p class="paragraph" data-name="tenant_amount" data-type="text">
                                        {{ @$data['tenant_amount'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Pets Allowed -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Pets Allowed') }}</h2>
                                    <p class="paragraph" data-name="petsAllowed" data-type="text">
                                        {{ @$data['petsAllowed'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Number of Pets -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Number of Pets') }}</h2>
                                    <p class="paragraph" data-name="numberOfPets" data-type="text">
                                        {{ @$data['numberOfPets'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Livestock Categories -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Livestock Categories') }}</h2>
                                    <p class="paragraph" data-name="livestock_categories" data-type="text">
                                        {{ @$data['livestock_categories'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Smoking Allowed -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Smoking Allowed') }}</h2>
                                    <p class="paragraph" data-name="smokingAllowed" data-type="text">
                                        {{ @$data['smokingAllowed'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Byelaws and Agreement -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Byelaws and Agreement') }}</h2>
                                    <p class="paragraph" data-name="byelaws_and_agreement" data-type="text">
                                        {{ @$data['byelaws_and_agreement'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Allowed Pets -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Allowed Pets') }}</h2>
                                    <p class="paragraph" data-name="allowed_pets" data-type="text">
                                        {{ implode(', ', json_decode(@$data['allowed_pets'] ?? '[]')) }}

                                </div>
                            </div>
                        </div>


                    </div>

                    <x-navigation-links :previous="16" :next="18" />

                </div>
                <!-- profile body form end -->
            </div>
            <!-- profile body end -->
        </div>

    </div>
@endsection
