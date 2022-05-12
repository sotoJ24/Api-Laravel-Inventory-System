<?php
use App\Http\Controllers\Api\v1\RootController;
use App\Http\Controllers\Api\v1\HeaderInventoryLostController;
use Illuminate\Support\Facades\Route;

Route::get('roots/edit/{id}',[\App\Http\Controllers\Api\v1\RootController::class,'getRootEdit'])->name('root.edit');

// {{-- headerInventoryLost Routes --}}\\
Route::apiResource('header-inventory-lost', HeaderInventoryLostController::class)->names('api.v1.header.inventory.lost');
