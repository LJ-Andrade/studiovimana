<?php

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

/*
|--------------------------------------------------------------------------
| Store
|--------------------------------------------------------------------------
*/
    Route::get('tienda', ['as' => 'store', 'uses' => 'Store\StoreController@index']);
    
    Route::group(['prefix'=> 'tienda'], function() {        
        // Customer Actions
        Route::group(['middleware'=> 'customer'], function() {
            // Cart
            // Route::post('/cart', 'Store\CartDetailController@store');
            Route::post('addtocart', ['as' => 'store.addtocart', 'uses' => 'Store\CartDetailController@store']);
            Route::post('removefromcart', ['as' => 'store.removefromcart', 'uses' => 'Store\CartDetailController@destroy']);
            Route::get('checkout', ['as' => 'store.checkout', 'uses' => 'Store\StoreController@checkout']);
            Route::post('envio', ['as' => 'store.checkoutCustomerData', 'uses' => 'Store\StoreController@checkoutCustomerData']);
            Route::get('envio', ['as' => 'store.checkoutShippingGet', 'uses' => 'Store\StoreController@checkoutShippingGet']);
            Route::post('pago', ['as' => 'store.checkoutShipping', 'uses' => 'Store\StoreController@checkoutShipping']);
            Route::get('pago', ['as' => 'store.checkoutPaymentGet', 'uses' => 'Store\StoreController@checkoutPaymentGet']);
            Route::post('resumen', ['as' => 'store.checkoutPayment', 'uses' => 'Store\StoreController@checkoutPayment']);
            Route::get('resumen', ['as' => 'store.checkoutReview', 'uses' => 'Store\StoreController@checkoutReview']);
            
            //Route::post('mp-connect', ['as' => 'store.getCreatePreference', 'uses' => 'MercadoPagoController@getCreatePreference']);
            Route::post('mp-connect', ['as' => 'store.getCreatePreference', 'uses' => 'Store\StoreController@mpConnect']);
            
            // Sections    
            Route::get('articulo/{id}', 'Store\StoreController@show');
            Route::get('cuenta', ['as' => 'store.customer-account', 'uses' => 'Store\StoreController@customerAccount']);
            Route::get('favoritos', ['as' => 'store.customer-wishlist', 'uses' => 'Store\StoreController@customerWishlist']);
            Route::get('pedidos', ['as' => 'store.customer-orders', 'uses' => 'Store\StoreController@customerOrders']);
            Route::get('pedido', ['as' => 'store.cartdetail', 'uses' => 'Store\StoreController@customerCartDetail']);
            Route::get('carroactivo', ['as' => 'store.activecart', 'uses' => 'Store\StoreController@customerActiveCartDetail']);

            // Customers
            Route::post('updateCustomer', ['as' => 'store.updateCustomer', 'uses' => 'Store\CustomerController@update']);
            Route::get('updatePassword', ['as' => 'store.updatePassword', 'uses' => 'Store\StoreController@updatePassword']);
            Route::post('updatePassword', ['as' => 'store.updatePassword', 'uses' => 'Store\CustomerController@updatePassword']);
            
        });

        Route::post('addArticleToFavs', ['as' => 'customer.addArticleToFavs', 'uses' => 'Store\StoreController@addArticleToFavs']);
        Route::post('removeArticleFromFavs', ['as' => 'customer.removeArticleFromFavs', 'uses' => 'Store\StoreController@removeArticleFromFavs']);
        Route::post('removeAllArticlesFromFavs', ['as' => 'customer.removeAllArticlesFromFavs', 'uses' => 'Store\StoreController@removeAllArticlesFromFavs']);

        // Login Routes...
        Route::get('login', ['as' => 'customer.login', 'uses' => 'CustomerAuth\LoginController@showLoginForm']);
        Route::post('login', ['uses' => 'CustomerAuth\LoginController@login']);
        Route::post('logout', ['as' => 'customer.logout', 'uses' => 'CustomerAuth\LoginController@logout']);
        
        // Registration Routes...
        Route::get('register', ['as' => 'customer.register', 'uses' => 'CustomerAuth\RegisterController@showRegistrationForm']);
        Route::post('register', ['uses' => 'CustomerAuth\RegisterController@register']);
        
        // Password Reset Routes...
        Route::get('password/reset', ['as' => 'customer.password.reset', 'uses' => 'CustomerAuth\ForgotPasswordController@showLinkRequestForm']);
        Route::post('password/email', ['as' => 'customer.password.email', 'uses' => 'CustomerAuth\ForgotPasswordController@sendResetLinkEmail']);
        Route::get('password/reset/{token}', ['as' => 'customer.password.reset.token', 'uses' => 'CustomerAuth\ResetPasswordController@showResetForm']);
        Route::post('password/reset', ['uses' => 'CustomerAuth\ResetPasswordController@reset']);
        
            
    });

/*
|--------------------------------------------------------------------------
| Web / Portfolio 
|--------------------------------------------------------------------------
*/

Route::get('portfolio', ['as'   => 'web.portfolio',	'uses' => 'WebController@portfolio']);
// Show Article / Catalogue
Route::get('article/{slug}', ['uses' => 'WebController@showWithSlug', 'as'   => 'web.portfolio.article'])->where('slug', '[\w\d\-\_]+');
// Article Searcher
Route::get('categories/{name}', ['uses' => 'WebController@searchCategory', 'as'   => 'web.search.category']);
Route::get('tag/{name}', ['uses' => 'WebController@searchTag', 'as'   => 'web.search.tag']);
Route::post('mail_sender', 'WebController@mail_sender');


