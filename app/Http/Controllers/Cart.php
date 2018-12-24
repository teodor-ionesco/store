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
		//Session::flush();
    	//return response(Session::get('products'));

		$count_products = 0;
		$actual_products = [];
		
		if(Session::has('products'))
		{
			foreach(Session::get('products') as $key => $array)
			{
				if($array !== null)
					$count_products++;
			}
			
			foreach(Session::get('products') as $key => $array)
			{
				if($array !== null)
					$actual_products[$key] = $array;
			}
		}

    	return view('cart', [
    		'PRODUCTS' => $actual_products,
    		'PRODUCTS_COUNT' =>  $count_products,
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
    			'id' => $request -> input('id'),
				'name' => $request -> input('name'),
				'price' => $request -> input('price'),
    			'quantity' => $request -> input('quantity'),
    		]);
    	}
    	else
    	{
    		Session::put('products.'. count(Session::get('products')), [
    			'id' => $request -> input('id'),
				'name' => $request -> input('name'),
				'price' => $request -> input('price'),
    			'quantity' => $request -> input('quantity'),
    		]);
    	}

    	return redirect($_GET['return'] . '?toast=Product added');
    }

    /*
    *	Remove product from cart
    */
    public function remove(Request $request)
    {
		Session::put('products.'. $request -> input('nr'), null);

    	return redirect($_GET['return']. '?toast=Produs sters cu success!');
    }
}
