<?php

use Illuminate\Http\Request;

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
    Route::apiResource('vendors', 'VendorController');
    Route::apiResource('dishes', 'DishController');
    Route::apiResource('orders', 'OrderController');
    Route::get('/vendors/{id}/dishes', 'VendorController@dishes');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
