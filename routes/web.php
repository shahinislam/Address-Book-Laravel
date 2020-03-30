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

Route::get('/contacts/{contact}/details', 'DetailController@index');

Route::get('/', 'ContactController@index');
Route::get('/search', 'ContactController@search')->name('live_search.action');
Route::get('/contacts/create', 'ContactController@create');
Route::post('/contacts', 'ContactController@store');
Route::get('/contacts/{contact}', 'ContactController@show');
Route::get('/contacts/{contact}/edit', 'ContactController@edit');
Route::patch('/contacts/{contact}', 'ContactController@update');
Route::delete('/contacts/{contact}', 'ContactController@destroy');


Route::get('/contacts/{contact}/address', 'AddressController@index');
Route::get('/contacts/{contact}/address/create', 'AddressController@create');
Route::post('/contacts/{contact}/address', 'AddressController@store');
Route::get('/contacts/{contact}/address/{address}', 'AddressController@show');
Route::get('/contacts/{contact}/address/{address}/edit', 'AddressController@edit');
Route::patch('/contacts/{contact}/address/{address}', 'AddressController@update');
Route::delete('/contacts/{contact}/address/{address}', 'AddressController@destroy');


Route::get('/contacts/{contact}/phones', 'PhoneController@index');
Route::get('/contacts/{contact}/phones/create', 'PhoneController@create');
Route::post('/contacts/{contact}/phones', 'PhoneController@store');
Route::get('/contacts/{contact}/phones/{phone}', 'PhoneController@show');
Route::get('/contacts/{contact}/phones/{phone}/edit', 'PhoneController@edit');
Route::patch('/contacts/{contact}/phones/{phone}', 'PhoneController@update');
Route::delete('/contacts/{contact}/phones/{phone}', 'PhoneController@destroy');
