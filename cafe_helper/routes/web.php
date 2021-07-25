<?php

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
    Route::get('register', fn() => view('auth.register'));
    Route::get('login', [
        'as' =>'login',
        'uses' => fn() => view('auth.login')
    ]);

    Route::post('register', 'App\Http\Controllers\Auth\RegisterController@process');
    Route::post('login', ['as' =>'login', 'uses' => 'App\Http\Controllers\Auth\LoginController@process']);
});

Route::group(['middleware' => 'auth'], static function() {
    Route::get('', fn() => view('index'));
    Route::get('import', fn() => view('import'));
    Route::get('export', fn() => view('export'));
    Route::get('create/realization', fn() => view('create/realization'));
    Route::get('create/purchase', fn() => view('create/purchase'));
    Route::get('show/realizations', fn() => view('show/realizations'));
    Route::get('show/purchases', fn() => view('show/purchases'));
    Route::get('logout', 'App\Http\Controllers\Auth\LogoutController@process');
    Route::post('import/excel', 'App\Http\Controllers\ExcelController@import')->name('import/excel');
    Route::post('export/excel', 'App\Http\Controllers\ExcelController@export')->name('export/excel');
    Route::post('order/create', 'App\Http\Controllers\OrdersController@create')->name('order/create');
});






