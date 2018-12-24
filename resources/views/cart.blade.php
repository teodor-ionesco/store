@extends('global')

@section('title') Cart @endsection

@section('body')

<div class="container">
	<h3 style="text-align: center;">Cosul De Cumparaturi</h3><br>
	<table class="table table-striped">
	  <thead>
		<tr>
		  <th scope="col">Produs</th>
		  <th scope="col">Cantitate</th>
		  <th scope="col">Pret</th>
		  <th scope="col">Actiuni</th>
		</tr>
	  </thead>
	  <tbody>
	  @if(!empty($PRODUCTS))
			@foreach($PRODUCTS AS $key => $array)
				<tr>
				  <td>{{ $array['name'] }}</td>
				  <td>
					<!-- <input type="button" value="-" onclick="minus({{ $key }}, {{ $array['price'] }})" > -->
					<!-- <input type="text" id="quantity_{{ $key }}" value="{{ $array['quantity']}}" readonly> -->
					<!-- <input type="button" value="+" onclick="plus({{ $key }}, {{ $array['price'] }})">  -->
					{{ $array['quantity']}}
				</td>
				<td>
					<div id="update_price_{{ $key }}">{{ $array['price']*$array['quantity'] }}</div> RON	
				</td>
				  <td>
					<form action="/cart/remove?return=/cart" method="POST">
						{{ csrf_field() }}
						<input hidden type="text" name="nr" value="{{ $key }}" >
						<input hidden type="text" name="_method" value="DELETE" >
						<input type="submit" class="btn btn-danger" value="Sterge produs">
					</form>	
					<br>
				  </td>
				</tr>
			@endforeach
		@endif
	  </tbody>
	</table>
	
	<br>
	@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif	
	
	<div class="alert alert-warning alert-dismissible fade show" role="alert" style="{{ !empty($_GET['toast']) ? 'display:block;' : 'display:none;' }}">
	  <strong>Eroare!</strong> {{ !empty($_GET['toast']) ? $_GET['toast'] : null }}
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	  </button>
	</div>	

	<form action="/contact" method="POST">
		{{ csrf_field() }}
		<div class="form-group">
			<label for="pnume">Nume si prenume</label>
			<input maxlength="250" name="name" type="text" class="form-control" id="pnume" aria-describedby="emailHelp" placeholder="Numele si prenumele dvs." required>
		</div>
		<div class="form-group">
			<label for="padresa">Adresa de livrare</label>
			<input maxlength="250" name="address" type="text" class="form-control" id="padresa" placeholder="Adresa de livrare" required>
		</div>
		
		<div class="form-group">
			<label for="pemail">Adresa de email</label>
			<input name="email" type="email" class="form-control" id="pemail" placeholder="Adresa de email" required>
		</div>			
		
		<div class="form-group">
			<label for="pnrtel">Numar de telefon</label>
			<input name="tel" type="tel" class="form-control" id="pnrtel" placeholder="Numar de telefon" required>
		</div>

		<div class="form-group">
			<label for="exampleFormControlTextarea1">Observatii</label>
			<textarea maxlength="1000" name="obs" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Observatii suplimentare"></textarea>
		</div>

		<input type="submit" class="btn btn-success" style="float: right;" value="Plaseaza comanda">
	</form>

</div>

@endsection

@section('js')
// <script>

	/* minus */
	function minus(id, price)
	{
		if($('#quantity_'+ id).val() < 0)
		{
			$('#quantity_' + id).val(0);
			$('#update_price_' + id).html(0);
		}
		
		if($('#quantity_' + id).val() == 0)
			return ;
		else
		{
			$('#quantity_' + id).val($('#quantity_' + id).val()-1);
			$('#update_price_'+id).html($('#quantity_' + id).val()*price);
		}
	}
	
	/* plus */
	function plus(id, price)
	{
		if($('#quantity_' + id).val() < 0)
			$('#quantity_' + id).val(0);
		
		var test = $('#quantity_' + id).val();
		test++;
		$('#quantity_'+id).val(test);
		$('#update_price_'+id).html(test*price);
	}
	
// </script>
@endsection