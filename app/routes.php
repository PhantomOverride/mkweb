<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/

/*
 * Main Landing page
 * This should in the future be
 *  a dedicated home page.
 */

Route::get('/', function()
{
	return Redirect::to('page/mammaskallare');
});


/*
 *  CMS Controller for pages
 *  This handles most content
 */
Route::get('page/{urlname}/{suburlname?}', 'CrmController@show');



/*
 * User handling
 */
Route::resource('users','UserController');
Route::post('users/{nickname}/update','update@UserController');

/*
 * Session Handling
 */
Route::resource('sessions', 'SessionsController');
Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');

/*
 * Management
 */
Route::get('crew','CrewController@index')->before('crew');

Route::get('crew/pageedit/{urlname?}/{suburlname?}', 'CrmController@edit')->before('crew');
Route::post('crew/pageedit/{urlname?}/{suburlname?}', 'CrmController@update')->before('crew');
