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
Route::get('/home', 'HomeController@index')->name('home');


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
		
		Route::prefix('products') -> group(function()
		{
			Route::get('/', 'Admin\Products@index');
			Route::post('/', 'Admin\Products@create');

			Route::get('/{id}', 'Admin\Products@read');
			Route::patch('/{id}', 'Admin\Products@update');
			Route::delete('/{id}', 'Admin\Products@delete');
		});
	});

/*
******
*/