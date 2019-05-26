@extends("layouts.app")

@section("content")
<div class="container-fluid">
	<div class="row">
		<div class="col-12 col-md-4">
			<h1>
				My CVs
			</h1>
			<div class="card card-default">
				<div class="card-body border shadow">
					<p 
						data-toggle="collapse"
						data-target="#cvForm"
					>
						Add New CV
					</p>
					<form
						method="POST"
						action="{{ route('admin.profile.cv.store') }}"
						enctype="multipart/form-data"
						class="collapse"
						id="cvForm"
					>
						{{csrf_field()}}
						
						<div class="form-group">
							<label>Title</label>
							<input
								type="text"
								class="form-control"
								placeholde="Enter title of CV"
								name="title"
								required
							/>
						</div>
						<div class="form-group">
							<label>Upload CV (Only PDF)</label>
							<input
								type="file"
								name="cv"
								required
							/>
						</div>
						<div class="form-group">
							<label>Is Main?</label>
							<input
								type="checkbox"
								class="form-control"
								name="is_main"
								value="1"
							/>
						</div>
						<div class="form-group">
							<input
								type="submit"
								class="btn btn-primary btn-sm float-right"
								value="Upload"
							/>
						</div>
					</form>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<table class="table table-hover table-condensed table-striped">
						<thead>
							<tr>
								<th>Title</th>
								<th>Is Main?</th>
							</tr>
						</thead>
						<tbody>
							@forelse ($cvs as $cv)
								<tr>
									<td>
										<a 
											href="{{ route('admin.profile.cv.edit', $cv) }}"
										>
											{{ $cv->title }}
										</a>
									</td>
									<td>
										{{ $cv->is_main ? "YES" : "NO" }}
									</td>
								</tr>
							@empty
							@endforelse
						</tbody>
					</table>
				</div>
			</div>
		</div>
		@if (isset($cv))
			<div class="col-12 col-md-8">
				<h1>{{ $cv->title }} - Preview</h1>
				<form 
					method="POST"
					action="{{ route('admin.profile.cv.editPost', $cv) }}"
					enctype="multipart/form-data"
					id="cvEditForm"
				>
					{{ csrf_field() }}
					<input
						type="hidden"
						name="id"
						value="{{ $cv->id }}"
						required
					/>
					<input
						type="hidden"
						name="cv_name"
						value="{{ $cv->cv }}"
						required
					/>
					<div class="form-group">
						<label>Title</label>
						<input
							type="text"
							class="form-control"
							placeholde="Enter title of CV"
							name="title"
							value="{{ $cv->title }}"
							required
						/>
					</div>
					<div class="form-group">
						<label>Upload CV (Only PDF)</label>
						<input
							type="file"
							name="cv"
						/>
					</div>
					<div class="form-group">
						<label>Is Main?</label>
						<input
							type="checkbox"
							class="form-control"
							name="is_main"
							value="1"
							{{ $cv->is_main ? "checked" : "" }}
						/>
					</div>
					<div
						class="form-group render-preview embed-responsive embed-responsive-1by1"
					>
						<iframe
							src="{{ route('admin.profile.cv.preview', $cv) }}?cachebust=1"
							class="w-100 h-100 embed-responsive-item"
						></iframe>
					</div>
					<div class="form-group">
						<input
							type="submit"
							class="btn btn-primary btn-sm float-right"
							value="Save"
						/>
					</div>
				</form>
			</div>
		@endif
	</div>
</div>
@endsection