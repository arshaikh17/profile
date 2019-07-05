<!DOCTYPE html>
<html>
<head>
	<title>Wishlists</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
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
		/********************* ITEM GRID **********************/
		h3{margin:1em;text-transform:capitalize;font-size:1.7em;}
		.item-grid{font-family:Roboto,sans-serif;text-align:center;position:relative;z-index:1;background-color: white;border: 0.5px solid #607D8B;margin-bottom: 10px;}
		.item-grid:before{content:"";height:81%;width:100%;background:#fff;opacity:0;position:absolute;top:0;left:0;z-index:-1;transition:all .5s ease 0s}
		.item-grid:hover:before{opacity:1;height:100%}
		.item-grid .item-image{position:relative}
		.item-grid .item-image a{display:block}
		.item-grid .item-image img{width:100%;height:auto}
		.item-grid .pic-1{opacity:1;transition:all .5s ease-out 0s}
		.item-grid .actions{width:120px;padding:0;margin:0 auto;list-style:none;opacity:0;position:absolute;right:0;left:0;bottom:-23px;transform:scale(0);transition:all .3s ease 0s}
		.item-grid:hover .actions{opacity:1;transform:scale(1)}
		.item-grid .actions li{display:inline-block}
		.item-grid .actions li button{color:#607D8B;background:#fff;font-size:18px;line-height:0px;width:40px;height:40px;border:1px solid rgba(0,0,0,.1);border-radius:50%;margin:0 2px;display:block;transition:all .3s ease 0s}
		.item-grid .actions li button:hover{background:#607D8B;color:#fff}
		.item-grid .item-discount-label,.item-grid .item-new-label{background-color:#e67e22;color:#fff;font-size:17px;padding:2px 10px;position:absolute;right:10px;top:10px;transition:all .3s}
		.item-grid .item-content{z-index:-1;padding:15px;text-align:left}
		.item-grid .title{font-size:14px;text-transform:capitalize;margin:0 0 7px;transition:all .3s ease 0s}
		.item-grid .title a{color:#414141}
		.item-grid .price{color:#000;font-size:16px;letter-spacing:1px;font-weight:600;margin-right:2px;display:inline-block}
		.item-grid .price span{color:#909090;font-size:14px;font-weight:500;letter-spacing:0;text-decoration:line-through;text-align:left;display:inline-block;margin-top:-2px}
		.item-grid .rating{padding:0;margin:-22px 0 0;list-style:none;text-align:right;display:block}
		.item-grid .rating li{color:#ffd200;font-size:13px;display:inline-block}
		.item-grid .rating li.disable{color:#dcdcdc}
		@media only screen and (max-width:1200px){.item-grid .rating{margin:0}
		}
		@media only screen and (max-width:990px){.item-grid{margin-bottom:30px}
		.item-grid .rating{margin:-22px 0 0}
		}
		@media only screen and (max-width:359px){.item-grid .rating{margin:0}
		}
		
	</style>
	<script>
		$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip();
			$('.toast').toast('show');
		});
	</script>
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





