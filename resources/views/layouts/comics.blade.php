<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<title>Comics Area</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	@include("partials.libraries.jquery3-4-1")
	@include("partials.libraries.bootstrap4")
	@include("partials.libraries.fontawesome-5-8-1")
	@include("partials.fonts.nunito")
	@include("partials.libraries.nprogress")
	@include("partials.libraries.masonry")
	<link rel="stylesheet" type="text/css" href="{{ asset('modules/comics/css/app.css') }}">
	<script src="{{ asset('modules/comics/js/app.js') }}"></script>
	@yield("scripts")
	@include("partials.libraries.shared")
</head>
<body>
	<div id="app">
		
		@include("partials.top-nav", [
			"config"					 =>	[
				"background"			 =>	"bg-dark"
			],
			"brand"						 =>	[
				"title"					 =>	"Comics Area",
				"route"					 =>	route("comics.index")
			],
			"links"						 =>	[
				[
					"title"				 =>	"Characters",
					"route"				 =>	route("comics.characters.index")
				],
				[
					"title"				 =>	"Series",
					"route"				 =>	route("comics.series.index")
				],
				[
					"title"				 =>	"Arcs",
					"route"				 =>	route("comics.arcs.index")
				],
				[
					"title"				 =>	"Issues",
					"route"				 =>	route("comics.issues.index")
				]
				,
				[
					"title"				 =>	"Authors",
					"route"				 =>	route("comics.authors.index")
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
			<div id="main-content" class="container shadow">
				@yield("content")
			</div>
		</main>
	</div>
</body>
@yield("js")
</html>