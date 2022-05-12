<?php

use App\Http\Controllers\Api\V1\ChangePasswordController;
use App\Http\Controllers\Api\V1\LoginController;
use App\Http\Controllers\Api\V1\ReviewController;
use App\Http\Controllers\Api\V1\RoomController;
use App\Http\Controllers\Api\V1\RoomTypeController;
use App\Http\Controllers\Api\V1\MessageController;
use App\Http\Controllers\Api\V1\OfferController;
use App\Http\Controllers\Api\V1\ProfileController;
use App\Http\Controllers\Api\V1\ReservationController;
use App\Http\Controllers\Api\V1\SettingController;
use App\Http\Controllers\Api\V1\RoomServiceRequestController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */


Route::prefix('v1')->group(function () {
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/user', [ProfileController::class, 'show']);
        Route::apiResource('reviews', ReviewController::class)->only('store');
        Route::apiResource('messages', MessageController::class)->only('store');
        Route::post('/change-password', [ChangePasswordController::class, 'change-password']);
        Route::apiResource('room-service-requests', RoomServiceRequestController::class)->only('store');
    });

    Route::apiResource('messages', MessageController::class)->only('store');
    Route::apiResource('offers', OfferController::class)->only(['index', 'show']);
    Route::apiResource('reviews', ReviewController::class)->only(['index']);
    Route::apiResource('settings', SettingController::class)->only(['index']);
    Route::apiResource('rooms', RoomController::class)->only(['index', 'show']);
    Route::apiResource('room-types', RoomTypeController::class)->only(['index', 'show']);
    Route::apiResource('reservations', ReservationController::class)->only('store');
    Route::get('reviews/stats', [ReviewController::class, 'stats']);
    Route::post('/login', [LoginController::class, 'login']);
});
