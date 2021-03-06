<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Products as MProducts;

class HomePage extends Controller
{
    public function index()
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
		
    	return view('homepage', [
    		'PRODUCTS_COUNT' => $count_products,
			'PRODUCTS' => MProducts::select(['id', 'brief', 'title', 'cover']) -> get(),
    	]);
    }
}
