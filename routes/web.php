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

	Route::get('/', function () {
	    return view('admin.home');
	})->name('admins.home');

});



Route::get('/','user\UserController@index')->name('user.home');