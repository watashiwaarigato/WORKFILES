<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Login
Route::get('/', 'LoginAutController@index');
Route::post('/auth', 'LoginAutController@auth');
Route::get('/logout', 'LoginAutController@logout');

//Register
Route::get('/register', 'LoginAutController@register_get');
Route::post('/register', 'LoginAutController@register_post');


//Authentication Pages
Route::group(['middleware' => ['sesssionAuth']], function () {
	Route::get('/dashboard', 'DashboardController@index');
	
	
});

