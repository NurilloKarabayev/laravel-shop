<?php

use Illuminate\Support\Facades\Route ;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

Route::post('login', [\App\Http\Controllers\AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);
Route::get('user', [AuthController::class, 'user'] )->middleware('auth:sanctum');
Route::post('register', [AuthController::class, 'register'] )->middleware('auth:sanctum');
Route::get('products/{product}/related', [ProductController::class, 'related']);
