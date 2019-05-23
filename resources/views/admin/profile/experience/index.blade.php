@extends("layouts.app")

@section("content")
<div class="container">
	<div class="row">
		<div class="col-12">
			<h1>
				My Experiences
				<a
					href="{{ route('admin.profile.experience.create') }}"
					class="btn btn-sm btn-primary float-right"
				>
					Create New Experience
				</a>
			</h1>
			<div class="row">
				
			</div>
		</div>
	</div>
</div>
@endsection