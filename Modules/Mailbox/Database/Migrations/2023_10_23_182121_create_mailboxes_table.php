<?php

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
        Schema::create('mailboxes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->nullable()->constrained('mailboxes');
            $table->string('subject');
            $table->longText('message');
            $table->enum('status', ['draft', 'sent', 'trash', 'received'])->default('draft');
            $table->tinyInteger('is_read')->default(0)->comment('1 = true, 0 = false');
            $table->tinyInteger('is_starred')->default(0)->comment('1 = true, 0 = false');
            $table->tinyInteger('is_important')->default(0)->comment('1 = true, 0 = false');
            $table->string('sender_email')->nullable()->comment('Email of the sender, used when sender is not a registered user');
            $table->foreignId('created_by')->nullable()->constrained('users')->comment('Sender user ID if sender is a registered user');
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mailboxes');
    }
};
