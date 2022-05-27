<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiderwalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riderwallets', function (Blueprint $table) {
            $table->id();
            $table->integer('rider_id');
            $table->string('product');
            $table->integer('order_id');
            $table->string('cash_payable');
            $table->string('cash_recievable')->nullable();
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
        Schema::dropIfExists('riderwallets');
    }
}
