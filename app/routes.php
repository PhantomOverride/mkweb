<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/

/*
 * For when people want food and are lazy
 */
/*
Route::get('/subway', function()
{
    return Redirect::to('url');
    return "<p>Subwayformuläret för beställning kommer snart upp!</p>";
});

Route::get('page/wonderlan/subway', function()
{
    return Redirect::to('url');
    return "<p>Subwayformuläret för beställning kommer snart upp!</p>";
});
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
Route::get('posts/{urlname}/remove', 'PostController@remove')->before('crew');

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
//Route::get('/', 'LivepostController@index'); // Use during WonderLAN
Route::get('/', 'IndexController@index'); // Use on all the other dates

Route::get('home', 'IndexController@index');

/*
 * Tournament Controllers
 */
//Teams
Route::get('teams/{name}/addmember','TeamController@addMember')->before('auth');
Route::get('teams/{name}/addmember/{nickname}','TeamController@addMember')->before('auth');
Route::get('teams/{name}/removemember','TeamController@removeMember')->before('auth');
Route::get('teams/{name}/removemember/{nickname}','TeamController@removeMember')->before('auth');
Route::get('teams/{name}/delete','TeamController@delete')->before('auth');

Route::get('teams/{name}/addtournament','TeamController@addTournament')->before('auth');
Route::get('teams/{name}/addtournament/{tournamentname}','TeamController@addTournament')->before('auth');
Route::get('teams/{name}/removetournament','TeamController@removeTournament')->before('auth');
Route::get('teams/{name}/removetournament/{tournamentname}','TeamController@removeTournament')->before('auth');

Route::resource('teams','TeamController');
//Route::post('teams/{name}/update','TeamController@update')->before('auth');

Route::get('/live', 'LivepostController@index');

/*Route::get('/live', function()
{
    //return View::make('current')->with('nav',Page::navbar());
});*/

/*
 *  Livepost Controller
 */
Route::get('liveposts', 'LivepostController@index')->before('crew');
Route::get('liveposts/create', 'LivepostController@edit')->before('crew');
Route::get('liveposts/{id}', 'LivepostController@show');
Route::get('liveposts/{id}/edit', 'LivepostController@edit')->before('crew');
Route::post('liveposts/{id}/update', 'LivepostController@update')->before('crew');
Route::post('liveposts/update', 'LivepostController@update')->before('crew');
Route::get('liveposts/{id}/remove', 'LivepostController@remove')->before('crew');

/*
 *  Gallery Controller
 */
Route::get('gallery', 'GalleryController@index');
Route::get('gallery/create', 'GalleryController@edit')->before('crew');
Route::get('gallery/{directory}/upload', 'GalleryController@upload')->before('crew');
Route::get('gallery/{directory}', 'GalleryController@show');
Route::post('gallery/create', 'GalleryController@create')->before('crew');

Route::get('/sverok', function()
{
    return View::make('sverok')->with('nav',Page::navbar());
});

Route::get('/turneringar', function()
{
    return Redirect::to('http://wonderlan.se/page/wonderlan/turneringar');
});

/*
 *  Routes for Event
 */
Route::get('mkevents/create', 'MkeventController@edit')->before('crew');
Route::get('mkevents/edit', 'MkeventController@edit')->before('crew');
Route::get('mkevents/{name}', 'MkeventController@show');
Route::get('mkevents/{name}/edit', 'MkeventController@edit')->before('crew');
Route::post('mkevents/{name}/update', 'MkeventController@update')->before('crew');
Route::post('mkevents/update', 'MkeventController@update')->before('crew');
Route::get('mkevents', 'MkeventController@index');

Route::get('tournaments', 'TournamentController@index');
Route::get('tournaments/create', 'TournamentController@edit')->before('crew');
Route::get('tournaments/edit', 'TournamentController@edit')->before('crew');
Route::get('tournaments/{name}', 'TournamentController@show');
Route::get('tournaments/{name}/edit', 'TournamentController@edit')->before('crew');
Route::post('tournaments/{name}/update', 'TournamentController@update')->before('crew');
Route::post('tournaments/update', 'TournamentController@update')->before('crew');

/*
 * Internal cash register system
 */
Route::get('products', 'ProductController@index')->before('crew');
Route::get('products/create', 'ProductController@edit')->before('crew');
Route::get('products/edit', 'ProductController@edit')->before('crew');
Route::get('products/{id}', 'ProductController@show')->before('crew');
Route::get('products/{id}/edit', 'ProductController@edit')->before('crew');
Route::post('products/{id}/update', 'ProductController@update')->before('crew');
Route::post('products/update', 'ProductController@update')->before('crew');

Route::get('store', 'ProductController@store')->before('crew');
Route::get('store/add/{id}', 'ProductController@storeAdd')->before('crew');
Route::get('store/addKassa/{id}', 'ProductController@storeAddKassa')->before('crew');
Route::get('store/empty', 'ProductController@storeClear');
Route::get('kassa/empty', 'ProductController@kassaClear')->before('crew');
Route::get('kassa', 'ProductController@kassa')->before('crew');

Route::get('kassa/stage/{paymentMethod}', 'ProductController@kassastage')->before('crew');
Route::get('kassa/purchase', 'ProductController@kassapurchase')->before('crew');

Route::get('/debug', function()
{
    return "No.";
});