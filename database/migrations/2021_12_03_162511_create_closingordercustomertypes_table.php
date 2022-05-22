<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClosingordercustomertypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('closingordercustomertypes', function (Blueprint $table) {
            $table->id();
            $table->integer('closingorder_id');
            $table->integer('order_id');
            $table->string('deliverytype');
            $table->string('consignee_name');
            $table->string('city');
            $table->string('tehsil');
            $table->string('district');
            $table->string('delivery_address');
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
        Schema::dropIfExists('closingordercustomertypes');
    }
}
