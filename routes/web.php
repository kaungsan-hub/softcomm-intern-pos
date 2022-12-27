<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{CategoryController, BrandController};

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function(){
    Route::get('/', [AdminController::class, 'index']);

    Route::get('/sample', [AdminController::class, 'sampleIndex']);
    Route::get('/sample/create-edit', [AdminController::class, 'sampleCreateEdit']);

    # category
    Route::resource('/categories',CategoryController::class);
    # brand
    Route::resource('/brands',BrandController::class);


});