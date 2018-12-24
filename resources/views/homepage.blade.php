@extends('global')

@section('title') Ovva - Produse @endsection
@section('body')

<main>
 
	<div class="container">
	
	
		 <div class="row">
		 @foreach($PRODUCTS as $object)
			<a href="/products/{{ $object -> id }}">
				<div  class="card" style="width: 18rem;">
			
				<img class="card-img-top" src="/static/{{ $object -> cover }}" alt="Card image cap">
					
				  <div class="card-body">
					<h5 class="card-title">{{ $object -> title }}</h5>
					<p class="card-text">{{ $object -> brief }}</p>
					<a href="/products/{{ $object -> id }}" class="btn btn-outline-success">Comanda</a>
				  </div> 
				</div>
			</a>
		 @endforeach
		 
		  <!--<a href="http://godesign.ro/"><div  class="card" style="width: 18rem;">
		  <img class="card-img-top" src="images/card1.jpg" alt="Card image cap"></a>
		  <div class="card-body">
			<h5 class="card-title">Produs 1</h5>
			<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
			<a href="#" class="btn btn-outline-success">Comanda</a>
		  </div> 
		</div> -->
	</div>
</main>
@endsection

@section('js')
// <script>

// </script>
@endsection