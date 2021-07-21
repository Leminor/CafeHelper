<?php

use Illuminate\Http\Request;
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

Route::group(['middleware' => 'auth:api'], static function () {
    Route::get('users', 'App\Http\Controllers\Api\UsersController@all');

    Route::get('realizations', 'App\Http\Controllers\Api\RealizationsController@all');
    Route::post('realizations', 'App\Http\Controllers\Api\RealizationsController@create');
    Route::put('realizations/{id}', 'App\Http\Controllers\Api\RealizationsController@update');
    Route::delete('realizations/{id}', 'App\Http\Controllers\Api\RealizationsController@delete');

    Route::get('purchases', 'App\Http\Controllers\Api\PurchasesController@all');
    Route::post('purchases', 'App\Http\Controllers\Api\PurchasesController@create');
    Route::put('purchases/{id}', 'App\Http\Controllers\Api\PurchasesController@update');
    Route::delete('purchases/{id}', 'App\Http\Controllers\Api\PurchasesController@delete');
});

//Route::group(['middleware' => 'auth:api'], static function () {
//    Route::get('api.orders', static function (Request $request) {
//        return $request->user();
//    });
//});

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