/*
|--------------------------------------------------------------------------
| VADMIN
|--------------------------------------------------------------------------
*/

Auth::routes();
Route::group(['prefix'=> 'vadmin'], function() {
    
    // Login Routes...
        Route::get('login', ['as' => 'vadmin.login', 'uses' => 'Auth\LoginController@showLoginForm']);
        Route::post('login', ['uses' => 'Auth\LoginController@login']);
        Route::post('logout', ['as' => 'vadmin.logout', 'uses' => 'Auth\LoginController@logout']);
    
    // Registration Routes...
        Route::get('register', ['as' => 'vadmin.register', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
        Route::post('register', ['uses' => 'Auth\RegisterController@register']);
    
    // Password Reset Routes...
        Route::get('password/reset', ['as' => 'vadmin.password.reset', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);
        Route::post('password/email', ['as' => 'vadmin.password.email', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
        Route::get('password/reset/{token}', ['as' => 'vadmin.password.reset.token', 'uses' => 'Auth\ResetPasswordController@showResetForm']);
        Route::post('password/reset', ['uses' => 'Auth\ResetPasswordController@reset']);
    });

    // Route::get('/home', 'VadminController@index');
    // Route::get('/vadmin', 'VadminController@index');

/*
|--------------------------------------------------------------------------
| Vadmin - Sections
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'vadmin', 'middleware' => 'admin'], function(){

    //Route::get('/home', 'VadminController@index');
    Route::get('/', 'VadminController@index');
    
    // -- USERS --
    Route::resource('users', 'UserController');
    Route::post('updateAvatar', 'UserController@updateAvatar');	
    Route::post('message_status/{id}', 'VadminController@updateMessageStatus');

    // -- MESSAGES --
    Route::get('/mensajes_recibidos', 'VadminController@storedContacts');
    Route::get('mensajes_recibidos/{id}', 'VadminController@showStoredContact');
    Route::post('setMessageAsReaded', 'VadminController@setMessageAsReaded');
    
    // -- PORTFOLIO --
    Route::resource('portfolio', 'Portfolio\ArticlesController');
    Route::resource('categories', 'Portfolio\CategoriesController');
    Route::resource('tags', 'Portfolio\TagsController');
    Route::post('updateStatus/{id}', 'Portfolio\ArticlesController@updateStatus');
    Route::post('deleteArticleImg/{id}', 'Portfolio\ArticlesController@deleteArticleImg');

    // -- CATALOG --
    Route::resource('catalogo', 'Catalog\ArticlesController');
    Route::post('update_catalog_stock/{id}', 'Catalog\ArticlesController@updateStock');
    Route::post('update_catalog_price/{id}', 'Catalog\ArticlesController@updatePrice');
    Route::post('update_catalog_discount/{id}', 'Catalog\ArticlesController@updateDiscount');
    Route::get('panel-de-control', ['as' => 'storeControlPanel', 'uses' => 'VadminController@storeControlPanel']);
    
    Route::resource('cat_categorias', 'Catalog\CategoriesController');
    Route::resource('cat_tags', 'Catalog\TagsController');
    Route::post('cat_article_status/{id}', 'Catalog\ArticlesController@updateStatus');
    Route::post('deleteArticleImg/{id}', 'Portfolio\ArticlesController@deleteArticleImg');
    // Atribute 1
    Route::resource('cat_atribute1', 'Catalog\CatalogAtribute1Controller');
    Route::post('catalog_make_thumb/{id}', 'Catalog\ArticlesController@makeThumb');
    // Shipping
    Route::resource('shippings', 'Catalog\ShippingsController');
    // Payments Methods
    Route::resource('payments', 'Catalog\PaymentsController');

    // -- SUPPORT --
    Route::get('docs', function(){ return view('vadmin.support.docs'); });
    Route::get('help', function(){ return view('vadmin.support.help'); });

    // Exports
    Route::get('exportViewPdf/{view}/{model}/{filename}', ['as' => 'vadmin.exportViewPdf', 'uses' => 'invoiceController@exportViewPdf']);

});
    
/*
|--------------------------------------------------------------------------
| Vadmin - Destroy
|--------------------------------------------------------------------------
*/

Route::prefix('vadmin')->middleware('admin')->group(function () {
    Route::post('destroy_users', 'UserController@destroy');
    Route::post('destroy_portfolio', 'Portfolio\ArticlesController@destroy');
    Route::post('destroy_categories', 'Portfolio\CategoriesController@destroy');
    Route::post('destroy_tags', 'Portfolio\TagsController@destroy');
    Route::post('destroy_catalogo', 'Catalog\ArticlesController@destroy');
    Route::post('destroy_cat_categorias', 'Catalog\CategoriesController@destroy');
    Route::post('destroy_cat_tags', 'Catalog\TagsController@destroy');
    Route::post('destroy_stored_contacts', 'VadminController@destroyStoredContacts');
    Route::post('destroy_cat_atribute1', 'Catalog\CatalogAtribute1Controller@destroy');
    Route::post('destroy_product_image', 'Catalog\ImagesController@destroy');
    Route::post('destroy_portfolio_image', 'Portfolio\ImagesController@destroy');
    Route::post('destroy_shippings', 'Catalog\ShippingsController@destroy');
    Route::post('destroy_payments', 'Catalog\PaymentsController@destroy');
});


/*
|--------------------------------------------------------------------------
| Errors
|--------------------------------------------------------------------------
*/
Route::get('404', ['as' => '404', 'uses' => 'ErrorController@notfound']);
Route::get('500', ['as' => '500', 'uses' => 'ErrorController@fatal']);
