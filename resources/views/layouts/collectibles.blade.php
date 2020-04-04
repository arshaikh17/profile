<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<title>Investments</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	
	<script src="{{ asset('vue/app.js?v=' . time()) }}" defer></script>
	<link href="{{ asset('vue/app.css?v=' . time()) }}" rel="stylesheet">
	<link href="{{ asset("modules/shared.css?v=" . time()) }}" rel="stylesheet">
	
	@include("partials.libraries.fontawesome-5-8-1")
	@include("partials.fonts.raleway")
	@yield("scripts")
	
	@yield("meta")
</head>
<body>
	<div id="app">
		
		@include("partials.top-nav", [
			"config"					 =>	[
				"background"			 =>	"bg-dark"
			],
			"brand"						 =>	[
				"title"					 =>	"Collectibles",
				"route"					 =>	route("collectibles.index")
			],
			"links"						 =>	[],
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