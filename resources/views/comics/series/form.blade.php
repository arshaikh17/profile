@extends("layouts.comics")

@section("content")
<div class="container">
	<div class="row">
		<div class="col-12">
			<h1>{{ $series->id ? "Update" : "Create" }} Series</h1>
		</div>
		<div class="col-12 col-md-6">
			<form
				action="{{ $series->id ? route('comics.series.update', $series) : route('comics.series.store') }}"
				method="POST"
				enctype="multipart/form-data"
			>
			{{csrf_field()}}
				<div class="form-group">
					<label>Title</label>
					<input
						type="text"
						class="form-control"
						value="{{ $series->title }}"
						name="title"
						required
					/>
				</div>
				<div class="form-group">
					<label>Upload Cover</label>
					<input
						type="file"
						name="cover"
						class="form-control"
						@if (!$series->id) required @endif
					/>
				</div>
				<h4>Attach Characters</h4>
				<div class="form-group">
					<label>Select Characters</label>
					<select
						class="form-control"
						name="character_id"
					>
						<option selected>Characters</option>
						@forelse ($characters as $character)
							<option
								value="{{ $character->id }}"
								@if ($character->id == $series->character_id) selected @endif
							>
								{{ $character->name }}
							</option>
						@empty
							<option selected disabled>No characters in database</option>
						@endforelse
					</select>
				</div>
				<div class="form-group mt-2">
					<input
						type="submit"
						class="btn btn-sm btn-dark w-100"
						value="Save"
					/>
				</div>
			</form>
		</div>
		
		@if ($series->cover)
			<div class="col-12 col-md-6">
				<img
					src="{{ asset('uploads/comics/series/' . $series->cover) }}"
					title="{{ $series->title }}"
					alt="{{ $series->cover }}"
					class="img-fluid mx-auto d-block"
				/>
			</div>
		@endif
	</div>
</div>
@endsection