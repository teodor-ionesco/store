@extends('admin.global')

@section('title') Admin Dashboard - Products @endsection
@section('body')

<div class="container">
	<ul class="collapsible">
		<li>
			<div class="collapsible-header"><i class="material-icons">add_circle</i>Create new product</div>
			<div class="collapsible-body">
				<form action="/admin/products" method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}
					<div class="row">
						<div class="input-field col s12 m6 l6">
							<input id="ptitle" type="text" class="validate" name="title" required maxlength="250">
							<label for="ptitle">Product title</label>
						</div>

						<div class="input-field col s12 m6 l6">
							<input id="pprice" type="text" class="validate" name="price" required maxlength="250">
							<label for="pprice">Product price (RON)</label>
						</div>
					</div>	
					
					<div class="row">
						<div class="input-field col s12 m6 l6">
							<input id="pbiref" type="text" class="validate" name="brief" required maxlength="250">
							<label for="pbiref">Product brief</label>
						</div>
						<div class="file-field input-field col s12 m4 l4">
							<div class="btn">
								<span>Product cover</span>
								<input type="file" name="cover">
							</div>
						</div>	
					</div>
					
					<div class="row">
						<div class="input-field col s12 m8 l8">
							<textarea id="ptext" class="materialize-textarea" name="description" required></textarea>
							<label for="ptext">Product description</label>		
						</div>	
																	
					</div>
					<button class="btn blue waves-effect waves-darken" style="position: relative; left: 11px;">Submit</button>
				</form>
			</div>
		</li>
	</ul>

	<div class="divider"></div>

	<div class="row">
		@if($PRODUCTS -> isNotEmpty())
			@foreach($PRODUCTS as $object)
				<div class="col s12 m4 l3">
					<div class="card">
						<div class="card-image">
							<img src="/static/{{ $object -> cover }}">
							<span class="card-title">{{ $object -> title }}
								<span style="color: black;">({{ $object -> price }} RON)</span>
							</span>

						</div>
						<div class="card-content">
							<p>{{ $object -> brief }}</p>
						</div>
						<div class="card-action">
							<a href="/admin/products/{{ $object -> id }}">View</a>
						</div>
					</div>
				</div>
			@endforeach
		@endif
	</div>
</div>

@endsection

@section('js')
//<script type="text/javascript">
	
	$(document).ready(function(){
		$('.collapsible').collapsible();
	});

//</script>
@endsection