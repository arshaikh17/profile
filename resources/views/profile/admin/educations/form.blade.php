@extends("layouts.app")

@section("content")
<div class="container">
	<div class="row">
		<div class="col-12">
			<h1>{{ $education->id ? "Update" : "Create" }} Education</h1>
			<div>
				@include("profile.admin.partials.form.education-form", [
					"education"			 =>	$education,
					"degreeTypes"		 =>	$degreeTypes,
				])
			</div>
		</div>
	</div>
</div>
@endsection