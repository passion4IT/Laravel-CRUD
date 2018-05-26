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

Route::get('/', 'UserController@index');
Route::get('/user/create', 'UserController@createUser')->name('create_new_user');
Route::get('/user/{user}', 'UserController@showUser')->name('user_details');
Route::post('/user/create', 'UserController@store')->name('store_user');
Route::put('/user/{apiUser}/edit', 'UserController@edit')->name('edit_user');
Route::delete('/user/{apiUser}/delete', 'UserController@destroy')->name('delete_user');
