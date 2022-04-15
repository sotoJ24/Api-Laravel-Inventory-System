<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Api\v1\Supplier;
class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->string('phone',30)->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('contact',100)->nullable();
            $table->string('mobile',30)->nullable();
            $table->enum('state',[Supplier::Enable, Supplier::Disable])->default(Supplier::Enable);
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
        Schema::dropIfExists('suppliers');
    }
}
