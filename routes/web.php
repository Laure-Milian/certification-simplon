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
  'prefix' => config('backpack.base.route_prefix', 'admin'),
  'middleware' => ['admin'],
  'namespace' => 'Admin'
], function() {

  CRUD::resource('category', 'CategoryCrudController');
  CRUD::resource('product', 'ProductCrudController');
  CRUD::resource('order', 'OrderCrudController');
});

Route::get('/home', 'HomeController@index');

Route::get('/', 'ProductController@getHome');

Route::post('/search', 'ProductController@findProduct');

Route::post('/filter', 'ProductController@postFilterCategory');


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
