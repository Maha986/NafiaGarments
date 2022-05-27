<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_discounts', function (Blueprint $table) {
            $table->id();
            $table->string('general_discount');
            $table->integer('product_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('reseller_id')->nullable();
            $table->integer('customer_id')->nullable();
            $table->bigInteger('discount');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
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
        Schema::dropIfExists('general_discounts');
    }
}
