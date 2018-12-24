<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Products as MProducts;

class Products extends Controller
{
	/* Read product */
    public function read($id)
	{
		$count_products = 0;
		
		if(Session::has('products'))
		{
			foreach(Session::get('products') as $key => $array)
			{
				if($array !== null)
					$count_products++;
			}
		}
		
		return view('product', [
			'PRODUCTS_COUNT' => $count_products,
			'PRODUCT' => MProducts::where('id', $id) -> first(),
		]);
	}
}
