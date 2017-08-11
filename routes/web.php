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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

Route::get('/', 'HomeController@index')->name('root');

Route::post('/login', 'Auth\LoginController@login')->name('login')->middleware('guest');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/{id}', 'AdsController@show')               ->name('ad.show');
Route::get('/edit', 'AdsController@create')             ->name('ad.create');
Route::get('/edit/{id}', 'AdsController@edit')          ->name('ad.edit');
Route::post('/', 'AdsController@store')                 ->name('ad.store');
Route::put('/{id}', 'AdsController@update')             ->name('ad.update');
Route::delete('/delete/{id}', 'AdsController@destroy')  ->name('ad.destroy');
