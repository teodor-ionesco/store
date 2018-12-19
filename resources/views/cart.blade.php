@extends('global')

@section('title') Cart @endsection

@section('body')

<main>
	<table border="1">
		<thead>
			<tr>
				<td>Produs</td>
				<td>Cantitate</td>
				<td>Elimină</td>
			</tr>
		</thead>
		<tbody>
			@foreach($PRODUCTS as $key => $product)
				<tr>
					<td>{{ $product['product'] }}</td>
					<td>{{ $product['quantity'] }}</td>
					<td><a href="/cart/remove/{{ $key }}?return={{ url() -> current() }}">Șterge din coș</a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
</main>

@endsection