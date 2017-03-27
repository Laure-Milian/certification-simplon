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

Route::get('/home', 'HomeController@index');

// Ajouts Laure :
Route::get('/', 'ProductController@getHome');

Route::post('/search', 'ProductController@findProduct');

Route::get('/{id}', 'ProductController@getProduct');
