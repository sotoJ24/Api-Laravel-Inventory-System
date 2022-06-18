<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyBoxCampusAmountControlBoxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_box_campus_amount_control_boxes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Dailybox_id');
            $table->unsignedBigInteger('CampusAmountControlBoxes_id');
            $table->double('amount');

            $table->foreign('Dailybox_id')->references('id')->on('daily_boxes');
            $table->foreign('CampusAmountControlBoxes_id')->references('id')->on('campus_amount_control_boxes');
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
        Schema::dropIfExists('daily_box_campus_amount_control_boxes');
    }
}
