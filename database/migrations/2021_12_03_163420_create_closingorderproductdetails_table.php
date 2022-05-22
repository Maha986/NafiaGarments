<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClosingorderproductdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('closingorderproductdetails', function (Blueprint $table) {
            $table->id();
            $table->integer('closingorder_id');
            $table->integer('order_id');
            $table->string('picture');
            $table->string('product_number');
            $table->string('purchase_price_after_discount');
            $table->integer('quantity');
            $table->string('sellprice');
            $table->string('discount');
            $table->string('profit_loss');
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
        Schema::dropIfExists('closingorderproductdetails');
    }
}
