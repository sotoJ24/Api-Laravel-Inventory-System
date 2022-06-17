<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampusAmountControlBoxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campus_amount_control_boxes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nameAmountControlBoxes_id');
            $table->unsignedBigInteger('campus_id');
            $table->foreign('nameAmountControlBoxes_id')->references('id')->on('name_amount_control_boxes');
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
        Schema::dropIfExists('campus_amount_control_boxes');
    }
}
