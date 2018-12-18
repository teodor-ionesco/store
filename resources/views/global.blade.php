<!DOCTYPE html>
<html>
	<head>
		<title>@yield('title')</title>
		@yield('head')
		<style type="text/css">
			@yield('css')
		</style>
	</head>
	<body>
		@yield('body')
		<script type="text/javascript">@yield('js')</script>
	</body>
</html>