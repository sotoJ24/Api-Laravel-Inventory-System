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
            $table->string('companyName',100);
            $table->string('phoneNumber',30)->nullable();
            $table->string('email')->unique();
            $table->string('sellerName',100)->nullable();
            $table->string('sellerPhoneNumber',30)->nullable();
            $table->unsignedBigInteger('statuses_id');

            $table->foreign('statuses_id')->references('id')->on('statuses');
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
