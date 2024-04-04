<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\Admin\AdminOrderController;

Route::prefix('statistic')->group(function (){
    Route::get('orders-number', [StatisticController::class, 'orderCount'])->middleware('auth:sanctum');
    Route::get('total-sales-sum', [StatisticController::class, 'orderSalesSum'])->middleware('auth:sanctum');
    Route::get('deliver-methods-stats', [StatisticController::class, 'deliveryMethodStats'])->middleware('auth:sanctum');
    Route::get('orders-per-day', [StatisticController::class, 'ordersPerDay'])->middleware('auth:sanctum');

});

Route::apiResource('orders', AdminOrderController::class);
