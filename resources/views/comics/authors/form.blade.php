@extends("layouts.comics")

@section("content")
<div class="container">
	<div class="row">
		<div class="col-12">
			<h1>{{ $author->id ? "Update" : "Create" }} Author</h1>
		</div>
		<div class="col-12 col-md-4 offset-md-4">
			@include("comics.partials.authors-form", [
				"author"				 =>	$author
			])
		</div>
	</div>
</div>
@endsection