<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Api\v1\Campus;

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
            $table->enum('states',[Campus::Enable, Campus::Disable])->default(Campus::Enable);
            $table->unsignedBigInteger('company_id');//foreing key
            $table->timestamps();
            //Foreing keys
            $table->foreign('company_id')->references('id')->on('companies');
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
