<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         DB::unprepared('
            CREATE TRIGGER trigger_increase_quantity_article AFTER UPDATE ON ticket_details
                BEGIN
                  update articles set stock = stock + quantity where id = articleid;
                  //more code here
                END
         ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER "trigger_increase_quantity_article"');
    }
}
