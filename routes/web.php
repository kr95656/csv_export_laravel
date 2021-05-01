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

Auth::routes();

Route::get('/', 'ContactController@showContact')->name('top');
Route::post('export-csv', 'ContactController@exportContactCsv')->name('export-csv');

Route::prefix('furima') //prefixでurlの接頭辞を設定
    ->namespace('Furima') //namespaceでcontrollerの接頭辞を設定
    ->group(function() {
        Route::get('user', 'UserController@showUsers')->name('furima.user'); //urlの名前をカスタマイズ
        Route::post('user_export-csv', 'UserController@exportUsersCsv')->name('furima.user_export-csv');
    });
