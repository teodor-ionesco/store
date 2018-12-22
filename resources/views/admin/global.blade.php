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
		<nav class="blue darken-2">
			<div class="nav-wrapper">
				<a href="/admin" class="brand-logo">Dashboard</a>
				<a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
				<ul class="right hide-on-med-and-down">
					<li> <a href="/admin/products">Products</a> </li>
					<li> <a href="/admin/contact">Contact</a> </li>
					<li> <a href="/a/logout">Logout</a></li>
				</ul>
			</div>
		</nav>

		<ul class="sidenav" id="mobile-demo">
			<li> <a href="/admin/products">Products</a> </li>
			<li> <a href="/admin/contact">Contact</a> </li>
			<li> <a href="/a/logout">Logout</a></li>
		</ul>
		<!--- /header --->		

		@yield('body')

		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('.sidenav').sidenav();
			});

			@if(!empty($TOAST))
				$(document).ready(function(){
					M.toast({html: '{{ $TOAST }}'});
				});
			@endif

			@if(!empty($_GET['toast']))
				$(document).ready(function(){
					M.toast({html: "{{ $_GET['toast'] }}"});
				});
			@endif
		</script>
		<script type="text/javascript">@yield('js')</script>
	</body>
</html>