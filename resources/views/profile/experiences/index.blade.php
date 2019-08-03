@extends("layouts.profile")

@section("content")
<div class="container">
	<div class="row">
		<div class="col-12">
			<h1>
				My Experiences
				<a
					href="{{ route('profile.experiences.create') }}"
					class="btn btn-sm btn-primary float-right"
				>
					Create New Experience
				</a>
			</h1>
			<div class="row">
				<div class="col-12">
					<table class="table table-hover table-condensed table-responsive table-striped">
						<thead>
							<tr>
								<td>ID</td>
								<th>Company Name</th>
								<th>Job Title</th>
								<th>Job Type</th>
							</tr>
						</thead>
						<tbody>
							@forelse ($experiences as $experience)
								<tr>
									<td>{{ $experience->id }}</td>
									<td>
										<a
											href="{{ route('profile.experiences.edit', $experience) }}"
										>
											{{ $experience->company }}
										</a>
									</td>
									<td>{{ $experience->title }}</td>
									<td>{{ $experience->job_type }}</td>
								</tr>
							@empty
								<tr>
									<td>No experience added, yet.</td>
								</tr>
							@endforelse
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection