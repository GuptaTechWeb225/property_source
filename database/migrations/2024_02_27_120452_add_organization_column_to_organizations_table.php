<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('organizations', function (Blueprint $table) {
            $table->string('nationality')->nullable();
            $table->string('gis_code')->nullable();
            $table->string('ghana_card_or_id')->nullable();
            $table->string('establishment_year')->nullable();
            $table->string('organization_vat_number')->nullable();
            $table->string('about_company')->nullable();
            $table->string('digital_address')->nullable();
            $table->string('company_certificate_name')->nullable();
            $table->foreignId('company_certificate_attachment_id')->nullable()->constrained('images')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('organizations', function (Blueprint $table) {
            $table->dropColumn('nationality');
            $table->dropColumn('gis_code');
            $table->dropColumn('ghana_card_or_id ');
            $table->dropColumn('establishment_year');
            $table->dropColumn('organization_vat_number');
            $table->dropColumn('about_company');
            $table->dropColumn('digital_address');
            $table->dropColumn('company_certificate_name');
            $table->dropColumn('company_certificate_attachment_id');
        });
    }
};
