<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\InvestmentController;

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

Route::group(['prefix' => 'v1/'], function () {
    Route::get('/',function () {
        return response()->json(['application' => 'stake, laravel 9.'], 200);
    });
    
    Route::apiResource('users', UserController::class);
    Route::group(['prefix' => 'auth/'], function () {
        Route::post('authenticate', [UserController::class, 'authenticate']);
    });
    Route::apiResource('properties', PropertyController::class);
    Route::apiResource('investments', InvestmentController::class);
});


