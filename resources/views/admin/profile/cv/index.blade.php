@extends("layouts.app")

@section("content")
<div class="container-fluid">
	<div class="row">
		<div class="col-12 col-md-4">
			@include("admin.profile.partials.cv-table", [
				"cvs"					 =>	$cvs
			])
		</div>
	</div>
</div>
@endsection