<?php

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

Auth::routes();
Route::put('/change/password', 'UserController@checkEmail');
Route::put('/change/password/accept/{id}', 'UserController@changePassword');

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');

// View User
Route::get('/all/user', 'UserController@index')->middleware('isAdmin');

// Add Pizza
Route::get('/pizza/add', 'PizzaController@index')->middleware('isAdmin');
Route::post('/pizza/add/accept', 'PizzaController@store')->middleware('isAdmin');

// Edit Pizza
Route::get('/pizza/edit/{id}', 'PizzaController@edit')->middleware('isAdmin');
Route::put('/pizza/edit/accept/{id}', 'PizzaController@update')->middleware('isAdmin');

// Delete Pizza
Route::get('/pizza/delete/{id}', 'PizzaController@search')->middleware('isAdmin');
Route::delete('/pizza/delete/accept/{id}', 'PizzaController@destroy')->middleware('isAdmin');

// Detail Pizza
Route::get('/pizza/detail/{id}', 'PizzaController@show');

//Add To Cart
Route::get('/cart/{id}', 'CartController@index')->name('cart')->middleware('isMember');
Route::post('/addToCart/{pizza_id}/{user_id}', 'CartController@store')->middleware('isMember');
Route::put('/cart/update/{id}', 'CartController@update')->middleware('isMember');
Route::delete('/cart/delete/{id}', 'CartController@destroy')->middleware('isMember');

// Transaction
Route::get('/transaction/history/{id}', 'TransactionController@index')->middleware('auth');
Route::post('/checkOut/{user_id}', 'TransactionController@store')->middleware('isMember');
Route::get('/transaction/detail/{id}', 'TransactionController@show')->middleware('auth');