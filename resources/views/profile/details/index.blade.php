@extends("layouts.profile")

@section("content")
<div class="container">
	<div class="row">
		<div class="col-12">
			<h1>
				My Details
			</h1>
		</div>
		<div class="col-12">
			@include("profile.partials.form.detail-form", [
				"details"				 =>	$details
			])
		</div>
	</div>
</div>
@endsection