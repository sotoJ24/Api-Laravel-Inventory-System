<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_businesses', function (Blueprint $table) {
            $table->id();
            $table->string('businessesName');
            $table->string('phone',50);
            $table->string('email');
            $table->string('contact');
            $table->string('address');
            $table->unsignedBigInteger('statuses_id');

            $table->foreign('statuses_id')->references('id')->on('statuses');
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
        Schema::dropIfExists('customer_businesses');
    }
}
