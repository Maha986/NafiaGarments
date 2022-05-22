<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankrecievevouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bankrecievevouchers', function (Blueprint $table) {
            $table->id();
            $table->string('voucher_no');
            $table->date('date')->nullable();
            $table->string('recieved_from');
            $table->string('account_code');
            $table->string('particular');
            $table->float('debit');
            $table->float('credit');
            $table->double('total');
            $table->string('account_number_reference');
            $table->string('cheque_no');
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
        Schema::dropIfExists('bankrecievevouchers');
    }
}
