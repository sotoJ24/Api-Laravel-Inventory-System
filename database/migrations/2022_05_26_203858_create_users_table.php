<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //campo de rol, mandarlo tostado, validar que solo sea 1-2 para crear
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name',72);
            $table->string('email',96);
            $table->string('password',30);
            $table->unsignedBigInteger('rol_id');
            $table->unsignedBigInteger('campus_id');
            $table->unsignedBigInteger('statuses_id');
            //FK
            $table->foreign('rol_id')->references('id')->on('rols');
            $table->foreign('campus_id')->references('id')->on('campuses');
            $table->foreign('statuses_id')->references('id')->on('statuses');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
