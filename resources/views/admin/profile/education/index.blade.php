@extends("layouts.app")

@section("content")
<div class="container">
	<div class="row">
		<div class="col-12">
			<h1>
				My Educations
				<a
					href="{{ route('admin.profile.education.create') }}"
					class="btn btn-sm btn-primary float-right"
				>
					Create New Education
				</a>
			</h1>
			<div class="row">
				<div class="col-12">
					<table class="table table-hover table-condensed table-striped">
						<thead>
							<tr>
								<td>ID</td>
								<th>Title</th>
								<th>Institute</th>
								<th>Degree</th>
							</tr>
						</thead>
						<tbody>
							@forelse ($educations as $education)
								<tr>
									<td>{{ $education->id }}</td>
									<td>
										<a
											href="{{ route('admin.profile.education.edit', $education) }}"
										>
											{{ $education->title }}
										</a>
									</td>
									<td>{{ $education->institute }}</td>
									<td>{{ $education->degree_type }}</td>
								</tr>
							@empty
								<tr>
									<td>No education added, yet.</td>
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