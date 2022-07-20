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
            $table->unsignedBigInteger('campuses_id');
            $table->string('name',100);
            $table->double('purchasePrice',15,4);
            $table->double('salePrice',15,4);
            $table->enum('states',[Article::Enable, Article::Disable])->default(Article::Enable);
            $table->double('stock',15,4);
            $table->double('minimumStock',15,4);
            $table->unsignedBigInteger('taxRate_id');
            $table->timestamps();
       //Foreing keys
            $table->foreign('unitOfMeasure_id')->references('id')->on('unit_of_measures');
            $table->foreign('campuses_id')->references('id')->on('campuses');
            $table->foreign('taxRate_id')->references('id')->on('tax_rate_and_codes');
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
