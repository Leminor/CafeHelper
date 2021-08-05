<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\RealizationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'guest'], static function() {
    Route::get('register', [RegisterController::class, 'index']);
    Route::get('login', [LoginController::class, 'index']);

    Route::post('register', [RegisterController::class, 'process']);
    Route::post('login', [LoginController::class, 'process']);
});

Route::group(['middleware' => 'auth'], static function() {
    Route::get('/', [IndexController::class, 'index']);

    Route::get('import', [ImportController::class, 'index']);
    Route::get('export', [ExportController::class, 'index']);
    Route::post('import/excel', [ImportController::class, 'process']);
    Route::post('export/excel', [ExportController::class, 'process']);

    Route::get('show/realizations', [RealizationController::class, 'show']);
    Route::get('create/realization', [RealizationController::class, 'create']);

    Route::get('show/purchases', [PurchaseController::class, 'show']);
    Route::get('create/purchase', [PurchaseController::class, 'create']);
    Route::post('order/create', 'App\Http\Controllers\OrdersController@create')->name('order/create');

    Route::get('logout', [LogoutController::class, 'process']);

});






