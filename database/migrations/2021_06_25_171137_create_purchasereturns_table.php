<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasereturnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchasereturns', function (Blueprint $table) {
            $table->id();
            $table->integer('salecenter_id');
            $table->string('product');
            $table->integer('color');
            $table->integer('size');
            $table->integer('batch_id');
             $table->integer('product_quantity');
            $table->integer('purchase_order_number');
             $table->string('purchaseorder_date');
              $table->string('category_route');
               $table->string('inventory_type');
                $table->string('purchase_price_after_discount');
                 $table->integer('rider');
                   $table->string('return_reason');
                    $table->integer('payment_adjustment');

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
        Schema::dropIfExists('purchasereturns');
    }
}
