<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleCenterOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_center_orders', function (Blueprint $table) {
            $table->id();
            $table->integer('salecenter_id');
            $table->string('order_number');
            $table->integer('product_id');
            $table->integer('owner_id');
            $table->unsignedBigInteger('quantity');
            $table->integer('colour_id');
            $table->integer('size_id');
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('sale_center_orders');
    }
}
