<?php

<<<<<<< HEAD
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ItemsController;
=======
use App\Http\Controllers\Admin\AdminController; 
use App\Http\Controllers\Admin\SupplierController;
>>>>>>> origin/main
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function(){
    Route::get('/', [AdminController::class, 'index']);

    Route::get('/sample', [AdminController::class, 'sampleIndex']);
    Route::get('/sample/create-edit', [AdminController::class, 'sampleCreateEdit']);

<<<<<<< HEAD
    Route::resource('/items',ItemsController::class);
=======
    //Supplier
    Route::resource('/suppliers',SupplierController::class);

    // Route::get('/suppliers', [AdminController::class, 'index']);
    // Route::get('/suppliers/create-edit', [AdminController::class, 'create-edit']);



    

>>>>>>> origin/main
});