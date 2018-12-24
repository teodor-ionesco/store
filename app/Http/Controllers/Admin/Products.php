<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Products as MProducts;

class Products extends Controller
{
	/*
	*	Bridge array
	*/
	private $Bridge = [];

	/*
	*	Show active products
	*/
    public function index() 
    {
    	return view('admin.products', [
    		'PRODUCTS' => MProducts::select(['id', 'title', 'brief', 'cover', 'price']) -> get(),
    		'TOAST' => !empty($this -> Bridge['TOAST']) ? $this -> Bridge['TOAST'] : null,
    	]);
    }

    /*
    *	Create a new product
    */
    public function create(Request $request)
    {
    	/*
    	*	Insert records into DB
    	*/
    	MProducts::insert([
    		'title' => $request -> input('title'),
    		'brief' => $request -> input('brief'),
    		'description' => $request -> input('description'),
			'price' => $request -> input('price'),
    		'cover' => empty($request -> file('cover')) ?: Storage::disk('public') -> putFile('/', $request -> file('cover')),
    	]);

    	$this -> Bridge['TOAST'] = 'Product added successfully!';

    	return $this -> index();
    }

    /*
    *	Read a product
    */
    public function read($id)
    {
		$ret = MProducts::select('*') -> where('id', $id) -> first();

		if(empty($ret))
			return view('admin.product', [
				'PRODUCT' => null,
				'TOAST' => 'Product not found.',
			]);
		else
	    	return view('admin.product', [
	    		'PRODUCT' => $ret,
	    	]);
    }

    /*
    *	Delete a product
    */
    public function delete($id)
    {
    	/* Check if product exists */
    	if(!MProducts::select('cover') -> where('id', $id) -> first())
    		return redirect('/admin/products?toast=Such product does not exist.');

    	/* Delete from filesystem */
    	Storage::disk('public') -> delete(MProducts::select(['cover']) -> where('id', $id) -> first() -> cover);

    	/* Delete from database */
    	MProducts::where('id', $id) -> delete();

    	return redirect('/admin/products?toast=Product deleted with success!');
    }

    /*
    *	Update a product
    */
    public function update($id, Request $request)
    {
    	/* Check if product exists */
    	if(!MProducts::select('cover') -> where('id', $id) -> first())
    		return redirect('/admin/products?toast=Such product does not exist.');

    	/* Delete old cover from filesystem */
    	if(!empty($request -> file('cover')))
    	{
    		Storage::disk('public') -> delete(MProducts::select(['cover']) -> where('id', $id) -> first() -> cover);

    		MProducts::where('id', $id) -> update([
				'cover' => Storage::disk('public') -> putFile('/', $request -> file('cover')),
    		]);
    	}

    	/* Update records */
    	MProducts::where('id', $id) -> update([
    		'title' => $request -> input('title'),
    		'brief' => $request -> input('brief'),
			'price' => $request -> input('price'),
    		'description' => $request -> input('description'),
    	]);

    	return redirect('/admin/products/' . $id);
    }
}
