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

Route::get('/', 'HomePage@index');
Route::get('/cart', 'Cart@index');
Route::get('/cart/remove/{product}', 'Cart@remove');

Route::post('/cart/add', 'Cart@add');