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
use App\Http\Controllers\Api\v1\CustomerController;
use App\Http\Controllers\Api\v1\UsersController;
use App\Http\Controllers\Api\v1\DailyBoxController;
use App\Http\Controllers\Api\v1\HeaderTicketController;
use App\Http\Controllers\Api\v1\TicketDetailController;
use App\Http\Controllers\Api\v1\InventoryLostDetailController;

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

// //{{-- Supplier Routes --}}\\
Route::apiResource('suppliers',SupplierController::class)->names('api.v1.supplier');

//{{-- Customer Routes --}}\\
Route::apiResource('customers',CustomerController::class)->names('api.v1.customers');
Route::get('customersInactive/{customer}',[\App\Http\Controllers\Api\v1\CustomerController::class,'InactiveCustomers'])->name('api.v1.customers.inactive');

//{{-- Users Routes --}}\\
Route::apiResource('users',UsersController::class)->names('api.v1.users');

//{{-- DailyBox Routes --}}\\
Route::apiResource('dailybox',DailyBoxController::class)->names('api.v1.dailybox');
Route::get('dailybox/statusBox/{statusBox}',[\App\Http\Controllers\Api\v1\DailyBoxController::class,'StatusBox'])->name('api.v1.dailybox.status');
Route::get('dailyboxDate',[\App\Http\Controllers\Api\v1\DailyBoxController::class,'lookingDate'])->name('api.v1.dailybox.date');

//{{-- HeaderTicket Routes --}}\\
Route::apiResource('headerticket',HeaderTicketController::class)->names('api.v1.headerticket');
Route::get('headerticket/statusHeader/{statusHeader}',[\App\Http\Controllers\Api\v1\HeaderTicketController::class,'showAllHeaderByStatus'])->name('api.v1.headerTicket.status');
Route::get('headerTicketDate',[\App\Http\Controllers\Api\v1\HeaderTicketController::class,'lookingDate'])->name('api.v1.headerTicket.date');
Route::get('headerTicket/DateAndCampus',[\App\Http\Controllers\Api\v1\HeaderTicketController::class,'searchCampusHeaderTicketByDateRanges'])->name('api.v1.headerTicket.showCampusAndDate');

//{{-- TicketDetail Routes --}}\\
Route::apiResource('ticketDetail',TicketDetailController::class)->names('api.v1.tickedDetail');
Route::get('ticketDetail/increaseQuantityOfArticle/{id}',[\App\Http\Controllers\Api\v1\TicketDetailController::class,'increaseQuantityOfArticle'])->name('api.v1.tickedDetail.addQuantity');

//{{-- Super User Routes --}}\\
Route::apiResource('roots', RootController::class)->names('api.v1.roots');

//{{-- InventoryLostDetail Routes --}}\\
Route::apiResource('InventoryLostDetail',InventoryLostDetailController::class)->names('api.v1.inventoryLostDetail');

