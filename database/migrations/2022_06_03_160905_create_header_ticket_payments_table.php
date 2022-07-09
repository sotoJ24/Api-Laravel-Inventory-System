<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeaderTicketPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('header_ticket_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paymentsMethods_id');
            $table->unsignedBigInteger('header_tickets_id');
            $table->integer('numberDocumentPay')->nullable();
            $table->double('amount');
            $table->timestamps();

            $table->foreign('header_tickets_id')->references('id')->on('header_tickets');
            $table->foreign('paymentsMethods_id')->references('id')->on('payments_methods');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('header_ticket_payments');
    }
}
