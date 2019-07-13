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
	@yield("scripts")
</head>
@yield("body")
@yield("js")
</html>