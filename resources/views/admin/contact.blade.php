@extends('admin.global')

@section('title') Admin Dashboard - Contact information @endsection
@section('body')

<div class="container">
	<p class="flow-text">
		This section allows you to edit the contact email to which the customer information will be sent.
	</p>

	<!-- <div class="divider"></div> -->

	<form method="POST">
		{{ csrf_field() }}
		<input type="text" hidden name="_method" value="PATCH">
	
		<div class="row">
			<div class="col l6 m6 s12 input-field">
				<input id="iemail" type="email" name="email" required class="validate" value="{{ $EMAIL -> email}}">
				<label for="iemail">Contact email</label>			
			</div>
			<div class="col l6 m6 s12">
				<button class="btn blue waves-effect" style="position: relative; top: 20px;">Change email</button>
			</div>
		</div>
	</form>
</div>

@endsection