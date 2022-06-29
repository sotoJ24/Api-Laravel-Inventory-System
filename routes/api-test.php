<?php
use App\Http\Controllers\Api\v1\RootController;
use App\Http\Controllers\Api\v1\HeaderInventoryLostController;
use App\Http\Controllers\Api\v1\InventoryLostDetailController;
use Illuminate\Support\Facades\Route;

Route::get('roots/edit/{id}',[RootController::class,'getRootEdit'])->name('root.edit');

// {{-- headerInventoryLost Routes --}}\\
Route::apiResource('header-inventory-lost', HeaderInventoryLostController::class)->names('api.v1.header.inventory.lost');
Route::get('lost', [HeaderInventoryLostController::class, 'showLostByDateRange'])->name('api.vi.lost.range');

// {{-- headerInventoryLost Routes --}}\\
Route::apiResource('details-inventory-lost', InventoryLostDetailController::class)->names('api.v1.details.inventory.lost');
