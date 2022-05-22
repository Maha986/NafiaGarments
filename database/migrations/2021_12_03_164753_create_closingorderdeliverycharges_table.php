<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClosingorderdeliverychargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('closingorderdeliverycharges', function (Blueprint $table) {
            $table->id();
            $table->integer('closingorder_id');
            $table->integer('order_id');
            $table->string('agreed_delivery_charges');
            $table->string('actual_delivery_charges');
            $table->string('courierinvoice_or_loadsheetnumber');
            $table->string('ridername_or_couriercompany');
            $table->string('profit_or_lossondeliverycharges');

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
        Schema::dropIfExists('closingorderdeliverycharges');
    }
}
