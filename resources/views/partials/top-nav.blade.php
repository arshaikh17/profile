<nav class="navbar navbar-expand-md {{ $config["background"] ?? "bg-white" }} navbar-laravel">
	<div class="container">
		<a class="navbar-brand {{ $brand["colour"] ?? "text-white" }}" href="{{ $brand['route'] }}">
			{{ $brand['title'] }}
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<!-- Left Side Of Navbar -->
			<ul class="navbar-nav mr-auto">
				@forelse ($links as $link)
					@if (isset($link["auth"]) && $link["auth"] && !Auth::user()) @continue; @endif
					<li class="nav-item">
						<a
							href="{{ $link['route'] }}"
							title="{{ $link['title'] }}"
							class="nav-link {{ $link["colour"] ?? "text-white" }}"
						>
							{{ $link["title"] }}
						</a>
					</li>
				@empty
				@endforelse
			</ul>

			<!-- Right Side Of Navbar -->
			@include("partials.sub-nav")
		</div>
	</div>
</nav>