<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyBoxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_boxes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->date('openingDate');
            $table->time('openingTime');
            $table->unsignedBigInteger('campus_id');
            $table->double('openingAmount')->require();
            $table->date('closingDate')->nullable();
            $table->time('closingTime')->nullable();
            $table->text('observations')->nullable();
            $table->unsignedBigInteger('statuses_id');
            $table->foreign('statuses_id')->references('id')->on('statuses');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('campus_id')->references('id')->on('campuses');
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
        Schema::dropIfExists('daily_boxes');
    }
}
