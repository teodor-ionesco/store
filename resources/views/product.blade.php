@extends('global')

@section('title') Ovva @endsection
@section('body')
<div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin-top:200px; {{ !empty($_GET['toast']) ? 'display:block;' : 'display:none;' }}">
  <strong>Holy guacamole!</strong> You should check in on some of those fields below.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	<span aria-hidden="true">&times;</span>
  </button>
</div>

<div>
<?= html_entity_decode($PRODUCT -> description) ?>
</div>

<div class="produs" style="margin-top:250px; float:right; margin-right:50px;">
	<form action="/cart/add?return=/products/{{ $PRODUCT -> id }}" method="POST" name="form_to_submit">
		{{ csrf_field() }}
		<input type="text" value="{{ $PRODUCT -> id }}" hidden name="id">
		<input type="text" value="{{ $PRODUCT -> title }}" hidden name="name">
		<input type="text" value="{{ $PRODUCT -> price }}" hidden name="price">
		<input type="button" value="-" onclick="minus()">
		<input type="text" name="quantity" id="quantity" value="0" placeholder="Introduceti cantitatea aiciia" readonly>
		<input type="button" value="+" onclick="plus()">
		<br>
			<div style="display: inline-block;">Pret:</div>
			&nbsp;
			<div  style="display: inline-block;" id="updated_price">0</div> RON
		<br>
		<a href="#!" class="btn btn-outline-success" onclick="form_submit()">Comanda</a>
	</form>
</div>
@endsection

@section('js')
// <script>

	function minus()
	{
		if($('#quantity').val() < 0)
		{
			$('#quantity').val(0);
			$('#updated_price').html(0);
		}
		
		if($('#quantity').val() == 0)
			return ;
		else
		{
			$('#quantity').val($('#quantity').val()-1);
			$('#updated_price').html($('#quantity').val()*{{ $PRODUCT -> price }});
		}
	}
	
	function plus()
	{
		if($('#quantity').val() < 0)
			$('#quantity').val(0);
		
		var test = $('#quantity').val();
		test++;
		$('#quantity').val(test);
		$('#updated_price').html(test*{{ $PRODUCT -> price }});
	}
	
	function form_submit()
	{
		if($('#quantity').val() <= 0)
		{
			alert('Va rugam selectati macar un produs.');
			return;
		}
			
		document.form_to_submit.submit();
	}
	
// </script>
@endsection