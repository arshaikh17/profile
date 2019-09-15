<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<title>Generals</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	@include("partials.modules.jquery3-4-1")
	@include("partials.modules.bootstrap4")
	@include("partials.modules.fontawesome-5-8-1")
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
	@include("partials.modules.nprogress")
	@yield("scripts")
	@include("partials.modules.shared")
</head>
<body>
	<main id="app">
		@include("partials.top-nav", [
			"config"					 =>	[
				"background"			 =>	"bg-success"
			],
			"brand"						 =>	[
				"title"					 =>	"Generals",
				"route"					 =>	route("generals.index"),
				"colour"				 =>	"text-white",
			],
			"links"						 =>	[
			]
		])
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
</body>
</html>