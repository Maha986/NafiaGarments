<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number');
            $table->unsignedBigInteger('quantity');
            $table->integer('size_id');
            $table->integer('colour_id');
            $table->integer('product_id');
            $table->integer('user_id');
            $table->string('payment_type');
            $table->string('order_type')->nullable();
            $table->boolean('status')->default(1);
            $table->float('discount',36);
            $table->float('sub_total_amount',36);
            $table->float('delivery_charges',36);
            $table->float('total_amount',36);
            $table->integer('n_status')->default(0);
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
        Schema::dropIfExists('orders');
    }
}
