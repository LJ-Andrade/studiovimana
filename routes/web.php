<?php

use App\Http\Middleware\Admins;


/*
|--------------------------------------------------------------------------
| Web
|--------------------------------------------------------------------------
|
*/

Route::get('/', [
	'as'   => 'web',
	'uses' => 'WebController@home',
]);

Auth::routes();

/*
|--------------------------------------------------------------------------
| Web / Portfolio 
|--------------------------------------------------------------------------
*/

Route::get('portfolio', [
	'as'   => 'web.portfolio',
	'uses' => 'WebController@portfolio',
]);

// Show Article / Catalogue
Route::get('article/{slug}', [
	'uses' => 'WebController@showWithSlug',
	'as'   => 'web.portfolio.article'
])->where('slug', '[\w\d\-\_]+');

// Article Searcher
Route::get('categories/{name}', [
	'uses' => 'WebController@searchCategory',
	'as'   => 'web.search.category'
]);

Route::get('tag/{name}', [
	'uses' => 'WebController@searchTag',
	'as'   => 'web.search.tag'
]);

/*
|--------------------------------------------------------------------------
| VADmin
|--------------------------------------------------------------------------
*/

Route::get('/home', 'VadminController@index')->middleware('auth');
Route::get('/vadmin', 'VadminController@index')->middleware('auth');


/*
|--------------------------------------------------------------------------
| Users
|--------------------------------------------------------------------------
*/

// Route::get('profile', 'UsersController@profile');
// Route::post('profile', 'UsersController@updateAvatar');	

Route::prefix('vadmin')->middleware('auth')->group(function () {
    Route::resource('users', 'UserController')->middleware('Admins');
});

/*
|--------------------------------------------------------------------------
| VADMIN / SECTIONS
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'vadmin', 'middleware' => ['auth']], function(){
    
    // -------- Users ---------- //
    Route::post('updateAvatar', 'UserController@updateAvatar');	
    // -------- Article -------- //
    Route::post('updateStatus/{id}', 'Portfolio\ArticlesController@updateStatus');
    Route::post('deleteArticleImg/{id}', 'Portfolio\ArticlesController@deleteArticleImg');

    Route::resource('portfolio', 'Portfolio\ArticlesController');
    Route::resource('categories', 'Portfolio\CategoriesController');
    Route::resource('tags', 'Portfolio\TagsController');
 
});
    
/*
|--------------------------------------------------------------------------
| Destroy
|--------------------------------------------------------------------------
*/

Route::prefix('vadmin')->middleware('auth')->group(function () {
    Route::post('destroy_users', 'UserController@destroy');
    Route::post('destroy_portfolio', 'Portfolio\ArticlesController@destroy');
});


