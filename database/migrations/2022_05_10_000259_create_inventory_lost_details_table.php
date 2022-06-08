<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryLostDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_lost_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('headerInventoryLost_id');
            $table->unsignedBigInteger('article_id');
            $table->double('salePrice',5,3);
            $table->unsignedBigInteger('unitOfMeasure_id');   //foreing key
            $table->double('quantity',5,3);
            $table->double('amount',5,3);
            $table->text('observation');
            $table->timestamps();
            //Foreing keys
            $table->foreign('headerInventoryLost_id')->references('id')->on('header_inventory_losts');
            $table->foreign('article_id')->references('id')->on('articles');
            $table->foreign('unitOfMeasure_id')->references('id')->on('unit_of_measures');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventory_lost_details');
    }
}
