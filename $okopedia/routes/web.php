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

Route::get('/adCart/{id}', 'DetailController@adCart')->name('adCart');

Route::get('/addCart/{id}', 'CartController@addCart')->name('addCart');
Route::post('/cart/{id}', 'CartController@addCart')->name('cart');

Route::get('/cart', 'CartController@cart')->name('cart');

Route::patch('update-cart', 'CartController@update');
Route::delete('remove-from-cart', 'CartController@remove');

Route::get('/admin', 'AdminController@index');
Route::get('/add-category', 'AdminController@addCategory');