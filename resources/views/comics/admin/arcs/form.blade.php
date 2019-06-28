@extends("layouts.app")

@section("content")
<div class="container">
	<div class="row">
		<div class="col-12">
			<h1>{{ $arc->id ? "Update" : "Create" }} Series</h1>
		</div>
		<div class="col-6 offset-3">
			<form
				action="{{ $arc->id ? route('comics.admin.arcs.update', $arc) : route('comics.admin.arcs.store') }}"
				method="POST"
			>
			{{csrf_field()}}
				<div class="form-group">
					<label>Title</label>
					<input
						type="text"
						class="form-control"
						value="{{ $arc->title }}"
						name="title"
						required
					/>
				</div>
				<div class="form-group">
					<label>Is Completed?</label>
					<select
						class="form-control"
						name="is_completed"
						required
					>
						<option selected>Status</option>
						@forelse ($statuses as $statusKey => $status)
							<option
								value="{{ $statusKey }}"
								@if ($statusKey == $arc->is_completed) selected @endif
							>
								{{ $status }}
							</option>
						@empty
							<option selected disabled>No status</option>
						@endforelse
					</select>
				</div>
				
				<h4>Attach Series</h4>
				<div class="form-group">
					<label>Select Series</label>
					<select
						class="form-control"
						name="series_id"
					>
						<option selected>Series</option>
						@forelse ($series as $singleSeries)
							<option
								value="{{ $singleSeries->id }}"
								@if ($singleSeries->id == $arc->series_id) selected @endif
							>
								{{ $singleSeries->title }}
							</option>
						@empty
							<option selected disabled>No series in database</option>
						@endforelse
					</select>
				</div>
				<div class="form-group mt-2">
					<input
						type="submit"
						class="btn btn-sm btn-primary w-100"
						value="Save"
					/>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection