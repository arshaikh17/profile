<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<title>Articles - My Friend Aitashan Babu Bhaiyya</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	@include("partials.libraries.jquery3-4-1")
	@include("partials.libraries.bootstrap4")
	@include("partials.libraries.fontawesome-5-8-1")
	@include("partials.fonts.raleway")
	@yield("scripts")
	@include("partials.libraries.shared")
	
	@yield("meta")
</head>
<body>
	<div id="app">
		
		@include("partials.top-nav", [
			"config"					 =>	[
				"background"			 =>	""
			],
			"brand"						 =>	[
				"title"					 =>	"Articles",
				"route"					 =>	route("index.index")
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
			<div id="main-content" class="container shadow">
				@yield("content")
			</div>
		</main>
	</div>
</body>
@yield("js")
</html>