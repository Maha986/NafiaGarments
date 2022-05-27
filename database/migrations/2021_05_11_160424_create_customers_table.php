<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('city');
            $table->string('area');
            $table->string('contact');
            $table->string('email');
            $table->string('messaging_service_no')->nullable();
            $table->string('messaging_service_name')->nullable();
            $table->string('social_media_name_1')->nullable();
            $table->string('link_1')->nullable();
            $table->string('social_media_name_2')->nullable();
            $table->string('link_2')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
