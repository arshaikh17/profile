@extends("layouts.comics")

@section("content")
<div class="row">
	<div class="col-12 col-sm-6 statistics-card">
		<a href="{{ route('comics.series.index') }}">
			<div class="card">
				<div class="card-body bg-dark text-white">
					<h4 class="card-title">Series</h4>
					<h1 class="card-text">{{ $comics->series()->count() }}</h1>
				</div>
			</div>
		</a>
	</div>
	<div class="col-12 col-sm-6 statistics-card">
		<a href="{{ route('comics.arcs.index') }}">
			<div class="card">
				<div class="card-body bg-dark text-white">
					<h4 class="card-title">Arcs</h4>
					<h1 class="card-text">{{ $comics->arcs()->count() }}</h1>
				</div>
			</div>
		</a>
	</div>
	<div class="col-12 col-sm-12 statistics-card">
		<a href="{{ route('comics.issues.index') }}">
			<div class="card">
				<div class="card-body bg-dark text-white">
					<h4 class="card-title">Issues</h4>
					<h1 class="card-text">{{ $comics->issues()->count() }}</h1>
				</div>
			</div>
		</a>
	</div>
	<div class="col-12 col-sm-6 statistics-card">
		<a href="{{ route('comics.characters.index') }}">
			<div class="card">
				<div class="card-body bg-dark text-white">
					<h4 class="card-title">Characters</h4>
					<h1 class="card-text">{{ $comics->characters()->count() }}</h1>
				</div>
			</div>
		</a>
	</div>
	<div class="col-12 col-sm-6 statistics-card">
		<a href="{{ route('comics.authors.index') }}">
			<div class="card">
				<div class="card-body bg-dark text-white">
					<h4 class="card-title">Authors</h4>
					<h1 class="card-text">{{ $comics->authors()->count() }}</h1>
				</div>
			</div>
		</a>
	</div>
</div>
@endsection