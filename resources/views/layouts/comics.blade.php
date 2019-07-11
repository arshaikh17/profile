<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Comics Area</title>
	<!-- Scripts -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="{{ asset('js/app.js') }}" defer></script>
	<script src="{{ asset('admins/js/admin.js') }}" defer></script>
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" />
	@include("partials.modules.nprogress")
	<style>
	body {
		background-color: #D0D3D6;
	}
	.card {
		border-radius: 0px;
	}
	.statistics-card {
		margin-bottom: 10px;
		color: rgb(108, 117, 125);
	}
	.character {
		height: 400px;
		margin-bottom: 20px;
		border: 2px solid  	#E8E8E8;
		flex: 1;
		display: flex;
		flex-direction: column;
	}
	.character > .image {
		height: 200px;
	}
	.character > .image > img {
		height:100%;
		width:100%;
	}
	.character > .details {
		flex-grow: 1;
		padding: 20px 20px 20px 20px;
	}
	.character > .details > .name {
		font-size: 15px;
	}
	.character > .action {
		text-align: center;
		padding-bottom: 10px;
	}
	.character > .action .btn {
		width: 40%;
	}
	
	.issue {
		height: 470px;
		margin-bottom: 20px;
		border: 2px solid #E8E8E8;
	}
	.issue > .image {
		height: 316px;
	}
	.issue > .image > img {
		height:100%;
		width:100%;
	}
	.issue > .details {
		line-height: 15px;
		padding-left: 20px;
		padding-right: 20px;
	}
	.issue > .details > .name {
		margin-top: 10px;
		height: 35px;
		font-size: 15px;
	}
	.issue > .details > .issue-number {
		height: 20px;
		font-weight: bold;
	}
	.issue > .action {
		text-align: center;
		padding-bottom: 10px;
	}
	.issue > .action .btn {
		width: 40%;
	}
</style>
<script>
	$(document).ready(function() {
		searchTable();
		filterElements();
	});
	
	/**
	 * Performs search for specified table
	 */
	function searchTable() {
		
		$("body").on("keyup", ".ajax-search-table", delay(function() {
			
			NProgress.start();
			
			$.ajax({
				url						 :	$(this).data("route"),
				method					 :	"GET",
				data					 :	{ "term" : $(this).val() },
				success					 :	(data) => {
					
					$(`#${$(this).data("table")} > tbody`).html(data.data);
					$(".pagination").remove();
					
					NProgress.done();
					
				}
			});
			
		}, 500));
		
	}
	
	/**
	 * Creates a delay before triggering function
	 */
	function delay(callback, ms) {
		
		var timer						 =	0;
		
		return function() {
		
			var context					 =	this;
			var args					 =	arguments;
			
			clearTimeout(timer);
			
			timer						 =	setTimeout(function() {
				
				callback.apply(context, args);
				
			}, ms || 0);
			
		};
		
	}
	
	/**
	 * Filters the elements
	 */
	function filterElements() {
		
		$(".filter-element").on("keyup", function() {
			
			var value					 =	$(this).val().toLowerCase();
			
			$($(this).data("path")).filter(function() {
				
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
				
			});
			
		});
		
	}
</script>
</head>
<body>
	<div id="app">
		<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
			<div class="container">
				<a class="navbar-brand" href="{{ route('comics.admin.index') }}">
					Comics Area
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<!-- Left Side Of Navbar -->
					<ul class="navbar-nav mr-auto">
						<li class="nav-item">
							<a
								href="{{ route('comics.admin.characters.index') }}"
								title="Characters"
								class="nav-link"
							>
								Characters
							</a>
						</li>
						<li class="nav-item">
							<a
								href=""
								title="Authors"
								class="nav-link"
							>
								Authors
							</a>
						</li>
						<li class="nav-item">
							<a
								href="{{ route('comics.admin.series.index') }}"
								title="Series"
								class="nav-link"
							>
								Series
							</a>
						</li>
						<li class="nav-item">
							<a
								href="{{ route('comics.admin.arcs.index') }}"
								title="Arcs"
								class="nav-link"
							>
								Arcs
							</a>
						</li>
						<li class="nav-item">
							<a
								href="{{ route('comics.admin.issues.index') }}"
								title="Issues"
								class="nav-link"
							>
								Issues
							</a>
						</li>
					</ul>

					<!-- Right Side Of Navbar -->
					<ul class="navbar-nav ml-auto">
						<!-- Authentication Links -->
						@guest
							<li class="nav-item">
								<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
							</li>
							@if (Route::has('register'))
								<li class="nav-item">
									<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
								</li>
							@endif
						@else
							<li class="nav-item dropdown">
								<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
									{{ Auth::user()->name }} <span class="caret"></span>
								</a>

								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="{{ route('logout') }}"
									   onclick="event.preventDefault();
													 document.getElementById('logout-form').submit();">
										{{ __('Logout') }}
									</a>

									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										@csrf
									</form>
								</div>
							</li>
						@endguest
					</ul>
				</div>
			</div>
		</nav>
		
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
	@yield("script")
</body>
</html>