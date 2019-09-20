@extends("layouts.generals")

@section("content")
<div class="container mt-5">
	<div class="row">
		<div class="col-8">
			<h1 class="text-success">{{ $person->name }}</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-4">
			<a href="#" class="hover-link">
			<div class="bg-success text-white statistics-strip">
				<p>Debt</p>
				<p class="text-30">£{{ $person->debt }}</p>
			</div>
			</a>
		</div>
	</div>
</div>
@endsection