@extends('admin.global')

@section('title') Admin Dashboard - Products @endsection
@section('body')
	<div class="container">
		@if(!empty($PRODUCT))
			<form action="/admin/products/{{ $PRODUCT -> id}}" method="POST" enctype="multipart/form-data">
				{{ csrf_field() }}
				<input type="text" hidden name="_method" value="PATCH">
				
				<h4>Quick actions</h4>
				<div class="divider"></div>
				<br>
				<a href="/products/{{ $PRODUCT -> id }}" target="_BLANK" class="btn blue waves-effect">View product</a>
				<a href="#!" onclick="checkit();" class="btn red waves-effect">Delete product</a>		

				<br>
				<br>
				<h4>Edit</h4>
				<div class="divider"></div>
				<div class="row">
					<div class="input-field col s12 m6 l6">
						<input value="{{ $PRODUCT -> title }}" id="ptitle" type="text" class="validate" name="title" required maxlength="250">
						<label for="ptitle">Product title</label>
					</div>

					<div class="input-field col s12 m6 l6">
						<input value="{{ $PRODUCT -> brief }}" id="pbiref" type="text" class="validate" name="brief" required maxlength="250">
						<label for="pbiref">Product brief</label>
					</div>
				</div>	
				<div class="row">
					<div class="input-field col s12 m8 l8">
						<textarea id="ptext" class="materialize-textarea" name="description" required>{{ $PRODUCT -> description }}</textarea>
						<label for="ptext">Product description</label>		
					</div>	
					<div class="file-field input-field col s12 m4 l4">
						<!-- <img src="/static/{{ $PRODUCT -> cover }}" width="200"> -->
						<div class="btn">
							<span>Product cover</span>
							<input type="file" name="cover">
						</div>
					</div>																		
				</div>
				<button class="btn blue waves-effect waves-darken" style="position: relative; left: 11px;">Submit</button>
			</form>

			<!--- Deletion form -->
			<form name="del_form" action="/admin/products/{{ $PRODUCT -> id }}" method="POST">
				{{ csrf_field() }}
				<input type="text" hidden name="_method" value="DELETE">
				<input type="text" name="target" value="{{ $PRODUCT -> id }}" hidden>
			</form>
			<!------ --- -->
		@endif
	</div>
@endsection

@section('js')
	function checkit() {
		if(confirm('Are you sure you want to delete this product? This action cannot be undone.'))
			document.del_form.submit();
	}

	M.textareaAutoResize($('#ptext'));
@endsection
