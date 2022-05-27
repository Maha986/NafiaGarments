<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batches', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('number');
            $table->dateTime('date');
            $table->unsignedBigInteger('labour_cost');
            $table->unsignedBigInteger('transportation_cost');
            $table->unsignedBigInteger('other_cost_one')->nullable();
            $table->unsignedBigInteger('other_cost_two')->nullable();
            $table->string('head_cost_one')->nullable();
            $table->string('head_cost_two')->nullable();
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
        Schema::dropIfExists('batches');
    }
}
