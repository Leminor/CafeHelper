<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductsController;
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
    Route::get('login', [
        'as' =>'login',
        'uses' => fn() => view('auth.login')
    ]);

    Route::post('register', [RegisterController::class, 'process']);
    Route::post('login', [LoginController::class, 'process']);
});

Route::group(['middleware' => 'auth'], static function() {
    Route::get('/', [IndexController::class, 'index'])->name('/');

    Route::get('import', [ImportController::class, 'index'])->name('/import');
    Route::get('export', [ExportController::class, 'index'])->name('/export');
    Route::post('import/excel', [ImportController::class, 'process'])->name('import/excel');
    Route::post('export/excel', [ExportController::class, 'process'])->name('export/excel');

    Route::get('realizations', [RealizationController::class, 'index'])->name('realizations');
    Route::get('realizations/create', [RealizationController::class, 'create'])->name('realizations/create');

    Route::get('purchases', [PurchaseController::class, 'index'])->name('purchases');
    Route::get('purchases/create', [PurchaseController::class, 'create'])->name('purchases/create');
    Route::post('order/create', 'App\Http\Controllers\OrdersController@create')->name('order/create');

    Route::get('products', [ProductsController::class, 'index'])->name('products');

    Route::get('logout', [LogoutController::class, 'process']);


});






