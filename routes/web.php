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
	return view('spa');
});

Route::get('mail', 'PaymentAPIController@mail');

Route::get('pos', function () {
    return view('pos_spa');
});

Route::get('dev', function () {
    return view('spa');
});

Route::get('admin', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('users', 'UserController');
Route::resource('raffles', 'RaffleController');
Route::resource('raffles.raffleItems', 'RaffleItemController');
Route::resource('raffles.tickets', 'TicketController');
Route::post('raffles/{raffle}/tickets', 'TicketController@search');
Route::get('/home', 'HomeController@index')->name('home');
