<?php

use App\Http\Controllers\Admin\AdminController; 
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function(){
    Route::get('/', [AdminController::class, 'index']);

    Route::get('/sample', [AdminController::class, 'sampleIndex']);
    Route::get('/sample/create-edit', [AdminController::class, 'sampleCreateEdit']);

    //Customer
    Route::resource('/customers',CustomerController::class);

    //Supplier
    Route::resource('/suppliers',SupplierController::class);

    // Route::get('/suppliers', [AdminController::class, 'index']);
    // Route::get('/suppliers/create-edit', [AdminController::class, 'create-edit']);



    

});