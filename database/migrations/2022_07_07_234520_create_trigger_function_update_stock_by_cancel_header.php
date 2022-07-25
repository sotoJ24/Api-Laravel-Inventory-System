<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTriggerFunctionUpdateStockByCancelHeader extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE FUNCTION trigger_increases_quantity_articles() returns TRIGGER AS
        $$
        declare
            details Record;
            status Record;
            cur_detail Cursor for select article_id, quantity from ticket_details where "headerTicket_id" = new.id;
        begin
            for details in cur_detail loop
                update articles set stock = stock + details.quantity where id = details.article_id;
            end loop;
            return null;
        END
        $$
        language plpgsql
        ');
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //  DB::unprepared('DROP TRIGGER `trigger_increases_quantity_articles`');

    }
}
