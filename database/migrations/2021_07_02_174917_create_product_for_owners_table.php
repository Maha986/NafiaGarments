<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductForOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_for_owners', function (Blueprint $table) {
            $table->id();
            $table->string('owner_name');
            $table->string('product_id');
            $table->integer('size_id');
            $table->integer('color_id');
            $table->integer('productQuantity');
            $table->integer('cost');
            $table->integer('profit');
             $table->integer('batch_id');
            $table->integer('sold')->nullable();
            $table->integer('instock')->nullable();
            $table->integer('PricePerPiece');
            $table->integer('TotalPrice');
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
        Schema::dropIfExists('product_for_owners');
    }
}
