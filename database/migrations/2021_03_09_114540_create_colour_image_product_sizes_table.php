<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColourImageProductSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colour_image_product_sizes', function (Blueprint $table) {
            $table->id();
            $table->integer('colour_id');
            $table->integer('product_id');
            $table->integer('size_id');
            $table->text('image');
            $table->unsignedBigInteger('quantity')->nullable();
            $table->string('variant_sku_code');
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
        Schema::dropIfExists('colour_image_product_sizes');
    }
}
