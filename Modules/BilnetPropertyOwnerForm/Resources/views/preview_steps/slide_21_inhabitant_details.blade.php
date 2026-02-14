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
                        <h2 class="title">{{ _trans('Inhabitant Details') }}</h2>
                    </div>


                    <!-- profile body form start -->
                    <div class="profile-body-form">

                        <!-- Inhabitant Type -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Type') }}</h2>
                                    <p class="paragraph" data-name="inhabitantType" data-type="text">
                                        {{ @$data['inhabitantType'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.First Name') }}</h2>
                                    <p class="paragraph" data-name="inhabitant_first_name" data-type="text">
                                        {{ @$data['inhabitant_first_name'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Last Name') }}</h2>
                                    <p class="paragraph" data-name="inhabitant_last_name" data-type="text">
                                        {{ @$data['inhabitant_last_name'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Other Name (for individual inhabitants) -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Other Name') }}</h2>
                                    <p class="paragraph" data-name="inhabitant_other_name" data-type="text">
                                        {{ @$data['inhabitant_other_name'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Passport Size Photo (for individual inhabitants) -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Passport Size Photo') }}</h2>
                                    <div class="preview-image-container">
                                        @if ($data['passport_size_photo'])
                                            <div class="image-item">
                                                <img src="{{ asset('storage/' . @$data['passport_size_photo']) }}"
                                                    alt="Passport Photo" class="img-fluid" />
                                            </div>
                                        @else
                                            <span>N/A</span>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Inhabitant Nationality -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Inhabitant Nationality') }}</h2>
                                    <p class="paragraph" data-name="inhabitantNationality" data-type="text">
                                        {{ @$data['inhabitantNationality'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Inhabitant TN -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Inhabitant TN') }}</h2>
                                    <p class="paragraph" data-name="inhabitant_TN" data-type="text">
                                        {{ @$data['inhabitant_TN'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Inhabitant ID Number -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Inhabitant ID Number') }}</h2>
                                    <p class="paragraph" data-name="inhabitant_id_number" data-type="text">
                                        {{ @$data['inhabitant_id_number'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Inhabitant ID Type -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Inhabitant ID Type') }}</h2>
                                    <p class="paragraph" data-name="inhabitant_id_type" data-type="text">
                                        {{ @$data['inhabitant_id_type'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Inhabitant Card Photo -->
                        @if (@$data['inhabitant_card_photo'] !== null)
                            <div class="form-item">
                                <div class="d-flex justify-content-between align-content-center">
                                    <div class="align-self-center">
                                        <h2 class="title">{{ _trans('common.Inhabitant Card Photo') }}</h2>
                                        <img src="{{ asset(@$data['inhabitant_card_photo']) }}" alt="ID Card Photo"
                                            class="img-fluid" />
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Inhabitant Relationship -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Inhabitant Relationship') }}</h2>
                                    <p class="paragraph" data-name="inhabitant_relationship" data-type="text">
                                        {{ @$data['inhabitant_relationship'] == 'other' ? @$data['inhabitant_relationship_other'] : @$data['inhabitant_relationship'] }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Proof of Relationship -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Proof of Relationship') }}</h2>
                                    <p class="paragraph" data-name="proof_of_relationship" data-type="text">
                                        {{ @$data['proof_of_relationship'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        @if ($data['proof_of_relationship'] == 'Birth Certificate')
                            <div class="form-item">
                                <div class="d-flex justify-content-between align-content-center">
                                    <div class="align-self-center">
                                        <h2 class="title">{{ _trans('common.Father Name') }}</h2>
                                        <p class="paragraph" data-name="inhabitant_father_name" data-type="text">
                                            {{ @$data['inhabitant_father_name'] ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="form-item">
                                <div class="d-flex justify-content-between align-content-center">
                                    <div class="align-self-center">
                                        <h2 class="title">{{ _trans('common.Father Alive') }}</h2>
                                        <p class="paragraph" data-name="is_inhabitant_father_alive" data-type="text">
                                            {{ @$data['is_inhabitant_father_alive'] ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </div>

                            @if (@$data['is_inhabitant_father_alive'] == 'yes')
                                <div class="form-item">
                                    <div class="d-flex justify-content-between align-content-center">
                                        <div class="align-self-center">
                                            <h2 class="title">{{ _trans("common.Father's Phone") }}</h2>
                                            <p class="paragraph" data-name="inhabitant_father_phone" data-type="text">
                                                {{ @$data['inhabitant_father_phone'] ?? 'N/A' }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-item">
                                    <div class="d-flex justify-content-between align-content-center">
                                        <div class="align-self-center">
                                            <h2 class="title">{{ _trans("common.Father's Occupation") }}</h2>
                                            <p class="paragraph" data-name="inhabitant_father_occupation"
                                                data-type="text">
                                                {{ @$data['inhabitant_father_occupation'] ?? 'N/A' }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="form-item">
                                <div class="d-flex justify-content-between align-content-center">
                                    <div class="align-self-center">
                                        <h2 class="title">{{ _trans('common.Mother Name') }}</h2>
                                        <p class="paragraph" data-name="inhabitant_mother_name" data-type="text">
                                            {{ @$data['inhabitant_mother_name'] ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="form-item">
                                <div class="d-flex justify-content-between align-content-center">
                                    <div class="align-self-center">
                                        <h2 class="title">{{ _trans('common.Mother Alive') }}</h2>
                                        <p class="paragraph" data-name="is_inhabitant_mother_alive" data-type="text">
                                            {{ @$data['is_inhabitant_mother_alive'] ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </div>

                            @if (@$data['is_inhabitant_mother_alive'] == 'yes')
                                <div class="form-item">
                                    <div class="d-flex justify-content-between align-content-center">
                                        <div class="align-self-center">
                                            <h2 class="title">{{ _trans("common.Mother's Phone") }}</h2>
                                            <p class="paragraph" data-name="inhabitant_mother_phone" data-type="text">
                                                {{ @$data['inhabitantmotherr_phone'] ?? 'N/A' }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-item">
                                    <div class="d-flex justify-content-between align-content-center">
                                        <div class="align-self-center">
                                            <h2 class="title">{{ _trans("common.Mother's Occupation") }}</h2>
                                            <p class="paragraph" data-name="inhabitant_mother_occupation"
                                                data-type="text">
                                                {{ @$data['inhabitant_mother_occupation'] ?? 'N/A' }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif


                            @if (@$data['is_inhabitant_father_alive'] == 'no' && @$data['is_inhabitant_mother_alive'] == 'no')
                                <div class="form-item">
                                    <div class="d-flex justify-content-between align-content-center">
                                        <div class="align-self-center">
                                            <h2 class="title">{{ _trans('common.Guardian Name') }}</h2>
                                            <p class="paragraph" data-name="inhabitant_guardian_name" data-type="text">
                                                {{ @$data['inhabitant_guardian_name'] ?? 'N/A' }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-item">
                                    <div class="d-flex justify-content-between align-content-center">
                                        <div class="align-self-center">
                                            <h2 class="title">{{ _trans("common.Guardian's Phone") }}</h2>
                                            <p class="paragraph" data-name="inhabitant_guardian_phone" data-type="text">
                                                {{ @$data['inhabitant_guardian_phone'] ?? 'N/A' }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-item">
                                    <div class="d-flex justify-content-between align-content-center">
                                        <div class="align-self-center">
                                            <h2 class="title">{{ _trans("common.Guardian's Occupation") }}</h2>
                                            <p class="paragraph" data-name="inhabitant_guardian_occupation"
                                                data-type="text">
                                                {{ @$data['inhabitant_guardian_occupation'] ?? 'N/A' }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif

                        <!-- Organization Name (for company inhabitants) -->
                        @if (@$data['inhabitantType'] === 'Company')
                            <div class="form-item">
                                <div class="d-flex justify-content-between align-content-center">
                                    <div class="align-self-center">
                                        <h2 class="title">{{ _trans('common.Organization Name') }}</h2>
                                        <p class="paragraph" data-name="inhabitant_organization_name" data-type="text">
                                            {{ @$data['inhabitant_organization_name'] ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Other Relationship Proof -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Other Relationship Proof') }}</h2>
                                    <p class="paragraph" data-name="inhabitant_other_relationship_proof"
                                        data-type="text">{{ @$data['inhabitant_other_relationship_proof'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Add Proof of Relationship -->
                        @if (@$data['add_proof_relationbship'] !== null)
                            <div class="form-item">
                                <div class="d-flex justify-content-between align-content-center">
                                    <div class="align-self-center">
                                        <h2 class="title">{{ _trans('common.Add Proof of Relationship') }}</h2>
                                        <div class="preview-image-container">
                                            <div class="image-item">
                                                <img src="{{ asset('storage/' . @$data['add_proof_relationbship']) }}"
                                                    alt="Proof of Relationship" class="img-fluid" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Inhabitant Phone -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Inhabitant Phone') }}</h2>
                                    <p class="paragraph" data-name="inhabitant_phone" data-type="text">
                                        {{ @$data['inhabitant_phone'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>


                        <!-- Inhabitant Email -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Inhabitant Email') }}</h2>
                                    <p class="paragraph" data-name="inhabitant_email" data-type="text">
                                        {{ @$data['inhabitant_email'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Reason for Accommodation -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Reason for Accommodation') }}</h2>
                                    <p class="paragraph" data-name="inhabitant_reason_for_accommodation"
                                        data-type="text">{{ @$data['inhabitant_reason_for_accommodation'] ?? 'N/A' }}</p>
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

                        <!-- Accommodation Start Date -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Accommodation Start Date') }}</h2>
                                    <p class="paragraph" data-name="inhabitant_accommodation_start_date"
                                        data-type="text">{{ @$data['inhabitant_accommodation_start_date'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Accommodation End Date -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Accommodation End Date') }}</h2>
                                    <p class="paragraph" data-name="inhabitant_accommodation_end_date" data-type="text">
                                        {{ @$data['inhabitant_accommodation_end_date'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Inhabitant Sex -->
                        <div class="form-item">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="align-self-center">
                                    <h2 class="title">{{ _trans('common.Inhabitant Sex') }}</h2>
                                    <p class="paragraph" data-name="inhabitant_sex" data-type="text">
                                        {{ @$data['inhabitant_sex'] }}</p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <x-navigation-links :previous="20" />

                </div>
                <!-- profile body form end -->
            </div>
            <!-- profile body end -->
        </div>

    </div>
@endsection
