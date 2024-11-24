<?php

use Illuminate\Support\Facades\Route;
use App\Products\Http\Controllers\ProductController;
use App\Orders\Http\Controllers\OrdersController;
use  App\Auth\Http\Controllers\AuthController;

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




Route::middleware('auth.jwt')->group(function () {
    // Rutas de productos
    Route::prefix('products')->group(function () {
        Route::get('/version', function () {
            return response()->json(['version' => '1.0.0']);
        });
        Route::get('/',  [ProductController::class, 'index']);
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
