<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\ArticleController;
use App\Http\Controllers\Api\v1\UnitOfMeasureController;

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
Route::apiResource('articles', ArticleController::class)->names('api.v1.articles');
//{{-- UnitOfMeasure Routes --}}\\
Route::apiResource('unitofmeasures',UnitOfMeasureController::class)->names('api.v1.unitofmeasures');
