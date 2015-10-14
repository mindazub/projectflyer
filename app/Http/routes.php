<?php

Route::get('/', 'PagesController@home');

// Route::get('/', function () {
//     return view('pages.home');
// });

Route::resource('flyers', 'FlyersController');

Route::get('users', [
	'as'=>'show_users',
	'uses' => 'UsersController@index'
	]);

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::get('{zip}/{street}', [
	'as'=>'show_flyer',
	'uses' => 'FlyersController@show'
	]);

Route::post('{zip}/{street}/photos', [
	'as'=>'store_photo_path',
	'uses' => 'FlyersController@addPhotoContr'
	]);
