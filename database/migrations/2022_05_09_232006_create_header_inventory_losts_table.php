<?php

use App\Models\Api\v1\HeaderInventoryLost;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeaderInventoryLostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('header_inventory_losts', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->unsignedBigInteger('user_id');     //foreing key
            $table->double('amount',5,3)->nullable();
            $table->unsignedBigInteger('campus_id');
            $table->enum('status',[HeaderInventoryLost::Open, HeaderInventoryLost::Close])->default(HeaderInventoryLost::Open);
            $table->timestamps();
            //Foreing keys
            $table->foreign('user_id')->references('id')->on('roots');
            $table->foreign('campus_id')->references('id')->on('campuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('header_inventory_losts');
    }
}
