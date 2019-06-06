@extends("layouts.app")

@section("content")
<div class="container">
	<div class="row">
		<div class="col-12">
			<h1>
				My Projects
				<a
					href="{{ route('admin.profile.project.index') }}"
					class="btn btn-sm btn-primary float-right"
				>
					Create New Project
				</a>
			</h1>
			<div class="row">
				<div class="col-12">
					<table class="table table-hover table-condensed table-striped">
						<thead>
							<tr>
								<td>ID</td>
								<th>Project Name</th>
							</tr>
						</thead>
						<tbody>
							@forelse ($projects as $project)
								<tr>
									<td>{{ $project->id }}</td>
									<td>
										<a
											href="{{ route('admin.profile.project.edit', $project) }}"
										>
											{{ $project->title }}
										</a>
									</td>
								</tr>
							@empty
								<tr>
									<td>No project added, yet.</td>
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