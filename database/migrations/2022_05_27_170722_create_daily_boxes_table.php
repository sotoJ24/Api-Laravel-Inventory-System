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
            $table->date('openingTime');
            $table->unsignedBigInteger('campus_id');
            $table->double('openingAmount')->require();
            $table->double('amountByInscription');
            $table->double('amountByMonthy');
            $table->double('amountBySell');
            $table->double('amountByReservations');
            $table->double('amountByCredits');
            $table->double('amountBySinpe');
            $table->double('amountByTransfer');
            $table->double('amountByCash');
            $table->date('closingTime');
            $table->text('observations');
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
