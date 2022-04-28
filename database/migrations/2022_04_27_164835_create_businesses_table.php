<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesses', function (Blueprint $table){
            $table->id();
            $table->string('name',50)->unique();
            $table->string('identifier',20)->unique();
            $table->unsignedBigInteger('statuses_id');
            $table->unsignedBigInteger('super_user_id');
            $table->string('phone',25); 
            $table->string('email',100);
            $table->timestamps();
            $table->foreign('statuses_id')->references('id')->on('statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('businesses');
    }
}
