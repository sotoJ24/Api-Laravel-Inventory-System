<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateCampusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campuses', function (Blueprint $table) {
            $table->id();
            $table->string('name',100)->unique();
            $table->string('address')->nullable();
            $table->string('phone',30)->nullable();
            $table->string('email',100)->nullable();
            $table->bigInteger('consecutive');
            $table->unsignedBigInteger('states_id');
            $table->unsignedBigInteger('businesses_id');
            $table->timestamps();
            //Foreing keys
            $table->foreign('states_id')->references('id')->on('statuses');
            $table->foreign('businesses_id')->references('id')->on('businesses');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campuses');
    }
}
