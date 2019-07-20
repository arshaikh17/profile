<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Comics Area</title>
	@include("partials.modules.jquery3-4-1")
	@include("partials.modules.bootstrap4")
	@include("partials.modules.fontawesome-5-8-1")
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
	@include("partials.modules.nprogress")
	@include("partials.modules.masonry")
	<link rel="stylesheet" type="text/css" href="{{ asset('modules/comics/css/app.css') }}">
	<script src="{{ asset('modules/comics/js/app.js') }}"></script>
	@yield("scripts")
	@include("partials.modules.shared")
</head>
<body>
	<div id="app">
		
		@include("partials.nav-dark", [
			"brand"						 =>	[
				"title"					 =>	"Comics Area",
				"route"					 =>	route("comics.index")
			],
			"links"						 =>	[
				[
					"title"				 =>	"Characters",
					"route"				 =>	route("comics.characters.index")
				]
			]
		])
		
		<main class="py-4">
			@if (session()->has("message"))
				@include("partials.toast-alert", [
					"alertType"					 =>	"success",
					"message"					 =>	session("message")
				])
			@endif
			@if ($errors->any())
				@include("partials.toast-alert", [
					"alertType"					 =>	"fail",
					"message"					 =>	$errors->first()
				])
			@endif
			@yield("content")
		</main>
	</div>
</body>
@yield("js")
</html>