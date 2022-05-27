<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlockFloorProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('block_floor_products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('icon');
            $table->text('banner_1');
            $table->text('banner_2');
            $table->text('featured_banner');
            $table->string('colourCode');
            $table->integer('category_one');
            $table->integer('category_two');
            $table->integer('category_three');
            $table->integer('category_four');
            $table->integer('category_five');
            $table->integer('category_six');
            $table->integer('category_seven');
            $table->boolean('status');
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
        Schema::dropIfExists('block_floor_products');
    }
}
