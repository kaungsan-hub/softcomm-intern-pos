<?php

use App\Http\Controllers\Admin\ItemLocationController;

use App\Http\Controllers\Admin\{AdminController, AuthController, CounterController, CustomerController, UserController, ItemController};

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{CategoryController, BrandController, SupplierController, OpeningController};

Route::get('/', function () {
    return view('welcome');
});



// Login
Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware('authMiddleware')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'index']);
        // Sample
        Route::get('/sample', [AdminController::class, 'sampleIndex']);
        Route::get('/sample/create-edit', [AdminController::class, 'sampleCreateEdit']);

        // User
        Route::resource('/users', UserController::class);


    //Customer
    Route::resource('/customers',CustomerController::class);

    //Supplier
        Route::resource('/suppliers',SupplierController::class);
        //Supplier
        Route::resource('/suppliers', SupplierController::class);


        # item
        Route::resource('items', ItemController::class);

        # item-location

        Route::resource('/item-location', ItemLocationController::class);

        # category
        Route::resource('/categories', CategoryController::class);

        # counter
        Route::resource('/counters', CounterController::class);

        # brand
        Route::resource('/brands', BrandController::class);

        //Supplier
        Route::resource('/suppliers', SupplierController::class);

        #opening
        Route::resource('/openings', OpeningController::class);

    });
});
