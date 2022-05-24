<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeaderInventoryLostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('header_inventory_losts', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->unsignedBigInteger('user_id');     //foreing key
            $table->double('amount',5,3)->nullable();
            $table->timestamps();
            //Foreing keys
            $table->foreign('user_id')->references('id')->on('roots');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('header_inventory_losts');
    }
}