<!DOCTYPE html>
<html>
<head>
	<title>Wishlists</title>
	@include("partials.libraries.jquery3-4-1")
	@include("partials.libraries.bootstrap4")
	@include("partials.libraries.fontawesome-5-8-1")
	@include("partials.libraries.shared")
	<style>
		body {
			background-color: #EEEEEE;
		}
		.main-container {
			background-color: white;
		}
		.wishlist-block-title {
			color: #455A64;
			font-size: 25px;
			border-bottom: 4px solid #455A64;
			cursor: pointer;
		}
		.wishlist-row {
			padding-top: 10px;
			padding-bottom: 10px;
			transition: 0.2s;
		}
		.wishlist-row:hover {
			background-color: #607D8B;
			color: white;
		}
		.wishlist-row-title {
			font-size: 20px;
			font-style: italic;
			cursor: pointer;
		}
		
	</style>
</head>
<body>
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
</body>
</html>





