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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::group([
    'namespace' => 'Admin',
], function () {
    Route::get('/admin/products', 'ProductsController@index')->name('products.list');
    Route::get('/admin/products/create', 'ProductsController@create')->name('products.create');
    Route::post('/admin/products', 'ProductsController@store')->name('products.store');
    Route::delete('/admin/products/{product}', 'ProductsController@destroy')->name('products.destroy');
    Route::get('/admin/products/{product}/edit', 'ProductsController@edit')->name('products.edit');
    Route::post('/admin/products/{product}', 'ProductsController@update')->name('products.update');
});
Route::middleware('auth')->group(function () {
    Route::middleware('admin')->group(function () {
        Route::get('admin/category', 'Admin\CategoryController@index')->name('admin.category.index');
        Route::get('/admin/category/create', 'Admin\CategoryController@create')->name('admin.category.create');
        Route::post('/admin/category', 'Admin\CategoryController@store')->name('admin.category.store');
    });
});
