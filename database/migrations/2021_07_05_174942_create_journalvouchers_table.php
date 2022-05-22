<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJournalvouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journalvouchers', function (Blueprint $table) {
            $table->id();
              $table->string('voucher_no');
            $table->date('date')->nullable();
            $table->string('ledger_reference');
            $table->string('account_code');
            $table->string('particular');
            $table->float('debit');
            $table->float('credit');
            $table->double('total');
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
        Schema::dropIfExists('journalvouchers');
    }
}
