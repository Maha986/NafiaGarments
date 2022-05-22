<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalereturnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salereturns', function (Blueprint $table) {
            $table->id();
            $table->string('order_number');
            $table->string('product_order_number');
            $table->integer('product_id');
            $table->integer('salecenter_id');
            $table->integer('batch_id');
            $table->integer('color_id');
            $table->integer('size_id');
            $table->string('reason');
            $table->string('amount');
            $table->integer('quantity');
            $table->string('sale_center');
            $table->string('category_route');
            $table->string('inventory_type');
            $table->string('reseller_or_customer');
            $table->string('city');
            $table->string('purchase_price');
            $table->string('discount');
            $table->string('amount');
            $table->string('purchase_price_after_discount');
            $table->string('reseller_price');
            $table->string('retail_price');
            $table->string('profit_or_loss');
            $table->string('courier_or_rider');
            $table->string('return_date');

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
        Schema::dropIfExists('salereturns');
    }
}
