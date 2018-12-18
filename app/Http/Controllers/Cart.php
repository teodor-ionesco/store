<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Cart extends Controller
{
	/*
	*	Shows the cart
	*/
    public function index()
    {
    	//return response(Session::get('products'));

    	return view('cart', [
    		'PRODUCTS' => Session::get('products'),
    	]);
    }

    /*
    *	Add product to cart.
    *	It takes the input values from the submitted form and binds them to the cookie session
    */
    public function add(Request $request)
    {
    	if(!Session::has('products'))
    	{
    		Session::put('products.0', [
    			'product' => $request -> input('product'),
    			'quantity' => $request -> input('quantity'),
    		]);
    	}
    	else
    	{
    		Session::put('products.'. count(Session::get('products')), [
    			'product' => $request -> input('product'),
    			'quantity' => $request -> input('quantity'),
    		]);
    	}

    	return redirect($_GET['return']);
    }

    /*
    *	Remove product from cart
    */
    public function remove($product)
    {
    	Session::remove('products.'.$product);

    	return redirect($_GET['return']);
    }
}
