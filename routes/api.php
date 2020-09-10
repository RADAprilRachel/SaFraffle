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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/purchases', 'PurchaseAPIController@store');
Route::post('/payments', 'PaymentAPIController@store');
Route::get('/payments', 'PaymentAPIController@store');

Route::get('/raffles', 'RaffleAPIController@index')->name('api.raffles.index');
Route::get('/raffles/{raffle}', 'RaffleAPIController@show')->name('api.raffles.show');
Route::get('/raffles/{raffle}/raffleItems', 'RaffleItemAPIController@index')->name('api.raffles.raffle_items.index');
