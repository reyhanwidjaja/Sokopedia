<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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



// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'GuestController@index2')->name('guestHome');

Route::get('/detailPage/{id}', 'DetailController@index3')->name('detailPage');

Route::get('/add-to-cart-page/{id}', 'DetailController@addCartPage')->name('addCartPage');

Route::post('/cart/{id}', 'CartController@addCart')->name('cart');

Route::get('/cart', 'CartController@cart')->name('cart');

Route::post('update-cart', 'CartController@update')->name('updateCartItem');
Route::post('remove-from-cart', 'CartController@remove')->name('deleteCartItem');

Route::get('/admin', 'AdminController@index')->name('adminHome');

Route::get('/add-category-page', 'AdminController@addCategoryPage');
Route::post('/add-category-page', 'AdminController@insertCategory')->name('insertCategory');
Route::get('/list-category', 'AdminController@showCategory')->name('showCategory');
Route::get('/product-by-category/{id}', 'AdminController@showDetailCategory')->name('categoryDetail');

Route::get('/list-product', 'AdminController@showProduct')->name('showProduct');
Route::get('/add-product', 'AdminController@insertProductPage')->name('insertProduct');
Route::post('/add-product', 'AdminController@insertProduct')->name('insertProduct');
Route::post('/delete-product', 'AdminController@deleteProduct')->name('deleteProduct');