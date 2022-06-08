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
            $table->dateTime('openingDate');
            $table->time('openingTime');
            $table->unsignedBigInteger('campus_id');
            $table->double('openingAmount')->require();
            $table->double('amountByInscription')->nullable();
            $table->double('amountByMonthy')->nullable();
            $table->double('amountBySell')->nullable();
            $table->double('amountByReservations')->nullable();
            $table->double('amountByCredits')->nullable();
            $table->double('amountBySinpe')->nullable();
            $table->double('amountByTransfer')->nullable();
            $table->double('amountByCash')->nullable();
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
