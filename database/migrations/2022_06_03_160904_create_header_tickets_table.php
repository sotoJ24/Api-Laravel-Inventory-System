<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateHeaderTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('header_tickets', function (Blueprint $table) {
            $table->id();
            $table->integer('consecutive');
            $table->date('date');
            $table->unsignedBigInteger('customers_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('campus_id');
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('dailyBox_id');
            $table->double('subTotal');
            $table->double('iva')->nullable();
            $table->double('discount')->nullable();
            $table->double('total');
            //FK
            $table->foreign('campus_id')->references('id')->on('campuses');
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('customers_id')->references('id')->on('customers');
            $table->foreign('dailyBox_id')->references('id')->on('daily_boxes');

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
        Schema::dropIfExists('header_tickets');
    }
}
