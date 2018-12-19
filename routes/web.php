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

    Route::get('setting/general', 'SettingGeneralController@index')->name('setting.general.index');
    Route::post('setting/general', 'SettingGeneralController@store')->name('setting.general.store');
    Route::get('setting/costs', 'SettingCostController@index')->name('setting.cost.index');
    Route::post('setting/costs', 'SettingCostController@store')->name('setting.cost.store');

    Route::resource('group', 'GroupController');
    Route::resource('staff', 'StaffController');
    Route::resource('package/loan', 'PackageLoanController');


    Route::resource('member', 'MemberController');

    Route::group(['prefix' => 'transaction', 'as' => 'transaction.'], function () {
        Route::resource('loan', 'MemberLoanController');
        Route::resource('/loan/{id}/payment', 'MemberPaymentController', ['names' => 'loan.payment']);
    });
});

Route::group(['prefix' => 'table', 'as' => 'table.'], function () {
    Route::get('user', 'UserController@getTable')->name('user');
    Route::get('group', 'GroupController@getTable')->name('group');
    Route::get('staff', 'StaffController@getTable')->name('staff');

    Route::get('package/loan', 'PackageLoanController@getTable')->name('package.loan');

    Route::get('member', 'MemberController@getTable')->name('member');

    Route::group(['prefix' => 'transaction', 'as' => 'transaction.'], function () {
        Route::get('loan', 'MemberLoanController@getTable')->name('loan');
        Route::get('loan/{id}/payment', 'MemberPaymentController@getTable')->name('loan.payment');
    });
});

Route::group(['prefix' => 'service', 'as' => 'service.'], function () {
    Route::get('auto/member', 'ServiceController@autoMember')->name('auto.member');
});
