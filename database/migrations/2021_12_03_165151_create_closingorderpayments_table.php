<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClosingorderpaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('closingorderpayments', function (Blueprint $table) {
            $table->id();
            $table->integer('closingorder_id');
            $table->integer('order_id');
            $table->integer('product_amount');
            $table->integer('resellerprofit_or_commission');
            $table->string('totalorder_amount');
            $table->string('advance_payment');
            $table->string('cashondeliveryamount');
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
        Schema::dropIfExists('closingorderpayments');
    }
}
