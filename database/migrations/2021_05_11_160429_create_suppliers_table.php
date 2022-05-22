<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('business_name');
            $table->text('address');
            $table->string('city');
            $table->string('area');
            $table->string('contact');
            $table->string('cnic_no');
            $table->text('cnic_front');
            $table->text('cnic_back');
            $table->string('messaging_service_no')->nullable();
            $table->string('messaging_service_name')->nullable();
            $table->string('email');
            $table->string('social_media_name_1')->nullable();
            $table->string('link_1')->nullable();
            $table->string('social_media_name_2')->nullable();
            $table->string('link_2')->nullable();
            $table->string('bank_account_title');
            $table->string('bank_name');
            $table->string('bank_branch');
            $table->string('account_or_iban_no');
            $table->string('money_transfer_no');
            $table->string('money_transfer_service');
            $table->boolean('status');
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
        Schema::dropIfExists('suppliers');
    }
}
