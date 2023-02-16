<?php

use App\Http\Controllers\Api\Authorization\AuthController;
use App\Http\Controllers\InterestController;
use App\Http\Middleware\Interest\InterestAccessMiddleware;
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

/** Authorization */
Route::post('register', [AuthController::class , 'register']);
Route::post('login', [AuthController::class , 'login']);

Route::middleware('auth:sanctum')->group( function () {
    Route::post('logout', [AuthController::class , 'logout']);

    Route::apiResource('interests', InterestController::class)->except(['update', 'destroy']);

    Route::middleware(InterestAccessMiddleware::class)->group(function () {
        Route::put('interests/{interest}', [InterestController::class, 'update']);
        Route::delete('interests/{interest}', [InterestController::class, 'destroy']);
    });

    Route::get('search/interests', [InterestController::class, 'search']);
});
