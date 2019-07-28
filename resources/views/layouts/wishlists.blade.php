<!DOCTYPE html>
<html>
<head>
	<title>Wishlists</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
	@include("partials.modules.shared")
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





