<!DOCTYPE html>
<html>
	<head>
		<title>@yield('title')</title>
		<link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
		@yield('head')
		<style type="text/css">
			@yield('css')
		</style>
	</head>
	<body>
		<!--- header --->
		<nav>
			<div class="nav-wrapper">
				<a href="//{{ $_SERVER['SERVER_NAME'] }}:{{ $_SERVER['SERVER_PORT']}}" class="brand-logo">Home</a>
				<a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
				<ul class="right hide-on-med-and-down">
					<li>
						<a href="cart" style="">
							Coș
							@if($PRODUCTS_COUNT > 0)
								<div class="chip" style="background-color: red; color: white;">{{ $PRODUCTS_COUNT }}</div>
							@endif
						</a>
					</li>
				</ul>
			</div>
		</nav>

		<ul class="sidenav" id="mobile-demo">
			<li>
				<a href="cart" style="">
					Coș
					@if($PRODUCTS_COUNT > 0)
						<div class="chip" style="background-color: red; color: white;">{{ $PRODUCTS_COUNT }}</div>
					@endif
				</a>
			</li>
		</ul>
		<!--- /header --->		

		@yield('body')

		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('.sidenav').sidenav();
			});			
		</script>
		<script type="text/javascript">@yield('js')</script>
	</body>
</html>