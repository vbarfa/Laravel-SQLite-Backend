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

Route::get('/user', 'UserController@index')->name('user');
Route::post('user', 'UserController@index')->name('user');

Route::get('/customer', 'CustomerController@index')->name('customer');
Route::post('customer', 'CustomerController@index')->name('customer');

Route::get('/user_add', 'UserController@create');
Route::post('user_add', 'UserController@store');


Route::get('/customer_add', 'CustomerController@create');
Route::post('customer_add', 'CustomerController@store');

Route::get('/user_edit/{id}', 'UserController@update');
Route::post('user_edit', 'UserController@update_user');

Route::get('/customer_edit/{id}', 'CustomerController@update');
Route::post('customer_edit', 'CustomerController@update_customer');


Route::delete('/customer/{id}', array('as' => 'customer.destroy','uses' => 'CustomerController@destroy'));
Route::delete('/user/{id}', array('as' => 'user.destroy','uses' => 'UserController@destroy'));


