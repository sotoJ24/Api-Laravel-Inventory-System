<?php
use App\Http\Controllers\Api\v1\RootController;
use Illuminate\Support\Facades\Route;

Route::get('roots/edit/{id}',[\App\Http\Controllers\Api\v1\RootController::class,'getRootEdit'])->name('root.edit');
