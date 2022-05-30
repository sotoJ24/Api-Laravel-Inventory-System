<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\ArticleController;
use App\Http\Controllers\Api\v1\RootController;
use App\Http\Controllers\Api\v1\UnitOfMeasureController;
use App\Http\Controllers\Api\v1\BusinessController;
use App\Http\Controllers\Api\v1\CampusController;
use App\Http\Controllers\Api\v1\CustomerBusinessController;
use App\Http\Controllers\Api\v1\SupplierController;
use App\Http\Controllers\Api\v1\customerController;
use App\Http\Controllers\Api\v1\UsersController;

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
Route::get('articles/find/{barcode}',[\App\Http\Controllers\Api\v1\ArticleController::class,'findArticle'])->name('api.v1.article.find');

//{{-- UnitOfMeasure Routes --}}\\
Route::apiResource('unitofmeasures',UnitOfMeasureController::class)->names('api.v1.unitofmeasures');

//{{-- Business Routes --}}\\
Route::apiResource('business',BusinessController::class)->names('api.v1.business');

//{{-- Campus Routes --}}\\
Route::apiResource('campus',CampusController::class)->names('api.v1.campus');

//{{-- CustomerBusinesses Routes --}}\\
Route::apiResource('customers/business',CustomerBusinessController::class)->names('api.v1.customers.businesses');

//{{-- Supplier Routes --}}\\
Route::apiResource('suppliers',SupplierController::class)->names('api.v1.supplier');

//{{-- Customer Routes --}}\\
Route::apiResource('customers',customerController::class)->names('api.v1.customers');
Route::get('customersInactive/{customer}',[\App\Http\Controllers\Api\v1\customerController::class,'InactiveCustomers'])->name('api.v1.customers.inactive');

//{{-- Users Routes --}}\\
Route::apiResource('users',UsersController::class)->names('api.v1.users');

//{{-- Super User Routes --}}\\
Route::apiResource('roots', RootController::class)->names('api.v1.roots');
