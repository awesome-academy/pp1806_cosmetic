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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group([
    'namespace' => 'Admin',
], function () {
    Route::get('/admin/products', 'ProductsController@index')->name('products.list');
    Route::get('/admin/products/create', 'ProductsController@create')->name('products.create');
    Route::post('/admin/products', 'ProductsController@store')->name('products.store');
    Route::delete('/admin/products/{product}', 'ProductsController@destroy')->name('products.destroy');
});
