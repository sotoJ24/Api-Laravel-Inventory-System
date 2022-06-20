<?php

use App\Http\Controllers\Api\v1\BusinessController;
use App\Http\Controllers\Api\v1\HeaderInventoryLostController;
use App\Http\Controllers\Api\v1\CampusController;
use Illuminate\Support\Facades\Route;

//{{-- Business Routes --}}\\
Route::get('business/find/{super_user_id}',[App\Http\Controllers\Api\v1\BusinessController::class,'findBusiness'])->name('api.v1.business.find');
//{{-- campus Routes --}}\\
Route::get('campus/by/company/{super_user_id}',[App\Http\Controllers\Api\v1\CampusController::class,'getallCampusesByCompany'])->name('api.v1.campus.company');
Route::get('campus/edit/{id}',[CampusController::class,'getCampusEdit'])->name('api.v1.campus.edit');
Route::get('campus/superuserid/{id}',[CampusController::class,'getSuperUserId'])->name('api.v1.campus.superUser');
//{{-- headerInventory Routes --}}\\
Route::get('get/last/loss/header/{campus}', [HeaderInventoryLostController::class, 'getLastHeader'])->name('api.v1.lost.last');
Route::put('update/status/header', [HeaderInventoryLostController::class, 'updateStatus'])->name('api.v1.update.amount');

