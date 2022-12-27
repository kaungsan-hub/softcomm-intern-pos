<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ItemLocationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function(){
    Route::get('/', [AdminController::class, 'index']);

    Route::get('/sample', [AdminController::class, 'sampleIndex']);
    Route::get('/sample/create-edit', [AdminController::class, 'sampleCreateEdit']);
    Route::resource('/item-location',ItemLocationController::class);
});
