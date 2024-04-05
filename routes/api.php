<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DeliveryMethodController;
use App\Http\Controllers\PaymentTypeController;
use App\Http\Controllers\UserAddressController;
use App\Http\Controllers\UserPaymentCardController;
use App\Http\Controllers\OrderStatusController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProductReviewController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserSettingController;
use App\Http\Controllers\PaymentCardTypeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionContoller;
use App\Http\Controllers\ProductPhotoController;

use Illuminate\Support\Facades\Route;






Route::post('roles/assign', [RoleController::class, "assign"]);
Route::post('permissions/assign', [PermissionContoller::class, "assign"]);

Route::apiResource('products', ProductController::class);
Route::apiResource('settings', SettingController::class);
Route::apiResource('roles', RoleController::class);
Route::apiResource('permissions',PermissionContoller::class);
Route::apiResource('user-settings', UserSettingController::class)->middleware('auth:sanctum');
Route::apiResource('reviews', ReviewController::class)->middleware('auth:sanctum');
Route::apiResource('products.reviews',ProductReviewController::class)->middleware('auth:sanctum');
Route::apiResource('categories', CategoryController::class);
Route::apiResource('statuses.orders',OrderStatusController::class);
Route::apiResource('payment-types', PaymentTypeController::class);
Route::apiResource('delivery-methods', DeliveryMethodController::class);
Route::apiResource('categories.products', CategoryProductController::class);
Route::apiResource('products.photos', ProductPhotoController::class);

Route::apiResource('statuses', StatusController::class)->middleware('auth:sanctum');
Route::apiResource('orders', OrderController::class);
Route::apiResource('favorites',FavouriteController::class)->middleware('auth:sanctum');
Route::apiResource('user-addresses', UserAddressController::class)->middleware('auth:sanctum');
Route::apiResource('payment-card-types', PaymentCardTypeController::class)->middleware('auth:sanctum');
Route::apiResource('user-cards', UserPaymentCardController::class)->middleware('auth:sanctum');




