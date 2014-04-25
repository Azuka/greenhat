<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::group(array('before' => 'auth'), function () {

	Route::get('/calendar', array('uses'=> 'CalendarController@index', 'as' => 'calendar.index'));
	Route::post('/calendar', array('uses'=> 'CalendarController@create', 'as' => 'calendar.create'));
	Route::get('/profile', array('uses'=> 'ProfileController@index', 'as' => 'profile.index'));
	Route::get('/profile/edit', array('uses'=> 'ProfileController@edit', 'as' => 'profile.edit'));
	Route::put('/profile', array('uses'=> 'ProfileController@update', 'as' => 'profile.update'));
});

Route::get('/', array('uses' => 'LoginController@index', 'as' => 'login.index'));
Route::post('/login', array('before' => 'csrf', 'uses' => 'LoginController@process', 'as' => 'login.process'));
Route::get('/login/{lang}', array('uses'=> 'LoginController@lang', 'as' => 'login.lang'));
