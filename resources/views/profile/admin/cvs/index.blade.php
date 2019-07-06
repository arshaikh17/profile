@extends("layouts.app")

@section("content")
<div class="container">
	<div class="row">
		<div class="col-12 col-md-4">
			@include("profile.admin.partials.cv-table", [
				"cvs"					 =>	$cvs
			])
		</div>
	</div>
</div>
@endsection