<?php

use App\Http\Controllers\Admin\ItemLocationController;

use App\Http\Controllers\Admin\{AdminController, OpeningController, AuthController, SupplierController, SetPriceController, PurchaseController, PurchaseDetailController, CounterController, CustomerController, UserController, ItemController, SaleController, CategoryController, BrandController, StoreController};
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});





// Login
Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);


Route::middleware('authMiddleware')->group(function () {
    Route::prefix('admin')->group(function () {
        // Main
        Route::get('/', [AdminController::class, 'index']);

        //set-price
        Route::resource('/setprices',SetPriceController::class);

        // Sample
        Route::get('/sample', [AdminController::class, 'sampleIndex']);
        Route::get('/sample/create-edit', [AdminController::class, 'sampleCreateEdit']);

        // User
        Route::resource('/users', UserController::class);

        // Customer
        Route::resource('/customers', CustomerController::class);

        //supplier
        Route::resource('/suppliers',SupplierController::class);

        Route::get('/suppliers/autocomplete-search', [SupplierController::class, 'autocompleteSearch']);

        // Item
        Route::resource('items', ItemController::class);

        // Item-location
        Route::resource('/item-location', ItemLocationController::class);

        // Category
        Route::resource('/categories', CategoryController::class);

        // Counter
        Route::resource('/counters', CounterController::class);

        // Brand
        Route::resource('/brands', BrandController::class);


        //Supplier
        Route::resource('/suppliers', SupplierController::class);

        #purchase
        Route::resource('/purchases', PurchaseController::class);
        Route::resource('/purchase-details', PurchaseDetailController::class);

        #store
        Route::get('/stores', [StoreController::class, 'index']);

        #opening
        Route::resource('/openings', OpeningController::class);

        // Sales
        Route::resource('/sales', SaleController::class);

        });

    });
