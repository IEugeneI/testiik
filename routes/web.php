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

Route::get('/', 'ProfileController@index');
Route::resource('profiles', 'ProfileController');
Route::post('photo/store', 'PhotoController@store');
Route::post('photo/destroy', 'PhotoController@destroy');
