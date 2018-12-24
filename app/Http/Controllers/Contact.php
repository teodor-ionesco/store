<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Contact as MContact;

class Contact extends Controller
{
    public function send(Request $request)
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
		
		if($count_products <= 0)
			return redirect('/cart?toast=Va rugam cumparati ceva');
		
		$validate = Validator::make($request -> all(), [
			'name' => 'required|max:250',
			'address' => 'required|max:250',
			'email' => 'email|required',
			'tel' => 'required|numeric',
			'obs' => 'max:1000',
		]);
		
		if($validate -> fails())
		{
			return redirect('/cart')
					-> withErrors($validate)
					-> withInput();
		}
		
		/* Send mail to */
		$to = MContact::where('id', 1) -> first() -> email;
		
		/* Bind contact info to text mail */
		$text = "Nume: ". $request -> input('name') . "\r\n";
		$text .= "Adresa: ". $request -> input('address') . "\r\n";
		$text .= "Email: ". $request -> input('email') . "\r\n";
		$text .= "Telefon: ". $request -> input('tel') . "\r\n";
		$text .= "Observatii: " . $request -> input('obs')  . "\r\n" . "\r\n" . "\r\n";
		$text .= "Comenzile: Produs | Cantitate | Pret ". "\r\n" . "\r\n";
		
		/* Bind products to text mail */
		foreach(Session::get('products') as $key => $array)
		{
			if($array !== null)
				$text .= "• $array[name] | $array[quantity] buc. | ". $array['quantity'] * $array['price'] . " RON\r\n";
		}
		
		/* Bind headers to mail */
		$header = "From: " .$request -> input('email') . "\r\n";
		
		/* Send mail */
		mail($to, "Comanda", $text, $headers);
		
		Session::flush();
		
		return redirect('/cart?toast=Comanda plasata cu succes!');
	}
}
