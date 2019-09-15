@extends("layouts.generals")

@section("content")
<div class="container mt-5">
	<div class="row">
		<div class="col-12 col-md-4 text-center">
			<a href="{{ route("generals.persons.index") }}" class="btn btn-light text-success">
				<h1><i class="fas fa-users fa-5x"></i></h1>
				<h4>Persons</h4>
			</a>
		</div>
	</div>
</div>
@endsection