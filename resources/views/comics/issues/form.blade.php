@extends("layouts.comics")

@section("content")
<div class="container">
	<div class="row">
		<div class="col-12">
			<h1>
				{{ $issue->id ? "Update" : "Create" }} Comic Issue 
				@if (isset($selectedArc)) under {{ $selectedArc->title }} Arc @endif
			</h1>
		</div>
		<div class="col-12">
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
						<div class="row">
							<div class="col-md-6">
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
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Cover</label>
									<input
										type="file"
										class="form-control"
										name="cover"
										{{ $issue->id ? "" : "required" }}
									/>
								</div>
							</div>
						</div>
						
						
						<div class="form-group">
							<label>Owned Status</label>
							<br/>
							@forelse ($statuses as $statusKey => $status)
								<label>
									<input
										type="radio"
										name="owned_status"
										value="{{ $statusKey }}"
										class="form-control"
										@if ($issue->owned_status == $statusKey) selected @endif
									/>
									{{ $status }}
								</label>
							@empty
							@endforelse
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
						<input
							class="form-control filter-element mb-2"
							type="text"
							placeholder="Search Authors.."
							data-path="#authorsField option"
						/>
						<div class="form-group">
							<select
								class="form-control"
								name="author_ids[]"
								id="authorsField"
								multiple
								required
								style="height: 450px;"
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
				<div class="row">
					<div class="col-12">
						<h3>
							New Authors
							<a
								href="#"
								class="btn btn-sm btn-primary add-template"
								data-template="authorsFormFields"
								data-append="authorsForm"
							>
							Add Author
						</a>
						</h3>
					</div>
					<div class="col-12">
						<div class="row" id="authorsForm">
							
						</div>
					</div>
					<div class="col-12">
						
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

<div class="invisible">
	<div id="authorsFormFields">
		<div class="col-md-4" id="__INDEX__">
			@include("comics.partials.authors-form-fields", [
				"subForm"				 =>	"true"
			])
			<a href="#" class="btn btn-sm btn-danger remove-template" data-id="__INDEX__">delete</a>
		</div>
	</div>
</div>
@endsection
