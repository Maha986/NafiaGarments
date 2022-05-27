<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductForSaleCentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_for_sale_centers', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->integer('inventroy');
            $table->integer('batch_id')->nullable();
            $table->unsignedBigInteger('quantity')->nullable();
             $table->integer('color')->nullable();
             $table->integer('size')->nullable();
            $table->integer('salecenter_id');
            $table->integer('PricePerPiece');
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
        Schema::dropIfExists('product_for_sale_centers');
    }
}
