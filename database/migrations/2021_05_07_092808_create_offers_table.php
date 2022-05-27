<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('offer');
            $table->integer('product_id')->nullable();
            $table->integer('size_id');
            $table->integer('color_id');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->string('code')->nullable();
            $table->float('min_amount',36)->nullable();
            $table->bigInteger('discount')->nullable();
            $table->integer('no_of_times')->nullable();
            $table->string('deal_for');
            $table->string('specific_deal_for')->nullable();
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
        Schema::dropIfExists('offers');
    }
}
