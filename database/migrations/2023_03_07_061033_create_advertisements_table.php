<?php

use App\Enums\Status;
use App\Enums\DealType;
use App\Enums\ApprovalStatus;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete();

            $table->foreignId('property_id')->constrained('properties')->cascadeOnDelete();
            $table->foreignId('property_creator_id')->nullable()->constrained('users')->cascadeOnDelete();
            $table->tinyInteger('advertisement_type')->default(DealType::RENT)->comment('1:Rent;2:Sell;3:mortgage;4:Lease;5:caretaker;');

            $table->double('booking_amount')->nullable();

            // if this is for rent
            $table->double('rent_amount')->nullable();
            $table->tinyInteger('rent_type')->comment('1 for monthly, 2 for yearly')->nullable();
            $table->date('rent_start_date')->nullable();
            $table->date('rent_end_date')->nullable();

            $table->integer('max_member')->nullable();

            $table->decimal('mortgage_amount')->nullable();
            $table->integer('mortgage_duration')->nullable();

            // Lease
            $table->decimal('lease_amount')->nullable();
            $table->integer('lease_duration')->nullable();


            $table->integer('caretaker_duration')->nullable();


            // if this is for sell
            $table->double('sell_amount')->nullable();
            $table->date('sell_start_date')->nullable();


            // negotiable or not
            $table->tinyInteger('negotiable')->default(1)->comment('1 for negotiable, 0 for not negotiable');
            $table->tinyInteger('status')->default(App\Enums\Status::ACTIVE);


            // approval status
            $table->tinyInteger('approval_status')->default(ApprovalStatus::PENDING);
            $table->foreignId('approved_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->timestamp('approved_at')->nullable();

            $table->longText('terms_condition');
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
        Schema::dropIfExists('advertisements');
    }
};
