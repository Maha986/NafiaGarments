<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductorderdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productorderdetails', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->integer('user_id');
            $table->string('product_id');
            $table->string('product_quantity');
            $table->string('product_weight');
             $table->string('product_owner');
            $table->string('size');
            $table->string('color');
            $table->string('total_price');
            $table->integer('confirm_order');
            $table->integer('confirm_packing');
            $table->integer('order_status');
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
        Schema::dropIfExists('productorderdetails');
    }
}
