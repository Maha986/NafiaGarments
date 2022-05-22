<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvancepaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advancepayments', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->string('payment_recieved');
            $table->string('transaction_id');
            $table->string('bank_details');
            $table->float('amount');
            $table->text('transaction_date');
            $table->integer('status');
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
        Schema::dropIfExists('advancepayments');
    }
}
