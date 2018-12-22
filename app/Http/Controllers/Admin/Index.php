<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Index extends Controller
{
	/*
	*	Returns index view
	*/
    public function index()
    {
    	return view('admin.index', [
    		
    	]);
    }
}
