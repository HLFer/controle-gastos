<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['middleware' => 'auth'], function (){

    Route::get('/', 'HomeController@index');

    // Users Routes...
    Route::resource('users', 'UsersController');

    // Customers Routes...
    Route::resource('customers', 'CustomersController');

    // Transactions Routes...
    Route::resource('transactions', 'TransactionsController', ['except' => [
        'create', 'show', 'edit', 'update'
    ]]);

    // Routes(trekking) Routes...
    Route::resource('routes', 'RoutesController');


});

//Auth::routes();
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');



