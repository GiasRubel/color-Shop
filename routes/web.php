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

Route::group(['prefix' => 'admins'], function () {

	Route::resource('/product', 'admin\productController');

	Route::get('/product-catagory/{id}', 'admin\productController@catbyproduct')->name('catbyproduct');

	// Route::resource('/multi-image', 'admin\MultiImageController');
	Route::post('/multi-image/{id}', 'admin\MultiImageController@store')->name('multi-image.store');

	Route::delete('/multi-image/{id}', 'admin\MultiImageController@destroy')->name('multi-image.destroy');

	Route::resource('/catagory', 'admin\catagoryController');

	Route::resource('/brand', 'admin\brandController');

	Route::resource('/country', 'admin\CountryController');

	Route::resource('/city', 'admin\CityController');

	Route::get('/order-list', 'user\OrderController@adminorderlist')->name('admin.orderlist');

	Route::get('/order-single/{id}', 'user\OrderController@adminordershow')->name('adminorder.show');

	Route::put('/order-status/{order}', 'user\OrderController@adminstatusupdate')->name('order.statusupdate');

	Route::delete('/order-list/{order}', 'user\OrderController@adminOrderDestroy')->name('order.delete');

	Route::get('/sliderlist', 'admin\SliderController@sliderlist')->name('slide.list');

	Route::get('/slider', 'admin\SliderController@create')->name('slide.create');

	Route::post('/slider', 'admin\SliderController@store')->name('slide.store');

	Route::get('/slider/{slider}/edit', 'admin\SliderController@edit')->name('slide.edit');

	Route::put('/slider/{slider}', 'admin\SliderController@update')->name('slide.update');

	Route::delete('/slider/{slider}', 'admin\SliderController@destroy')->name('slide.destroy');

	Route::get('/login', 'admin\adminController@showLoginForm')->name('admin.dashboard');

	Route::post('/login', 'admin\adminController@login')->name('admin.login');
	
	Route::post('/logout', 'admin\adminController@logout')->name('admin.logout');

	Route::get('/home', function(){
		return view('admin.home');
	});

	Route::get('/', function () {
	    return view('admin.home');
	})->name('admins.home');

});


Route::get('/cart', 'user\CartController@show')->name('user.cart');

// Route::post('/cart/{id}', 'user\CartController@addCart')->name('cart');
Route::match(['GET', 'POST'], '/cart/{id}', 'user\CartController@addCart')->name('cart');

Route::post('/carts/{id}', 'user\CartController@update')->name('cart.update');
// Route::get('/cart/{id}', 'user\CartController@update')->name('cart.update');

// Route::delete('/cart/{id}', 'user\CartController@destroy')->name('cart.delete');
Route::post('/cartdel', 'user\CartController@destroy')->name('cart.delete');

Route::post('/wish/{id}','user\WishController@wishUpdate')->name('wish.update');
// Route::post('/wish/','user\WishController@wishUpdate')->name('wish.update');

Route::get('wish-list', 'user\WishController@index')->name('wish.index');

// Route::delete('/wish/{id}', 'user\WishController@destroy')->name('wish.destroy');
Route::post('/wishDel/{id}', 'user\WishController@destroy')->name('wish.destroy');

Route::get('/order', 'user\OrderController@show')->name('order.show');

Route::get('/order/get/{id}', 'user\OrderController@getcity');

Route::post('/order', 'user\OrderController@store')->name('order.store');

Route::get('/order-list','user\OrderController@list')->name('order.list');

Route::delete('/order/{id}', 'user\OrderController@destroy')->name('order.destroy');

Route::get('/contact', 'user\ContactController@index')->name('contact.show');

Route::post('/contact', 'user\ContactController@store')->name('contact.store');

Route::get('/single-product/{id}/{uId?}', 'user\UserController@show')->name('product.single');

// Route::get('/ratings', 'user\RatingController@index')->name('rating.index');

Route::post('/single-product/{id}','user\RatingController@store')->name('rating.store');

Route::get('/','user\UserController@index')->name('user.home');

Auth::routes();

Route::get('/home', 'user\UserController@index')->name('home');
