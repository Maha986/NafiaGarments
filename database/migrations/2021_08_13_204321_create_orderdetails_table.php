<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderdetails', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('order_id');
            $table->string('order_from');
            $table->string('name');
            $table->string('address');
            $table->string('city');
            $table->string('location');
            $table->string('contactno');
            $table->string('special_delivery_instruction');
            $table->string('far_fetched_town');
            $table->string('urgentdelivery');
            $table->string('delivery_required_before');
            $table->string('totalamount');
            $table->string('deliverycharges');
            $table->string('advancepayment');
            $table->string('advancepayment_transfer_slip');
            $table->string('cashofdeliveryamount');
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
        Schema::dropIfExists('orderdetails');
    }
}
