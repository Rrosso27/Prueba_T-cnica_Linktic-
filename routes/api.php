<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Products\ProductController;
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
