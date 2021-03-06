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

/*
******	Products
*/
	Route::get('/products/{id}', 'Products@read');
/*
******
*/

/*
******	Cart
*/
	Route::get('/cart', 'Cart@index');
	Route::delete('/cart/remove', 'Cart@remove');
	Route::post('/cart/add', 'Cart@add');
/*
******
*/

/*
******	Contact
*/
	Route::post('/contact', 'Contact@send');
/*
******
*/

/*
******	Filesystem
*/
	Route::get('/static/{file}', 'Common\PublicDisk@read');
/*
******
*/

/*
******	Admin panel
*/
	/* 
	*	Login/Logout part
	*/
	Route::get('/a/login', [ 'as' => 'login',  'uses' =>'Auth\LoginController@showLoginForm' ]);
	Route::get('/a/logout', [ 'as' => 'logout',  'uses' =>'Auth\LoginController@logout', ]);
	Route::post('/a/login', 'Auth\LoginController@login');

	/*
	*	Admin part
	*/
	Route::prefix('admin') -> middleware('auth') -> group(function()
	{
		Route::get('/', 'Admin\Index@index');
		
		/* Products */
		Route::prefix('products') -> group(function()
		{
			Route::get('/', 'Admin\Products@index');
			Route::post('/', 'Admin\Products@create');

			Route::get('/{id}', 'Admin\Products@read');
			Route::patch('/{id}', 'Admin\Products@update');
			Route::delete('/{id}', 'Admin\Products@delete');
		});

		/* Contact information */
		Route::get('/contact', 'Admin\Contact@index');
		Route::patch('/contact', 'Admin\Contact@update');
	});

/*
******
*/