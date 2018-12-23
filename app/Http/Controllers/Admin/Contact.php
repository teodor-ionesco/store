<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Contact as MContact;
use App\Http\Controllers\Controller;

class Contact extends Controller
{
	/* Bridge variable */
	private $Bridge = [];

    /* Show contact settings */
    public function index()
    {
    	return view('admin.contact', [
    		'EMAIL' => MContact::where('id', 1) -> first(),
    		'TOAST' => !empty($this -> Bridge['TOAST']) ? $this -> Bridge['TOAST'] : null,
    	]);
    }

    /* Update email */
    public function update(Request $request)
    {
    	/* Check if email field is empty */
    	$validator = Validator::make($request -> all(), [
    		'email' => 'required|email|max:250',
    	]);

    	/* Check if email field is empty */
    	if(empty($request -> input('email')) || $validator -> fails())
    	{
    		$this -> Bridge['TOAST'] = "Please specify a valid email address.";
    		return $this -> index();
     	}

     	/* Update records */
     	MContact::where('id', 1) -> update([
     		'email' => $request -> input('email')
     	]);

     	$this -> Bridge['TOAST'] = "Email address updated successfully!";
     	return $this -> index();
    }
}
