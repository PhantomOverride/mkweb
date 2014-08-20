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


Route::get('/', function()
{
	return View::make('hello');
});


// CRM system for pages
Route::get('page/{urlname}/{suburlname?}', 'CrmController@show');

//User system and handling
//Route::get('users', 'UserController@index');
//Route::get('users/{username}', 'UserController@show');

Route::resource('users','UserController');
