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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('user', 'UserController');
    Route::get('/profile', 'UserController@profileIndex')->name('profile.index');
    Route::put('/profile/update', 'UserController@profileUpdate')->name('profile.update');
});

Route::group(['prefix' => 'table', 'as' => 'table.'], function () {
    Route::get('user', 'UserController@getTable')->name('user');
});
