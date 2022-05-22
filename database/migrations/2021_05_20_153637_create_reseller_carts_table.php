<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResellerCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reseller_carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quantity');
            $table->integer('size_id');
            $table->integer('colour_id');
            $table->integer('product_id');
            $table->integer('user_id');
            $table->string('sub_total');
            $table->string('totalprice_withdelivery');
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
        Schema::dropIfExists('reseller_carts');
    }
}
