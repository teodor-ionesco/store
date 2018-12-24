<!DOCTYPE html>
<html>
	<head>
		<title>@yield('title')</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<link rel="stylesheet" href="css/style.css">
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="css/swiper.min.css">
		<link rel="stylesheet" href="css/aos.css">
		<link rel="stylesheet" href="css/style.css">
		
		@yield('head')
		<style type="text/css">
			@yield('css')
		</style>
	</head>
	<body>
		<!--- header  NAVBAR--->
		<nav class="navbar fixed-top navbar-expand-lg navbar navbar-light" style="background-color: rgba(146,255,175,1.00)">
		 <div class="container">
		  <a class="navbar-brand" href="#">Navbar</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto w-100 justify-content-end">
			  <li class="nav-item active">
				<a class="nav-link" href="#">Acasa <span class="sr-only">(current)</span></a>
			  </li>
			 
			  <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				  Produse
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				  <a class="dropdown-item" href="#">Produse</a>
				  <div class="dropdown-divider"></div>
				  <a class="dropdown-item" href="#">Produs1</a>
				  <a class="dropdown-item" href="#">Produs2</a>
				</div>
			  </li>
			   <li class="nav-item">
				<a class="nav-link" href="#">Retete</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="#">Contact</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="/cart" style="margin-left: 15px;">
					<i class="fa fa-shopping-cart" style="font-size: 24px;"></i>
					@if($PRODUCTS_COUNT > 0)
						<span class="badge badge-pill badge-danger">{{ $PRODUCTS_COUNT }}</span>
					@endif
				</a>
			  </li>			  
			  </ul>
		  </div>
		  </div>
		</nav>

		<!--- /header --->		

		@yield('body')

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

		<script type="text/javascript">
			/*@if(!empty($TOAST))
				$(document).ready(function(){
					M.toast({html: '{{ $TOAST }}'});
				});
			@endif

			@if(!empty($_GET['toast']))
				$(document).ready(function(){
					M.toast({html: "{{ $_GET['toast'] }}"});
				});
			@endif	*/		
		</script>
		<script type="text/javascript">@yield('js')</script>
	</body>
</html>