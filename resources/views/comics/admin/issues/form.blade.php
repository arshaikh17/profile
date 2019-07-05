@extends("layouts.app")

@section("content")
<div class="container">
	<div class="row">
		<div class="col-12">
			<h1>
				{{ $issue->id ? "Update" : "Create" }} Comic Issue 
				@if (isset($selectedArc)) under {{ $selectedArc->title }} Arc @endif
			</h1>
		</div>
		<div class="col-6">
			@if ($issue->cover)
				<div class="text-center mb-3">
					<span>
						<img 
							src="{{ asset('uploads/comics/issues/' . $issue->cover) }}"
							class="img img-fluid"
						/>
					</span>
				</div>
			@endif
			<form
				action="{{ $issue->id ? route('comics.admin.issues.update', $issue) : route('comics.admin.issues.store') }}"
				method="POST"
				enctype="multipart/form-data"
			>
				{{csrf_field()}}
				<div class="row">
					<div class="col-md-8">
						<div class="form-group">
							<label>Title</label>
							<input
								type="text"
								class="form-control"
								value="{{ $issue->title }}"
								name="title"
								required
							/>
						</div>
						<div class="form-group">
							<label>Issue Number</label>
							<input
								type="text"
								class="form-control"
								value="{{ $issue->issue }}"
								name="issue"
								required
							/>
						</div>
						<div class="form-group">
							<label>Cover</label>
							<input
								type="file"
								class="form-control"
								name="cover"
								{{ $issue->id ? "" : "required" }}
							/>
						</div>
						<div class="form-group">
							<label>Owned Status</label>
							<select
								class="form-control"
								name="owned_status"
								required
							>
								<option selected disabled>Set status</option>
								@forelse ($statuses as $statusKey => $status)
									<option
										value="{{ $statusKey }}"
										@if ($issue->owned_status == $statusKey) selected @endif
									>
										{{ $status }}
									</option>
								@empty
								@endforelse
							</select>
						</div>
						<h3>Attach Series and Arc</h3>
						<div class="form-group">
							<label>Select Series</label>
							<select
								class="form-control"
								name="series_id"
								required
							>
								<option selected>No Series</option>
								@forelse ($series as $singleSeries)
									<option
										value="{{ $singleSeries->id }}"
										@if (!isset($selectedSeries) && $issue->series_id == $singleSeries->id) selected @endif
										@if (isset($selectedSeries) && $selectedSeries->id == $singleSeries->id) selected @endif
									>
										{{ $singleSeries->title }}
									</option>
								@empty
								@endforelse
							</select>
						</div>
						<div class="form-group">
							<label>Select Arc</label>
							<select
								class="form-control"
								name="arc_id"
								required
							>
								<option selected>No Arc</option>
								@forelse ($series as $singleSeries)
									<optgroup label="{{ $singleSeries->title }}">
										@forelse ($singleSeries->arcs as $arc)
											<option
												value="{{ $arc->id }}"
												@if (!isset($selectedArc) && $issue->arc_id == $arc->id) selected @endif
												@if (isset($selectedArc) && $selectedArc->id == $arc->id) selected @endif
											>
												{{ $arc->title }}
											</option>
										@empty
											<option disabled>No arcs in this series</option>
										@endforelse
									</optgroup>
								@empty
								@endforelse
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<h3>Attach Authors</h3>
							<div class="form-group">
								<label>Authors</label>
								<select
									class="form-control"
									name="author_ids[]"
									multiple
									required
									style="height: 900px;"
								>
									<option disabled>Select authors</option>
									@forelse ($authors as $author)
										<option
											value="{{ $author->id }}"
											@if ($issue->authors && $issue->authors->contains($author)) selected @endif
										>
											{{ $author->name }}
										</option>
									@empty
									@endforelse
								</select>
							</div>
					</div>
				</div>
				<div class="form-group">
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