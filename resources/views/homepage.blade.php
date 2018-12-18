@extends('global')

@section('title') Title @endsection

@section('body')

<table border="1">
	<thead>
		<tr>
			<td>Produs</td>
			<td>Cantitate</td>
			<td>Adaugă în coș</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<form method="POST" action="/cart/add?return={{ url() -> current() }}">
				{{ csrf_field() }}
				<td>Mere și pere</td>
				<input type="text" name="product" hidden="" value="Mere și pere">
				<td>
					<select name="quantity">
						<option value="0" selected="">0</option>
						<option value="1">1</option>
						<option value="2" >2</option>
						<option value="3">3</option>
						<option value="4">4</option>
					</select>
				</td>
				<td><input type="submit" name="" value="Adaugă"></td>
			</form>
		</tr>
		<tr>
			<form method="POST" action="/cart/add?return={{ url() -> current() }}">
				{{ csrf_field() }}			
				<td>Pere și bere</td>
				<input type="text" name="product" hidden="" value="Pere și bere">
				<td>
					<select name="quantity">
						<option value="0" >0</option>
						<option value="1" >1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
					</select>
				</td>
				<td><input type="submit" name="" value="Adaugă"></td>			
			</form>
		</tr>
		<tr>
			<form method="POST" action="/cart/add?return={{ url() -> current() }}">
				{{ csrf_field() }}					
				<td>Bere și sfeclă</td>
				<input type="text" name="product" hidden="" value="Bere și sfeclă">
				<td>
					<select name="quantity">
						<option value="0" selected="">0</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
					</select>
				</td>
				<td><input type="submit" name="" value="Adaugă"></td>		
			</form>	
		</tr>
	</tbody>
</table>

<a href="/cart">Verifică coșul</a>

@endsection