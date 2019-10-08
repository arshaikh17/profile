<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ config('app.name', 'Laravel') }}</title>
	<!-- Scripts -->
	@include("partials.libraries.jquery3-4-1")
	<script src="{{ asset('vue/app.js?v=' . time()) }}" defer></script>
	<!-- Fonts -->
	@include("partials.fonts.quicksand")
	<!-- Styles -->
	<link href="{{ asset('vue/app.css?v=' . time()) }}" rel="stylesheet">
	<link href="{{ asset("modules/shared.css?v=" . time()) }}" rel="stylesheet">
	<link href="{{ asset("modules/tracker/css/app.css?v=" . time()) }}" rel="stylesheet">
	@include("partials.libraries.fontawesome-5-8-1")
</head>
<body>
	@include("partials.top-nav", [
		"config"						 =>	[
			"background"				 =>	"bg-primary"
		],
		"brand"							 =>	[
			"title"						 =>	"Tracker",
			"route"						 =>	route("tracker.index"),
			"colour"					 =>	"text-white",
		],
		"links"							 =>	[
			[
				"title"					 =>	"Modules",
				"route"					 =>	route("tracker.modules.index")
			],
			[
				"title"					 =>	"Issues",
				"route"					 =>	route("tracker.issues.index")
			],
		]
	])
	<main class="py-4" id="app">
		
		@if (session()->has("status"))
			@include("partials.alert", [
				"alertType"				 =>	"success",
				"message"				 =>	session("status")
			])
		@endif
		@if ($errors->any())
			@include("partials.alert", [
				"alertType"				 =>	"fail",
				"message"				 =>	$errors->first()
			])
		@endif
		@yield("content")
	</main>
	@yield("script")
</body>
</html>