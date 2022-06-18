<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateStoreProcedureUpdateStockByInventoryLost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       $procedure = "DROP PROCEDURE IF EXISTS updating_inventory_by_lost;
            CREATE PROCEDURE updating_inventory_by_lost (articleid int, cantlost double precision)
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
        Schema::dropIfExists('store_procedure_update_stock_by_inventory_lost');
    }
}
