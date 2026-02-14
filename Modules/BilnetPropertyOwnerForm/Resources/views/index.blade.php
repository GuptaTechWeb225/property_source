@extends('bilnetpropertyownerform::layouts.master')
@section('content')
    <div class="registration-container">
        <input type="hidden" id="create_temporary_owner_url" value="{{ route('create_temporary_owner') }}">
        <input type="hidden" id="form_file_uploader_url" value="{{ route('form_file_uploader') }}">
        <input type="hidden" id="send_otp_url" value="{{ route('send.otp') }}">
        <input type="hidden" id="proper_owner_form_base_url" value="{{ route('property_owner_register') }}">
        <input type="hidden" id="retrive_progress_url" value="{{ route('retrive_progress') }}">
        <input type="hidden" id="owner_form_submit_url" value="{{ route('owner_form_submit') }}">
        <input type="hidden" id="verify_otp_url" value="{{ route('verify.otp') }}">

        <div class="top-header-form">
            <button id="submitNew">New</button>
            <button id="openModal">Retrive Incomplete</button>
        </div>

        @include('bilnetpropertyownerform::components.incomplete_form_retrieval')
        @include('bilnetpropertyownerform::components.request_document_modal')

        <div class="preview-form-info-card" id="currently_updating_info" style="margin-bottom: 20px">
            <h3>You are currently updating</h3>
            <ul>
                <li><strong>Token</strong>: <span id="currently_updating_info_token"></span></li>
                <li><strong>Name</strong>: <span id="currently_updating_info_email"></span></li>
                <li><strong>Email</strong>: <span id="currently_updating_info_phone"></span></li>
            </ul>
        </div>

        <form id="registrationForm" method="POST" action="" enctype="multipart/form-data">
            {{ csrf_field() }}

            <!-- Section 1: Personal Details -->
            @include('bilnetpropertyownerform::steps.slide_1_personal_details')

            <!-- Section 2: Current Address -->
            @include('bilnetpropertyownerform::steps.slide_2_contact_address')

            <!-- Section 3: Occupation -->
            @include('bilnetpropertyownerform::steps.slide_3_occuption')


            <!-- Section 4: Biometric Capture -->
            @include('bilnetpropertyownerform::steps.slide_4_biometric_capture')

            <!-- Section 5: Company details -->
            @include('bilnetpropertyownerform::steps.slide_5_company_details')

            <!-- Section 6: Property/Asset  -->
            @include('bilnetpropertyownerform::steps.slide_6_asset_property')

            <!-- Section 7: Form of land  -->
            @include('bilnetpropertyownerform::steps.slide_7_form_of_land')

            <!-- Section 8: PARTY A / Witness  -->
            @include('bilnetpropertyownerform::steps.slide_8_party_a_witness')


            <!-- Section 9: PARTY B / Witness  -->
            @include('bilnetpropertyownerform::steps.slide_9_party_b_witness')


            <!-- Section 10: Deponent Details  -->
            @include('bilnetpropertyownerform::steps.slide_10_deponent_details')

            <!-- Section 11: Land Title/Concurrence details (Optional)  -->
            @include('bilnetpropertyownerform::steps.slide_11_land_title_concurrenc_details')

            <!-- Section 12: Yellow Card details (Optional)  -->
            @include('bilnetpropertyownerform::steps.slide_12_yellow_card_details')

            <!-- Section 13: Building Permit details   -->
            @include('bilnetpropertyownerform::steps.slide_13_building_permit_details')

            <!-- Section 14: Building plan details   -->
            @include('bilnetpropertyownerform::steps.slide_14_building_plan_details')

            <!-- Section 15: Building plan details continued  -->
            @include('bilnetpropertyownerform::steps.slide_15_building_plan_details_continue')

            <!-- Section 16: Building Permit details   -->
            @include('bilnetpropertyownerform::steps.slide_16_room_space_registration')

            <!-- Section 17: House/Space Purpose Registration   -->
            @include('bilnetpropertyownerform::steps.slide_17_house_space_purpose_registration')

            <!-- Section 18: Facility Registration Form   -->
            @include('bilnetpropertyownerform::steps.slide_18_facility_registration')

            <!-- Section 19: Rent & Property Control Tenant Online Form  -->
            @include('bilnetpropertyownerform::steps.slide_19_rent_property_control_form')

            <!-- Section 20: Work Information  -->
            @include('bilnetpropertyownerform::steps.slide_20_work_information')

            <!-- Section 21: House/Space Purpose Registration   -->
            @include('bilnetpropertyownerform::steps.slide_21_inhabitant_details')


            <!-- Navigation Buttons -->
            <div class="navigation-buttons">
                <button type="button" id="prevBtn" class="btn" onclick="changeSlide(-1)"
                    style="display:none;">Previous</button>
                <button type="button" id="nextBtn" class="btn" onclick="changeSlide(1)">Next</button>
            </div>

            <!-- Progress Bar -->
            <div class="progress-bar-container">
                <div class="progress-bar">
                    <div id="progressBar" class="progress"></div>
                </div>
                <span id="progressPercentage" class="progress-text">0%</span>
            </div>

        </form>
    </div>
@endsection
