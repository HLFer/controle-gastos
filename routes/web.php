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
    Route::get('/', function () {
        return view('welcome');
    });

    /*Route::group(['as' => 'users.','prefix' => 'users'], function()
    {
        Route::get('', [
            'as' => 'list',
            'uses' => 'UsersController@list'
        ]);

    });*/


});



Auth::routes();

Route::get('/home', 'HomeController@index');
