<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');
});

Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {
    Route::get('/', 'UserController@index')->name('userprofile');

    Route::get('/edit/{id}', 'UserController@edit')->name('user.edit');
    Route::post('/update', 'UserController@update')->name('user.update');
});

Route::group(['prefix' => 'products', 'middleware' => 'auth'], function () {
    Route::get('/', 'ProductController@index')->name('products');

    Route::get('/create', 'ProductController@create')->name('products.create');
    Route::post('/store', 'ProductController@store')->name('products.store');
    Route::get('/edit/{id}', 'ProductController@edit')->name('products.edit');
    Route::post('/update', 'ProductController@update')->name('products.update');
    Route::delete('/destroy/{id}', 'ProductController@destroy')->name('products.destroy');

    Route::get('/cart', 'ProductController@cart')->name('products.cart');

    Route::get('/cartt', 'ProductController@cartt');

    Route::get('/addtocart/{id}', 'ProductController@addToCart')->name('products.add');
    Route::delete('remove-from-cart', 'ProductController@remove')->name('cart.remove');

    // Route::delete('/list', 'ProductController@list')->name('products.list');
    // Route::get('/dropzone', 'ProductController@dropzone');
    // Route::post('/product/store', 'ProductController@dropzoneStore')->name('products.dropzonestore');
});



