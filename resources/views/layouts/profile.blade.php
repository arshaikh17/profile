<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ config('app.name', 'Laravel') }}</title>
	@include("partials.modules.jquery3-4-1")
	@include("partials.modules.bootstrap4")
	@include("partials.modules.fontawesome-5-8-1")
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
	@include("partials.modules.shared")
</head>
<body>
	<div id="app">
		<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
			<div class="container">
				<a class="navbar-brand" href="{{ url('/') }}">
					{{ config('app.name', 'Laravel') }}
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<!-- Left Side Of Navbar -->
					<ul class="navbar-nav mr-auto">
					</ul>

					<!-- Right Side Of Navbar -->
					@include("partials.sub-nav")
				</div>
			</div>
		</nav>
		
		<main class="py-4">
			@if(session("status"))
				<div class="container">
					<div class="alert alert-success alert-dismissable fade in">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>Success!</strong> {{session("status")}}
					</div>
				</div>
			@endif
			
			@if($errors->has("status"))
				<div class="container">
					<div class="alert alert-danger alert-dismissable fade in">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>Error!</strong> {{$errors->first()}}
					</div>
				</div>
			@endif
			@yield('content')
		</main>
	</div>
	@yield("script")
</body>
</html>