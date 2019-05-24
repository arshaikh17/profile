@extends("layouts.app")

@section("content")
<div class="container">
	<div class="row">
		<div class="col-12">
			<h1>{{ $project->id ? "Update" : "Create" }} Project</h1>
			<div>
				@include("admin.profile.partials.form.project-form", [
					"project"			 =>	$project,
					"experiences"		 =>	$experiences
				])
			</div>
		</div>
	</div>
</div>
@endsection