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
/*
Route::get('/', function()
{
	return Redirect::to('page/mammaskallare');
});
 * 
 */

/*
 *  Post Controller for Blog
 */
Route::get('posts', 'PostController@index');
Route::get('posts/create', 'PostController@edit')->before('crew');
Route::get('posts/{urlname}', 'PostController@show');
Route::get('posts/{urlname}/edit', 'PostController@edit')->before('crew');
Route::post('posts/{urlname}/update', 'PostController@update')->before('crew');
Route::post('posts/update', 'PostController@update')->before('crew');

/*
 *  CMS Controller for pages
 *  This handles most content
 */
Route::get('page/{urlname}/{suburlname?}', 'CrmController@show');



/*
 * User handling
 */
Route::resource('users','UserController');
//Route::post('users/{nickname}/update','update@UserController')->before('auth');

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

/*
 *  Index controller
 */
Route::get('/', 'IndexController@index');

/*
 * Tournament Controllers
 */
//Teams
Route::get('teams/{name}/addmember','TeamController@addMember')->before('auth');
Route::get('teams/{name}/addmember/{nickname}','TeamController@addMember')->before('auth');
Route::get('teams/{name}/removemember','TeamController@removeMember')->before('auth');
Route::get('teams/{name}/removemember/{nickname}','TeamController@removeMember')->before('auth');

Route::get('teams/{name}/addtournament','TeamController@addTournament')->before('auth');
Route::get('teams/{name}/addtournament/{tournamentname}','TeamController@addTournament')->before('auth');
Route::get('teams/{name}/removetournament','TeamController@removeTournament')->before('auth');
Route::get('teams/{name}/removetournament/{tournamentname}','TeamController@removeTournament')->before('auth');

Route::resource('teams','TeamController');
//Route::post('teams/{name}/update','TeamController@update')->before('auth');
