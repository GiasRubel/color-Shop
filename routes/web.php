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

	Route::resource('/catagory', 'admin\catagoryController');

	Route::resource('/brand', 'admin\brandController');

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

Route::post('/cart/{id}', 'user\CartController@addCart')->name('cart');

Route::get('/single-product/{id}', 'user\UserController@show')->name('product.single');

Route::get('/','user\UserController@index')->name('user.home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
