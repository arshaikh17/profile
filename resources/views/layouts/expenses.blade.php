<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<title>Expenses</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	@include("partials.libraries.jquery3-4-1")
	@include("partials.libraries.bootstrap4")
	@include("partials.libraries.fontawesome-5-8-1")
	@include("partials.libraries.datatables-bootstrap4")
	@include("partials.libraries.chartjs2-8")
	@include("partials.libraries.nprogress")
	@yield("scripts")
	@include("partials.libraries.shared")
	<script src="{{ asset('modules/expenses/js/app.js?v=' . time()) }}"></script>
	<link href="{{ asset('modules/expenses/css/app.css?v=' . time()) }}" rel="stylesheet" type="text/css">
	
	@include("partials.fonts.raleway")
</head>
<body>
	<div id="app">
		@include("partials.top-nav", [
			"config"					 =>	[
				"background"			 =>	"bg-info"
			],
			"brand"						 =>	[
				"title"					 =>	"Expenses",
				"route"					 =>	route("expenses.index"),
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
		
		<main class="py-3">
			@yield("content")
		</main>
	</div>
</body>
</html>