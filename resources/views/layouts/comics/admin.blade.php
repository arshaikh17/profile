@extends("layouts.comics.comics")

@section("scripts")
<link rel="stylesheet" type="text/css" href="{{ asset('modules/comics/css/admin.css') }}">
<script src="{{ asset('modules/comics/js/admin.js') }}"></script>
@endsection

@section("body")
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
								href="{{ route('comics.admin.authors.index') }}"
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
@endsection