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
            $table->double('limitedCredit');
            $table->double('timeCredit');
            $table->string('identifier')->unique();
            $table->string('IdType');
            $table->unsignedBigInteger('customer_businesses')->nullable();
            $table->unsignedBigInteger('statuses_id');
            //FK
            $table->foreign('statuses_id')->references('id')->on('statuses');
            $table->foreign('customer_businesses')->references('id')->on('customer_businesses');
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
