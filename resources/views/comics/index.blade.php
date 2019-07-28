@extends("layouts.comics")

@section("content")
<div class="container">
	<div class="row">
		<div class="col-12 col-sm-6 col-md-3 statistics-card">
			<div class="card">
				<div class="card-body bg-dark text-white">
					<h4 class="card-title">Characters</h4>
					<h1 class="card-text">{{ $comics->characters()->count() }}</h1>
				</div>
			</div>
			<a href="{{ route('comics.characters.index') }}" class="btn btn-sm btn-dark mt-1 w-100">View</a>
		</div>
		<div class="col-12 col-sm-6 col-md-3 statistics-card">
			<div class="card">
				<div class="card-body bg-dark text-white">
					<h4 class="card-title">Series</h4>
					<h1 class="card-text">{{ $comics->series()->count() }}</h1>
				</div>
			</div>
			<a href="{{ route('comics.series.index') }}" class="btn btn-sm btn-dark mt-1 w-100">View</a>
		</div>
		<div class="col-12 col-sm-6 col-md-3 statistics-card">
			<div class="card">
				<div class="card-body bg-dark text-white">
					<h4 class="card-title">Arcs</h4>
					<h1 class="card-text">{{ $comics->arcs()->count() }}</h1>
				</div>
			</div>
			<a href="{{ route('comics.arcs.index') }}" class="btn btn-sm btn-dark mt-1 w-100">View</a>
		</div>
		<div class="col-12 col-sm-6 col-md-3 statistics-card">
			<div class="card">
				<div class="card-body bg-dark text-white">
					<h4 class="card-title">Issues</h4>
					<h1 class="card-text">{{ $comics->issues()->count() }}</h1>
				</div>
			</div>
			<a href="{{ route('comics.issues.index') }}" class="btn btn-sm btn-dark mt-1 w-100">View</a>
		</div>
	</div>
	
</div>
@endsection