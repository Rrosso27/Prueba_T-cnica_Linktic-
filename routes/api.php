<?php

use Illuminate\Support\Facades\Route;
use App\Products\Exports\ProductsExport;
use  App\Auth\Http\Controllers\AuthController;
use App\Orders\Http\Controllers\OrdersController;
use App\Products\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::middleware('auth.jwt')->get('user', [AuthController::class, 'getUser']);


Route::get('/version', function () {
    return response()->json(['version' => '1.0.13']);
});

Route::middleware('auth.jwt')->group(function () {
    // Rutas de productos
    Route::prefix('products')->group(function () {

        Route::get('/',  [ProductController::class, 'index']);
        Route::get('/export',  [ProductController::class, 'export']);
        Route::post('/',  [ProductController::class, 'store']);
        Route::get('{id}', [ProductController::class, 'show']);
        Route::put('{id}', [ProductController::class, 'update']);
        Route::delete('{id}', [ProductController::class, 'destroy']);


    });


    // Rutas de órdenes
    Route::prefix('orders')->group(function () {
        Route::get('/', [OrdersController::class, 'index']);
        Route::post('/', [OrdersController::class, 'store']);
        Route::get('{id}', [OrdersController::class, 'show']);
        Route::put('{id}', [OrdersController::class, 'update']);
        Route::delete('{id}', [OrdersController::class, 'destroy']);
    });


});
