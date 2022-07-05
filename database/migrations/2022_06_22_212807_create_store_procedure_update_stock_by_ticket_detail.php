<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreProcedureUpdateStockByTicketDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $procedure = "DROP PROCEDURE IF EXISTS updating_ticket_by_detail;
            CREATE PROCEDURE updating_ticket_by_detail (articleid int, cantlost double precision)
            language plpgsql
            as $$
            BEGIN
                update articles set stock = stock - cantlost where id = articleid;
            commit;
            END;$$";

        \DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store_procedure_update_stock_by_ticket_detail');
    }
}
