<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiderproductordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riderproductorders', function (Blueprint $table) {
            $table->id();
            $table->integer('rider_id');
            $table->string('product_name');
            $table->string('description');
            $table->integer('quantity');
            $table->integer('color');
            $table->integer('size');
            $table->string('address');
            $table->string('date');
            $table->string('cash');
            $table->integer('order_id');
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
        Schema::dropIfExists('riderproductorders');
    }
}
