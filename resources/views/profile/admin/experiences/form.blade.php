@extends("layouts.app")

@section("content")
<div class="container">
	<div class="row">
		<div class="col-12">
			<h1>{{ $experience->id ? "Update" : "Create" }} Experience</h1>
			<div>
				@include("profile.admin.partials.form.experience-form", [
					"experience"		 =>	$experience,
					"types"				 =>	$types
				])
			</div>
		</div>
	</div>
</div>
@endsection