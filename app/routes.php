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

/*
 * Session Handling
 */
Route::resource('sessions', 'SessionsController');
Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');

/*
 * Management
 */
Route::get('crew', function()
{
   return 'Crew management interface' ;
})->before('crew');