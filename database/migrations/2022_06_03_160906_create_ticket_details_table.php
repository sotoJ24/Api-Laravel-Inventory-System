<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('article_id');
            $table->double('amount');
            $table->double('salePrice');
            $table->double('subTotal');
            $table->unsignedBigInteger('headerTicket_id');

            $table->foreign('article_id')->references('id')->on('articles');
            $table->foreign('headerTicket_id')->references('id')->on('header_tickets');
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
        Schema::dropIfExists('ticket_details');
    }
}
