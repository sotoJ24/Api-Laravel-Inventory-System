<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Api\v1\Article;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('barcode',50)->unique();
            $table->unsignedBigInteger('unitOfMeasure_id');     //foreing key
            $table->string('name',100);
            $table->double('purchasePrice',15,4);
            $table->double('salePrice',15,4);
            $table->enum('states',[Article::Enable, Article::Disable])->default(Article::Enable);
            $table->double('stock',15,4);
            $table->double('minimumStock',15,4);
            $table->timestamps();
       //Foreing keys
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
        Schema::dropIfExists('articles');
    }
}
