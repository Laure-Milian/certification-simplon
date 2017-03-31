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


// Gestion du panier
Route::get('/add/cart', 'OrderController@getCart');

// Ajouts Laure :


Route::get('/', 'ProductController@getHome');

Route::post('/search', 'ProductController@findProduct');

Route::get('/category/{id}', 'ProductController@getCategoryProducts');

Route::get('/{id}', 'ProductController@getProduct');
