<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->boolean('status');
            $table->string('batch_id');
            $table->string('product_sku_code');
            $table->text('description')->nullable();
            $table->string('owner')->nullable();
            $table->string('vendor')->nullable();
            $table->text('video_link')->nullable();
            $table->unsignedBigInteger('product_weight');
            $table->float('price',36);
            $table->float('purchase_cost',36)->nullable();
            $table->float('purchase_discount',36)->nullable();
            $table->bigInteger ('purchase_discount_percentage')->nullable();
            $table->float('labour_cost',36)->nullable();
            $table->float('transportation_cost',36)->nullable();
            $table->float('list_price_for_salesman',36)->nullable();
            $table->float ('commission_amount',36)->nullable();
            $table->bigInteger ('commission')->nullable();
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
        Schema::dropIfExists('products');
    }
}
