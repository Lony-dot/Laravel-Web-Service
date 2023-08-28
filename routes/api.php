<?php

use App\Http\Controllers\Api\V1\CategoryController;
use App\Http\Controllers\Api\V1\ProductController;
use Illuminate\Support\Facades\Route;

/**
 * Route::get('/categories', [CategoryController::class, 'index']);
 * Route::post('/categories', [CategoryController::class, 'store']);
 * Route::put('/categories/{id}', [CategoryController::class, 'update']);
 * Route::delete('/categories/{id}', [CategoryController::class, 'delete']);
*/
Route::prefix('v1')->group(function () {
    Route::get('/categories/{id}/products', [CategoryController::class, 'products']);
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('products', ProductController::class);
});

