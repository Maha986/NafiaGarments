<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
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
        Schema::dropIfExists('riders');
    }
}
