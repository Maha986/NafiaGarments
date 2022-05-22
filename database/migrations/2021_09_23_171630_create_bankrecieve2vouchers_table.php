<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankrecieve2vouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bankrecieve2vouchers', function (Blueprint $table) {
            $table->id();
            $table->integer('bankrecievevoucher_id');
            $table->string('account_code');
            $table->string('particular');
            $table->float('debit');
            $table->float('credit');
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
        Schema::dropIfExists('bankrecieve2vouchers');
    }
}
