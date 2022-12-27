<?php

<<<<<<< HEAD
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
=======
use App\Http\Controllers\Admin\AdminController; 
use App\Http\Controllers\Admin\SupplierController;
>>>>>>> 68eecde95ed9b96eb6b040c14b64c5451d8deb8b
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


<<<<<<< HEAD
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
    });
});
=======
    Route::get('/sample', [AdminController::class, 'sampleIndex']);
    Route::get('/sample/create-edit', [AdminController::class, 'sampleCreateEdit']);

    //Supplier
    Route::resource('/suppliers',SupplierController::class);

    // Route::get('/suppliers', [AdminController::class, 'index']);
    // Route::get('/suppliers/create-edit', [AdminController::class, 'create-edit']);



    

});
>>>>>>> 68eecde95ed9b96eb6b040c14b64c5451d8deb8b
