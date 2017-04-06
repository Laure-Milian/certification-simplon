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
Route::get('logout', function(){
	auth()->logout();
	return redirect()->to('/');
});

//Admin routes
Route::group([
  'prefix' => 'admin',
  'middleware' =>  ['admin'],
], function() {

  Route::get('/', function(){return '';}); //Ne pas changer cette route
  CRUD::resource('category', 'Admin\CategoryCrudController');
  CRUD::resource('product', 'Admin\ProductCrudController');
  CRUD::resource('order', 'Admin\OrderCrudController');
  CRUD::resource('user', 'Admin\UserCrudController');
  CRUD::resource('orderProduct', 'Admin\OrderProductCrudController');

});

// Routes Home et Products
Route::get('/home', 'HomeController@index');
Route::get('/', 'ProductController@getHome');
Route::post('/search', 'ProductController@findProduct');
Route::post('/filter', 'ProductController@postFilterCategory');


// Routes pour OrderController
Route::get('/order_validation', 'OrderController@index');
Route::post('/validate_order', 'OrderController@createOrder');

// Routes pour AccountController
Route::get('/account', 'AccountController@index');
Route::get('/delete', 'AccountController@deleteConfirm');
Route::get('/delete/confirm', 'AccountController@deleteUser');

// Routes pour cart
Route::get('/cart', 'CartController@index');
Route::post('/add/cart', 'CartController@addToCart');

// Routes dynamiques
Route::get('/category/{id}', 'ProductController@getCategoryProducts');
Route::get('/{id}', 'ProductController@getProduct');
