<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResellerwalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resellerwallets', function (Blueprint $table) {
            $table->id();
            $table->integer('reseller_id');
            $table->integer('order_id');
            $table->string('total_amount');
             $table->string('total_delivery_charges');
            $table->string('reseller_commission_payable');
            $table->string('reseller_commission_recieved');
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
        Schema::dropIfExists('resellerwallets');
    }
}
