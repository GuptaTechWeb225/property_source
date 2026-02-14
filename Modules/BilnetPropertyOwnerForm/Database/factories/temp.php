<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_owners', function (Blueprint $table) {
            $table->id();
            //step 1 | personal details
            $table->string('title')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('other_names')->nullable();
            $table->date('dob')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->string('gender_other')->nullable();
            $table->enum('nationality', ['ghanian', 'foreigner'])->nullable();
            $table->string('foreign_country')->nullable();
            $table->boolean('dual_citizenship')->default(false);
            $table->json('dual_citizenship_countries')->nullable();
            $table->boolean('non_id_holder')->default(false);
            $table->string('guarantor_name')->nullable();
            $table->string('guarantor_id_no')->nullable();
            $table->enum('id_type', ['Ghana Card', 'Passport', 'Foreigner Passport', 'Other Valid Id', 'NIN for Nigerians'])->nullable();
            $table->string('id_attachment_front')->nullable();
            $table->string('id_attachment_back')->nullable();
            $table->string('id_attachment_front_holding')->nullable();
            $table->string('id_attachment_back_holding')->nullable();
            $table->string('id_no')->nullable();
            $table->string('id_issuer')->nullable();
            $table->string('country_of_issue')->nullable();
            $table->date('id_issuing_date')->nullable();
            $table->date('id_expiry_date')->nullable();

            //  step-2 | Current Address

            $table->string('current_address_house_number')->nullable();
            $table->string('digital_address')->nullable();
            $table->string('region')->nullable();
            $table->string('other_region')->nullable();
            $table->string('municipal_district')->nullable();
            $table->string('town')->nullable();
            $table->string('locality')->nullable();
            $table->string('street_name')->nullable();
            $table->string('digital_address_qr')->nullable();
            $table->string('tribe')->nullable();
            $table->string('other_tribe')->nullable();
            $table->string('home_town')->nullable();
            $table->string('hair_color')->nullable();
            $table->string('hair_color_specify')->nullable();
            $table->string('disability')->nullable();
            $table->string('disability_specify')->nullable();
            $table->string('purpose_phone_number')->nullable();
            $table->string('otp')->nullable();
            $table->string('rep_email_a')->nullable();
            $table->string('email_otp')->nullable();

            //step-3 Occupation

            $table->string('occupation_category')->nullable();
            $table->string('business_institution_name')->nullable();
            $table->string('occupation_sector')->nullable();
            $table->string('tin_reg_lic_no')->nullable();
            $table->string('position')->nullable();
            $table->string('work_id_no')->nullable();
            $table->string('work_address')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('knocking_details')->nullable();
            $table->string('cohabitation_details')->nullable();
            $table->string('rbf')->nullable();
            $table->string('rbf_denomination_name')->nullable();
            $table->string('other_rbf_denomination')->nullable();
            $table->string('rbf_branch_name')->nullable();
            $table->string('rbf_branch_id_no')->nullable();
            $table->string('languages_spoken')->nullable();
            $table->string('ssnit_no')->nullable();
            $table->string('nhis_no')->nullable();

            //step-4 biometric capture
            $table->string('front_fingers_image')->nullable(); // Store the image file path for front fingers & palm
            $table->string('back_fingers_image')->nullable(); // Store the image file path for back thumb
            $table->string('front_holding_image')->nullable(); // Store the image file path for front holding ID
            $table->string('back_holding_image')->nullable(); // Store the image file path for back holding ID
            $table->string('face_id_image')->nullable(); // Store the image file path for face ID
            $table->string('create_password')->nullable(); // Store the created password (hashed)
            $table->string('digital_signature')->nullable(); // St

            //step-5 company details
            $table->string('company_name'); // Company name
            $table->enum('company_category', ['Government', 'Private', 'NGO'])->nullable(); // Company category (government, private, NGO)
            $table->string('company_email'); // Company email
            $table->string('company_url')->nullable(); // Company website/URL
            $table->string('company_phone'); // Company phone
            $table->string('company_reg_no'); // Company registration number
            $table->enum('company_type', ['Government', 'Private', 'NGO'])->nullable(); // Company type (government, private, NGO)
            $table->string('company_tin')->nullable(); // Company TIN (Taxpayer Identification Number)
            $table->string('company_representative_id')->nullable(); // Company representative ID

            //step-6 asset property
            $table->string('property_type'); // e.g., Bare Land, Building, IP, Others
            $table->string('completion_status'); // e.g., Completed, Uncompleted, New
            $table->string('address')->nullable();
            $table->string('asset_prohouse_number')->nullable();
            $table->string('locality')->nullable();
            $table->string('town')->nullable();
            $table->string('district')->nullable();
            $table->string('region')->nullable();
            $table->string('other_region')->nullable(); // for 'Other' region
            $table->string('digital_address')->nullable();
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->string('po_box')->nullable();
            $table->string('site_plan_number')->nullable();
            $table->string('land_size')->nullable();
            $table->string('site_plan_qr_image')->nullable(); // For storing QR image path
            $table->string('site_plan_attachment')->nullable(); // For storing attached site plan imag

            //step-7 land form
            $table->string('plan_for')->nullable();
            $table->string('scale')->nullable();
            $table->string('area')->nullable();
            $table->string('locality')->nullable();
            $table->string('district')->nullable();
            $table->string('region')->nullable();
            $table->string('surveyor_name')->nullable();
            $table->date('date')->nullable();
            $table->string('signature')->nullable(); // File path or name for the uploaded signature
            $table->string('license_number')->nullable();
            $table->string('ghana_card')->nullable();

            $table->string('pillar_number_1')->nullable();
            $table->string('pillar_address_1')->nullable();
            $table->json('pillar_images_1')->nullable(); // JSON to store image paths/urls

            $table->string('pillar_number_2')->nullable();
            $table->string('pillar_address_2')->nullable();
            $table->json('pillar_images_2')->nullable();

            $table->string('pillar_number_3')->nullable();
            $table->string('pillar_address_3')->nullable();
            $table->json('pillar_images_3')->nullable();

            $table->string('pillar_number_4')->nullable();
            $table->string('pillar_address_4')->nullable();
            $table->json('pillar_images_4')->nullable();

            //step-8 PARTY "A" REP
            $table->enum('representing_as_a', ['Lessor', 'Lessee', 'Agent'])->nullable();
            $table->enum('representing_for_a', ['Individual', 'Organization', 'Stool', 'Community', 'Clan', 'Family'])->nullable();
            $table->string('rep_title_a')->nullable();
            $table->string('rep_title_numerals_a')->nullable();
            $table->string('rep_name_a')->nullable();
            $table->string('rep_digital_address_a')->nullable();
            $table->string('rep_id_number_a')->nullable();
            $table->string('purpose_phone_number')->nullable();
            $table->string('otp')->nullable();
            $table->string('rep_email_a')->nullable();
            $table->string('email_otp')->nullable();
            $table->enum('living_a', ['Yes', 'No'])->nullable();
            $table->string('digital_signature_a')->nullable();

            // PARTY "A" WITNESSES
            $table->string('rep_witness_name_a')->nullable();
            $table->string('rep_witness_digital_address_a')->nullable();
            $table->string('rep_witness_id_number_a')->nullable();
            $table->string('witness_phone_number')->nullable();
            $table->string('witness_otp')->nullable();
            $table->string('rep_witness_email_a')->nullable();
            $table->string('witness_email_otp')->nullable();
            $table->enum('living_witness_a', ['Yes', 'No'])->nullable();
            $table->string('witness_digital_signature_a')->nullable();

            //step-9 party b witness
            $table->string('representing_as_b')->nullable();
            $table->string('representing_for_b')->nullable();
            $table->string('rep_title_b')->nullable();
            $table->string('rep_title_numerals_b')->nullable();
            $table->string('rep_name_b')->nullable()->nullable();
            $table->string('rep_digital_address_b')->nullable();
            $table->string('rep_id_number_b')->nullable();
            $table->string('purpose_phone_number')->nullable();
            $table->string('otp')->nullable();
            $table->string('rep_email_a')->nullable();
            $table->string('email_otp')->nullable();
            $table->string('living_b')->nullable();
            $table->string('digital_signature_b')->nullable();
            $table->string('rep_witness_name_b')->nullable();
            $table->string('rep_witness_digital_address_b')->nullable();
            $table->string('rep_witness_id_number_b')->nullable();
            $table->string('witness_phone_number')->nullable();
            $table->string('witness_otp')->nullable();
            $table->string('rep_witness_email')->nullable();
            $table->string('witness_email_otp')->nullable();
            $table->string('living_witness_b')->nullable();
            $table->string('witness_digital_signature_b')->nullable();

            //step-10 deponent details
            // Deponent Fields
            $table->string('deponent_name')->nullable();
            $table->string('deponent_digital_address')->nullable();
            $table->string('deponent_id_number')->nullable();
            $table->string('purpose_phone_number')->nullable();
            $table->string('otp')->nullable(); // Store OTP if necessary
            $table->string('email_address')->nullable();
            $table->string('email_otp')->nullable(); // Store email OTP if necessary
            $table->enum('deponent_living', ['Yes', 'No'])->nullable();
            $table->string('deponent_digital_signature')->nullable();

            // Indenture Fields
            $table->string('term')->nullable();
            $table->date('start_period')->nullable();
            $table->date('end_period')->nullable();
            $table->text('agreement_text')->nullable();

            // Solicitor Fields
            $table->string('solicitor_name')->nullable();
            $table->string('solicitor_digital_address')->nullable();
            $table->string('solicitor_id_number')->nullable();
            $table->string('solicitor_phone_number')->nullable();
            $table->string('solicitor_otp')->nullable(); // Store OTP if necessary
            $table->string('solicitor_email_address')->nullable();
            $table->string('solicitor_email_otp')->nullable(); // Store email OTP if necessary
            $table->enum('solicitor_living', ['Yes', 'No'])->nullable();
            $table->string('solicitor_digital_signature')->nullable();

            // File Fields
            $table->string('indenture_files')->nullable(); // Store file paths as a comma-separated string
            $table->string('solicitor_files')->nullable(); // Store file paths as a comma-separated string

            //step-11 deponent details
            $table->string('land_title_number')->nullable();
            $table->string('land_title_images')->nullable(); // You can store the file path or URLs
            $table->string('land_title_status')->nullable();
            $table->date('yellow_card_date')->nullable();
            $table->string('land_title_time')->nullable();
            $table->string('payment_code')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('property_owners');
    }
}
