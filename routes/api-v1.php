<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\ArticleController;
use App\Http\Controllers\Api\v1\UnitOfMeasureController;
use App\Http\Controllers\Api\v1\BusinessController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::get('/test', function(){
 return "welcome to API SILE";
});

// {{-- Articles Routes --}}\\
Route::apiResource('articles', ArticleController::class)->names('api.v1.articles')->except(['destroy']);
Route::get('articlesEdit/{id}', [\App\Http\Controllers\Api\v1\ArticleController::class,'getArticleEdit'])->name('article.edit');
Route::put('articlesDestroy/{id}', [\App\Http\Controllers\Api\v1\ArticleController::class,'destroy'])->name('api.v1.articles.destroy');

//{{-- UnitOfMeasure Routes --}}\\
Route::apiResource('unitofmeasures',UnitOfMeasureController::class)->names('api.v1.unitofmeasures');
Route::apiResource('business',BusinessController::class)->names('api.v1.business');
