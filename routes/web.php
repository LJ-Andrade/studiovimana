<?php

use App\Mail\KryptoniteFound;

Auth::routes();

/////////////////////////////////////////////////
//                   VADMIN                    //
/////////////////////////////////////////////////

// ---------------- Home ---------------------//
Route::get('/vadmin', 'VadminController@index')->middleware('admin');
Route::get('guest', function () {
    return view('vadmin.guest');
});



/////////////////////////////////////////////////
//                   USERS                     //
/////////////////////////////////////////////////

Route::get('profile', 'UsersController@profile');
Route::post('profile', 'UsersController@updateAvatar');	


Route::group(['prefix' => 'vadmin', 'middleware' => ['auth','admin']], function(){

	Route::resource('users', 'UsersController');

	Route::post('ajax_delete_user/{id}', 'UsersController@destroy');
	Route::post('ajax_batch_delete_users/{id}', 'UsersController@ajax_batch_delete');
	Route::post('ajax_update_user/{id}', 'UsersController@update');
	
	Route::get('ajax_list_users/{page?}', 'UsersController@ajax_list');
	// Searcher
	Route::get('ajax_list_search/{search?}', 'UsersController@ajax_list_search');
	Route::get('ajax_list_search/{role?}', 'UsersController@ajax_list_search');

});

// --------------------------------------------//
// --------------------------------------------//

/////////////////////////////////////////////////
//											   //
//              PROJECT ROUTES                 //
//											   //
/////////////////////////////////////////////////


/////////////////////////////////////////////////
//                     WEB                     //
/////////////////////////////////////////////////

// ------------------- Home -------------------//
Route::get('/', [
	'as'   => 'web',
	'uses' => 'WebController@home',
]);

// ------------------ Contact------------------//
Route::post('mail_sender', 'WebController@mail_sender');
Route::post('test_sender', 'WebController@test_sender');

Route::get('contactTest', 'WebController@test');


/////////////////////////////////////////////////
//               SECTIONS                      //
/////////////////////////////////////////////////

Route::group(['prefix' => 'vadmin', 'middleware' => ['auth','admin']], function(){

	// ------ Clientes ------- //
	Route::get('ajax_list_clients/{page?}', 'Clientes\ClientesController@ajax_list');
	Route::get('ajax_list_users/{page?}', 'UsersController@ajax_list');
	Route::resource('clientes', 'Clientes\ClientesController');
	Route::post('ajax_delete_cliente/{id}', 'Clientes\ClientesController@destroy');
	Route::post('ajax_batch_delete_clientes/{id}', 'Clientes\ClientesController@ajax_batch_delete');

	// Searcher
	Route::get('ajax_list_search_clientes/{search?}', 'Clientes\ClientesController@ajax_list_search');
	// Route::get('ajax_list_search_clientes/{id?}', 'Clientes\ClientesController@ajax_list_search');

	// ------ Provincias ------- //
	Route::resource('provincias', 'Provincias\ProvinciasController');
	Route::post('ajax_delete_provincia/{id}', 'Provincias\ProvinciasController@destroy');
	Route::post('ajax_batch_delete_provincias/{id}', 'Provincias\ProvinciasController@ajax_batch_delete');

	// ------ Localidades ------- //
	Route::resource('localidades', 'Localidades\LocalidadesController');
	Route::post('ajax_delete_localidad/{id}', 'Localidades\LocalidadesController@destroy');
	Route::post('ajax_batch_delete_localidades/{id}', 'Localidades\LocalidadesController@ajax_batch_delete');


	// ------ Listado de Vendedores ------- //
	Route::get('vendedores', 'VadminController@vendedores');
});





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

Route::group(['prefix' => 'vadmin', 'middleware' => ['auth','admin']], function(){

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


