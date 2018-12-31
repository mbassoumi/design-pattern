<?php

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

Route::get('/', function () {
    return view('welcome');
});


//Route::get('/currencies/list', 'CurrencyController@listAllCurrencies');
//
//Route::get('/currencies/show/{code}', 'CurrencyController@showRate');


//Route::get('majd', function () {
//
//});
//
//
//Route::get('/majd2', 'CurrencyController@majd');



//Route::get('/currencies/api-show/{code}', 'CurrencyController@showRateFromService');
//Route::get('/currencies/api-list', 'CurrencyController@listAllCurrencyFromService');

Route::resource('currencies', 'CurrencyController');
