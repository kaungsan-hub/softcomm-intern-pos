<?php

use App\Http\Controllers\Admin\ItemLocationController;

use App\Http\Controllers\Admin\{AdminController, AuthController, UserController, ItemController};

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{CategoryController, BrandController,SupplierController};
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

    Route::get('/sample', [AdminController::class, 'sampleIndex']);
    Route::get('/sample/create-edit', [AdminController::class, 'sampleCreateEdit']);

        //Supplier
        Route::resource('/suppliers',SupplierController::class);

});
});