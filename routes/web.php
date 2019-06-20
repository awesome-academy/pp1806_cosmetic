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
    Route::middleware('auth')->group(function () {
        Route::middleware('admin')->group(function () {
            Route::get('/admin/products', 'ProductsController@index')->name('products.list');
            Route::get('/admin/products/create', 'ProductsController@create')->name('products.create');
            Route::post('/admin/products', 'ProductsController@store')->name('products.store');
            Route::delete('/admin/products/{product}', 'ProductsController@destroy')->name('products.destroy');
            Route::get('/admin/products/{product}/edit', 'ProductsController@edit')->name('products.edit');
            Route::post('/admin/products/{product}', 'ProductsController@update')->name('products.update');
            Route::get('/admin/orders', 'OrdersController@index')->name('orders.index');
            Route::get('/admin/orders/{order}/edit', 'OrdersController@edit')->name('orders.edit');
            Route::post('/admin/orders/{order}', 'OrdersController@update')->name('orders.update');
            Route::get('/admin/orders/{order}', 'OrdersController@show')->name('orders.show');
            Route::delete('/admin/orders/{product}', 'OrdersController@destroy')->name('products.destroy');
        });
    });
});
Route::middleware('auth')->group(function () {
    Route::middleware('admin')->group(function () {
        Route::get('admin/category', 'Admin\CategoryController@index')->name('admin.category.index');
        Route::get('/admin/category/create', 'Admin\CategoryController@create')->name('admin.category.create');
        Route::post('/admin/category', 'Admin\CategoryController@store')->name('admin.category.store');
        Route::post('admin/category/{category}', 'Admin\CategoryController@update')->name('admin.category.update');
        Route::get('admin/category/{category}', 'Admin\CategoryController@update')->name('admin.category.update');
        Route::get('admin/category/{category}/edit', 'Admin\CategoryController@edit')->name('admin.category.edit');
//        Route::post('admin/category/{category}/edit', 'Admin\CategoryController@edit')->name('admin.category.edit');
        Route::delete('admin/category/{category}', 'Admin\CategoryController@destroy')->name('admin.category.destroy');

        Route::get('admin/brand', 'Admin\BrandController@index')->name('admin.brand.index');
        Route::get('/admin/brand/create', 'Admin\BrandController@create')->name('admin.brand.create');
        Route::post('admin/brand/{brand}', 'Admin\BrandController@update')->name('admin.brand.update');
        Route::get('admin/brand/{brand}/edit', 'Admin\BrandController@edit')->name('admin.brand.edit');
        Route::post('/admin/brand', 'Admin\BrandController@store')->name('admin.brand.store');
        Route::delete('admin/brand/{brand}', 'Admin\BrandController@destroy')->name('admin.brand.destroy');

        Route::get('admin/user', 'Admin\UserController@index')->name('admin.user.index');
        Route::get('admin/user/{user}', 'Admin\UserController@show')->name('admin.user.show');
        Route::delete('admin/user/{user}', 'Admin\UserController@destroy')->name('admin.user.destroy');
        Route::get('admin/user/{user}/edit', 'Admin\UserController@edit')->name('admin.user.edit');
        Route::post('admin/user/{user}', 'Admin\UserController@update')->name('admin.user.update');
    });
    Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');
    Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');
});

Route::get('/add-to-cart/{id}', 'ProductController@getAddToCart')->name('product.addToCart');
Route::get('/delete-cart-all', 'ProductController@deleteCartAll')->name('product.deleteCartAll');
Route::delete('/delete-cart-item/{id}', 'ProductController@deleteCartItem')->name('product.deleteCartItem');
Route::get('/shopping-cart', 'ProductController@getCart')->name('product.shoppingCart');
Route::get('/up-cart-qty/{id}', 'ProductController@upCartQty')->name('product.upCartQty');
Route::get('/down-cart-qty/{id}', 'ProductController@downCartQty')->name('product.downCartQty');

//Route::get('/user/{user}', 'UserController@show')->name('user');

Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/term', 'HomeController@term')->name('term');

Route::middleware('auth')->group(function () {
    Route::get('/profile/{user}', 'UserProfileController@show')->name('profile.show');
    Route::get('/profile/{user}/edit', 'UserProfileController@edit')->name('profile.edit');
    Route::post('/profile/{user}', 'UserProfileController@update')->name('profile.update');
});

Route::get('/product/{product}', 'ProductController@show')->name('product.show');
Route::get('/category', 'FrontendCategoryController@index')->name('category.index');
Route::get('/category/{category}', 'FrontendCategoryController@getType')->name('category.type');
Route::get('/search', 'HomeController@search')->name('search');