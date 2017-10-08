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
| Admin
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
| VADMIN / PORTFOLIO
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'vadmin', 'middleware' => ['auth']], function(){
    
    // ------ Article ------- //
    Route::post('updateStatus/{id}', 'Portfolio\ArticlesController@updateStatus');
    Route::post('ajax_delete_article/{id}', 'Portfolio\ArticlesController@ajax_delete');
    Route::post('ajax_batch_delete_articles/{id}', 'Portfolio\ArticlesController@ajax_batch_delete');
    Route::post('deleteArticleImg/{id}', 'Portfolio\ArticlesController@deleteArticleImg');

    // ------ Categories ------- //
    Route::resource('categories', 'Portfolio\CategoriesController');
    Route::post('ajax_delete_category/{id}', 'Portfolio\CategoriesController@destroy');
    Route::post('ajax_batch_delete_categories/{id}', 'Portfolio\CategoriesController@ajax_batch_delete');
    Route::post('ajax_update_category/{id}', 'Portfolio\CategoriesController@update');
    
    Route::get('ajax_list_categories/{page?}', 'Portfolio\CategoriesController@ajax_list');
    // Searcher
    // Route::get('ajax_list_search/{search?}', 'UsersController@ajax_list_search');
    // Route::get('ajax_list_search/{role?}', 'UsersController@ajax_list_search');

    // ------ Tags / Sizes ------- //
    Route::resource('tags', 'Portfolio\TagsController');
    Route::post('ajax_delete_tag/{id}', 'Portfolio\TagsController@destroy');
    Route::post('ajax_batch_delete_tags/{id}', 'Portfolio\TagsController@ajax_batch_delete');
    Route::post('ajax_update_tag/{id}', 'Portfolio\TagsController@update');
    
    Route::get('ajax_list_tags/{page?}', 'Portfolio\TagsController@ajax_list');



    // Route::resource('articles', 'Portfolio\ArticlesController');
    // Route::get('articles/{id}/destroy', [
    // 	'uses' => 'ArticlesController@destroy',
    // 	'as'   => 'articles.destroy'
    // ]);

    // Route::get('images', [
    // 	'uses' => 'ImagesController@index',
    // 	'as'   => 'images.index',
    // ]);

    
    

    Route::resource('portfolio', 'Portfolio\ArticlesController');
    Route::get('ajax_list_articles/{page?}', 'Portfolio\ArticlesController@ajax_list');

    

    });
    
    
    

/*
|--------------------------------------------------------------------------
| Destroy
|--------------------------------------------------------------------------
*/

Route::prefix('vadmin')->middleware('auth')->group(function () {
    Route::post('updateAvatar', 'UserController@updateAvatar');	
    Route::post('destroy_users', 'UserController@destroy');
});