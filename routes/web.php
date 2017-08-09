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
// Route::post('/register', 'Auth\RegisterController@register')->name('register');
