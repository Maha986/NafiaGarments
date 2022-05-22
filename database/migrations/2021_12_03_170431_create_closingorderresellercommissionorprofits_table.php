<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClosingorderresellercommissionorprofitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('closingorderresellercommissionorprofits', function (Blueprint $table) {
            $table->id();
            $table->integer('closingorder_id');
            $table->integer('order_id');
            $table->string('commission_amount');
            $table->string('commission_payment_transfered');
            $table->string('transfer_slip');
            $table->string('commission_balance');
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
        Schema::dropIfExists('closingorderresellercommissionorprofits');
    }
}
