<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('accueil');
});

// Générés par Laravel pour l'authentication :
Auth::routes();

//Admin routes
Route::group([
  'prefix' => 'admin',
  'middleware' =>  ['auth', 'admin'],
], function() {

  CRUD::resource('category', 'Admin\CategoryCrudController');
  CRUD::resource('product', 'Admin\ProductCrudController');
  CRUD::resource('order', 'Admin\OrderCrudController');
  CRUD::resource('user', 'Admin\UserCrudController');
  CRUD::resource('orderProduct', 'Admin\OrderProductCrudController');

});

Route::get('/home', 'HomeController@index');

Route::get('/', 'ProductController@getHome');

Route::post('/search', 'ProductController@findProduct');


// TEMPORAIRE A SUPPRIMER 
Route::get('/cart_temp', function() {
	return view('cart_temp');
});

// AJOUTS LAURE POUR PARTIE ORDER
Route::get('/order_validation', 'OrderController@index');

Route::post('/validate_order', 'OrderController@sendOrder');

Route::get('/account', 'AccountController@index');
// FIN AJOUTS LAURE POUR PARTIE ORDER


Route::get('/category/{id}', 'ProductController@getCategoryProducts');

Route::get('/{id}', 'ProductController@getProduct');

