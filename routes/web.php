<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\APIController;

Route::get('/api-docs', [APIController::class, 'index']);

Route::get('/', function () {
    return view('welcome');
});

// Authentication routes
Route::get('/auth/google/redirect', [GoogleAuthController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);

// Cart Management
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/cart', [CartController::class, 'addToCart']);
    Route::put('/cart/{id}', [CartController::class, 'updateItem']);
    Route::delete('/cart/{id}', [CartController::class, 'deleteItem']);

     // Checkout
    Route::post('/checkout', [OrderController::class, 'checkout']);
});

