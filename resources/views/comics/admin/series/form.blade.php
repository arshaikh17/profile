@extends("layouts.app")

@section("content")
<div class="container">
	<div class="row">
		<div class="col-12">
			<h1>{{ $series->id ? "Update" : "Create" }} Series</h1>
		</div>
		<div class="col-6 offset-3">
			<form
				action="{{ $series->id ? route('comics.admin.series.update', $series) : route('comics.admin.series.store') }}"
				method="POST"
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
					<label>
						Is Completed?
						<input
							type="checkbox"
							class="form-control"
							value="1"
							name="is_completed"
						/>
					</label>
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
						class="btn btn-sm btn-primary w-100"
						value="Save"
					/>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection