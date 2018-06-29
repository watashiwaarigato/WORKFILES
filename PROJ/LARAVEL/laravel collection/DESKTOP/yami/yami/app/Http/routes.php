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


//login
Route::get('/', 'loginController@index');
Route::post('/', 'loginController@auth');
Route::get('/logout', 'loginController@logout');


Route::group(['middleware' => ['sessionAuth']], function () {
	//home
	Route::get('/home', 'loginController@home');

	//deck construction
	Route::get('/deck', 'deckController@index');
	Route::post('/deck_save', 'deckController@save');
	Route::get('/deck/edit/{deck_name}', 'deckController@edit');
	Route::get('/deck/delete/{deck_name}', 'deckController@delete');

	
	
	//room
	Route::get('/room', 'roomController@index');
	Route::get('/room/get_created_room', 'roomController@get_created_room');

	Route::post('/room/create', 'roomController@create');
	Route::get('/room/check_player2/{room_id}', 'roomController@check_player2');
	Route::get('/room/create_status/{room_id}', 'roomController@create_status');
	Route::get('/room/leave', 'roomController@leave');
	
	Route::post('/room/join', 'roomController@join_room');
	
	
	//battle
	Route::get('/battle/{room_id}', 'battleController@index');
	

	//acount
	Route::get('/account', 'accountController@index');
	Route::post('/account', 'accountController@save_pic');
	Route::post('/account/changename', 'accountController@change_name');
	
});


//common
//variables
Route::get('/get_variables', 'getVariablesController@index');
Route::get('/get_variables/{deck_name}/{user_id}', 'getVariablesController@deck');

//chatbox
Route::post('/chatbox', 'chatboxController@index');
Route::post('chatbox_prev', 'chatboxController@prev_item');
Route::post('/chatbox/online', 'chatboxController@online');