@extends('global')

@section('title') Title @endsection

@section('body')

<main>
	<div class="container">
		<div class="row">
			<div class="col s12 m5 l4">
			      <div class="card blue-grey darken-1">
			        <div class="card-content white-text">
			          <span class="card-title">Pere</span>
			          <p>Descriere succintă</p>
			        </div>
			        <div class="card-action">
			        	<form method="POST" action="/cart/add?return={{ url() -> current() }}">
			        		{{ csrf_field() }}
			        		<input type="text" name="product" hidden="" value="Pere">

							<input type="submit" class="btn blue waves-effect" value="Adaugă în coș">
							<select name="quantity" style="display: block; width: 70%">
			        			<option value="0" selected="">0</option>
			        			<option value="1">1</option>
			        			<option value="2">2</option>
			        			<option value="3">3</option>
			        		</select>
							<br>
							<a class="btn " href="#" onclick="M.toast({html: 'Un link care va duce la o pagină cu descrierea produsului'})">Descriere produs</a>
			      		</form>
			        </div>
			      </div>		
			</div>
		
		</div>
	</div>
</main>
@endsection

@section('js')
// <script>

// </script>
@endsection