<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article__suppliers', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('supplier_id');
            $table->unsignedBigInteger('article_id');
            $table->timestamps();

            //foreing key
            // $table->foreign('supplier_id')->references('id')->on('suppliers');
            $table->foreign('article_id')->references('id')->on('articles');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article__suppliers');
    }
}
